<?php

namespace Tests\Feature;

use App\Livewire\ContactForm;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the homepage returns a successful 200 response.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test project detail page returns 200 for an existing project.
     */
    public function test_project_detail_page_returns_successful_response(): void
    {
        $project = Project::create([
            'title' => 'Sample Test Project',
            'slug' => 'sample-test-project',
            'description' => 'A test project description.',
            'category' => 'Web Development',
            'sort_order' => 1,
        ]);

        $response = $this->get('/projects/'.$project->slug);

        $response->assertStatus(200);
        $response->assertSee('Sample Test Project');
    }

    /**
     * Test CV download route responds successfully.
     */
    public function test_cv_download_route_responds(): void
    {
        $response = $this->get('/cv/download');

        $response->assertStatus(200);
    }

    /**
     * Test Livewire contact form validation and saving message.
     */
    public function test_contact_form_validates_and_saves_message(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('subject', 'Test Subject')
            ->set('message', 'This is a test message from automated test suite.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('submitted', true);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
        ]);
    }
}
