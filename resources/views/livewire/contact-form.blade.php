<div>
    @if ($submitted)
        <div class="mb-6 p-5 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 text-emerald-900 dark:text-emerald-200 flex items-start space-x-3.5 shadow-sm transition-all duration-300">
            <div class="shrink-0 w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h4 class="font-semibold text-emerald-950 dark:text-emerald-100 text-base">Message Sent Successfully!</h4>
                <p class="text-sm text-emerald-700 dark:text-emerald-300/90 mt-1">{{ $successMessage }}</p>
                <button 
                    type="button" 
                    wire:click="$set('submitted', false)" 
                    class="mt-3 text-xs font-medium text-emerald-700 dark:text-emerald-300 underline hover:text-emerald-900 dark:hover:text-white transition-colors"
                >
                    Send another message
                </button>
            </div>
        </div>
    @endif

    @error('rate_limit')
        <div class="mb-6 p-4 rounded-xl bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800 text-amber-900 dark:text-amber-200 text-sm flex items-center space-x-3">
            <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <span>{{ $message }}</span>
        </div>
    @enderror

    <form wire:submit="submit" data-turbo="false" class="space-y-4">
        <!-- Anti-spam Honeypot -->
        <div class="hidden" aria-hidden="true">
            <label for="honeypot">Leave empty</label>
            <input type="text" id="honeypot" wire:model="honeypot" tabindex="-1" autocomplete="off" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                    Your Name <span class="text-blue-600">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    wire:model.live.debounce.400ms="name"
                    placeholder="e.g. Alexander Vance"
                    class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900/90 border @error('name') border-rose-400 dark:border-rose-500 @else border-slate-200 dark:border-slate-700/80 @enderror text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all shadow-sm"
                    autocomplete="name"
                >
                @error('name')
                    <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                    Email Address <span class="text-blue-600">*</span>
                </label>
                <input 
                    type="email" 
                    id="email" 
                    wire:model.live.debounce.400ms="email"
                    placeholder="alexander@example.com"
                    class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900/90 border @error('email') border-rose-400 dark:border-rose-500 @else border-slate-200 dark:border-slate-700/80 @enderror text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all shadow-sm"
                    autocomplete="email"
                >
                @error('email')
                    <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Subject Field -->
        <div>
            <label for="subject" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                Subject <span class="text-blue-600">*</span>
            </label>
            <input 
                type="text" 
                id="subject" 
                wire:model.live.debounce.400ms="subject"
                placeholder="Project Inquiry / Job Opportunity"
                class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900/90 border @error('subject') border-rose-400 dark:border-rose-500 @else border-slate-200 dark:border-slate-700/80 @enderror text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all shadow-sm"
            >
            @error('subject')
                <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Message Field -->
        <div>
            <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                Message <span class="text-blue-600">*</span>
            </label>
            <textarea 
                id="message" 
                wire:model.live.debounce.400ms="message"
                rows="4" 
                placeholder="Tell me about your project, idea, or timeline..."
                class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900/90 border @error('message') border-rose-400 dark:border-rose-500 @else border-slate-200 dark:border-slate-700/80 @enderror text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all resize-none shadow-sm"
            ></textarea>
            @error('message')
                <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button 
                type="submit" 
                wire:loading.attr="disabled"
                class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-200 cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed group"
            >
                <!-- Normal State -->
                <span wire:loading.remove wire:target="submit" class="inline-flex items-center space-x-2">
                    <span>Send Message</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>

                <!-- Loading State -->
                <span wire:loading wire:target="submit" class="inline-flex items-center space-x-2">
                    <svg class="animate-spin -ml-1 mr-2 h-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Sending...</span>
                </span>
            </button>
        </div>
    </form>
</div>
