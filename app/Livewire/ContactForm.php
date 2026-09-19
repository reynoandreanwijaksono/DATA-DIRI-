<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public string $honeypot = ''; // Spam prevention bot trap

    public bool $submitted = false;

    public string $successMessage = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email:rfc|max:150',
            'subject' => 'required|min:3|max:150',
            'message' => 'required|min:10|max:3000',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Please provide your name.',
            'name.min' => 'Name must be at least 2 characters.',
            'email.required' => 'An email address is required so I can reply.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject for your message.',
            'message.required' => 'Please write your message.',
            'message.min' => 'Message must be at least 10 characters long.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // 1. Honeypot check for spam bots
        if (! empty($this->honeypot)) {
            // Silently ignore bot submission
            $this->reset(['name', 'email', 'subject', 'message', 'honeypot']);
            $this->submitted = true;
            $this->successMessage = 'Thank you for reaching out! Your message has been sent.';

            return;
        }

        // 2. Validate input
        $validatedData = $this->validate();

        // 3. Rate limiting by IP (Max 4 submissions per 5 minutes)
        $ip = Request::ip() ?? '127.0.0.1';
        $throttleKey = 'contact-form:'.$ip;

        if (RateLimiter::tooManyAttempts($throttleKey, 4)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->addError('rate_limit', "You are sending messages too quickly. Please try again in {$seconds} seconds.");

            return;
        }

        RateLimiter::hit($throttleKey, 300);

        // 4. Save message to database with resilient error handling
        try {
            ContactMessage::create([
                'name' => strip_tags($validatedData['name']),
                'email' => filter_var($validatedData['email'], FILTER_SANITIZE_EMAIL),
                'subject' => strip_tags($validatedData['subject']),
                'message' => strip_tags($validatedData['message']),
                'ip_address' => $ip,
                'is_read' => false,
            ]);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Contact form submission DB warning: '.$e->getMessage(), [
                'name' => $validatedData['name'] ?? null,
                'email' => $validatedData['email'] ?? null,
            ]);

            // Save to fallback storage so message is never lost
            try {
                $backupDir = storage_path('app');
                if (! is_dir($backupDir)) {
                    @mkdir($backupDir, 0755, true);
                }
                $fallbackFile = storage_path('app/contact_messages_backup.json');
                $existing = file_exists($fallbackFile) ? json_decode(file_get_contents($fallbackFile), true) ?: [] : [];
                $existing[] = [
                    'name' => strip_tags($validatedData['name']),
                    'email' => filter_var($validatedData['email'], FILTER_SANITIZE_EMAIL),
                    'subject' => strip_tags($validatedData['subject']),
                    'message' => strip_tags($validatedData['message']),
                    'ip_address' => $ip,
                    'created_at' => now()->toIso8601String(),
                ];
                @file_put_contents($fallbackFile, json_encode($existing, JSON_PRETTY_PRINT));
            } catch (\Throwable $storageError) {
                \Illuminate\Support\Facades\Log::error('Contact form backup write error: '.$storageError->getMessage());
            }
        }

        // 5. Reset fields and display success feedback
        $this->reset(['name', 'email', 'subject', 'message']);
        $this->submitted = true;
        $this->successMessage = 'Thank you for your message! I will get back to you as soon as possible.';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
