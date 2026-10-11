<div>
    @if ($submitted)
        <div class="mb-6 p-5 rounded-2xl bg-[#242428] dark:bg-emerald-950/40 border border-[#D4AF37]/50 dark:border-emerald-800 text-[#F5F5F5] dark:text-emerald-200 flex items-start space-x-3.5 shadow-sm transition-all duration-300">
            <div class="shrink-0 w-8 h-8 rounded-full bg-[#D4AF37]/20 text-[#D4AF37] dark:text-emerald-400 flex items-center justify-center mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h4 class="font-semibold text-[#F1D27A] dark:text-emerald-100 text-base">Message Sent Successfully!</h4>
                <p class="text-sm text-[#B8B8BE] dark:text-emerald-300/90 mt-1">{{ $successMessage }}</p>
                <button 
                    type="button" 
                    wire:click="$set('submitted', false)" 
                    class="mt-3 text-xs font-medium text-[#D4AF37] dark:text-emerald-300 underline hover:text-[#F1D27A] dark:hover:text-white transition-colors"
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
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#B8B8BE] dark:text-slate-300 mb-1.5">
                    Your Name <span class="text-[#D4AF37] dark:text-emerald-400">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    wire:model.live.debounce.400ms="name"
                    placeholder="e.g. Alexander Vance"
                    class="w-full px-4 py-3 rounded-xl bg-[#141416] dark:bg-slate-900/90 border @error('name') border-rose-500 dark:border-rose-500 @else border-[rgba(212,175,55,0.22)] dark:border-slate-700/80 @enderror text-[#F5F5F5] dark:text-white placeholder:text-[#85858E] dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/50 focus:border-[#D4AF37] dark:focus:ring-emerald-800 transition-all shadow-inner"
                    autocomplete="name"
                >
                @error('name')
                    <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#B8B8BE] dark:text-slate-300 mb-1.5">
                    Email Address <span class="text-[#D4AF37] dark:text-emerald-400">*</span>
                </label>
                <input 
                    type="email" 
                    id="email" 
                    wire:model.live.debounce.400ms="email"
                    placeholder="alexander@example.com"
                    class="w-full px-4 py-3 rounded-xl bg-[#141416] dark:bg-slate-900/90 border @error('email') border-rose-500 dark:border-rose-500 @else border-[rgba(212,175,55,0.22)] dark:border-slate-700/80 @enderror text-[#F5F5F5] dark:text-white placeholder:text-[#85858E] dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/50 focus:border-[#D4AF37] dark:focus:ring-emerald-800 transition-all shadow-inner"
                    autocomplete="email"
                >
                @error('email')
                    <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Subject Field -->
        <div>
            <label for="subject" class="block text-xs font-semibold uppercase tracking-wider text-[#B8B8BE] dark:text-slate-300 mb-1.5">
                Subject <span class="text-[#D4AF37] dark:text-emerald-400">*</span>
            </label>
            <input 
                type="text" 
                id="subject" 
                wire:model.live.debounce.400ms="subject"
                placeholder="Project Inquiry / Job Opportunity"
                class="w-full px-4 py-3 rounded-xl bg-[#141416] dark:bg-slate-900/90 border @error('subject') border-rose-500 dark:border-rose-500 @else border-[rgba(212,175,55,0.22)] dark:border-slate-700/80 @enderror text-[#F5F5F5] dark:text-white placeholder:text-[#85858E] dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/50 focus:border-[#D4AF37] dark:focus:ring-emerald-800 transition-all shadow-inner"
            >
            @error('subject')
                <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Message Field -->
        <div>
            <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-[#B8B8BE] dark:text-slate-300 mb-1.5">
                Message <span class="text-[#D4AF37] dark:text-emerald-400">*</span>
            </label>
            <textarea 
                id="message" 
                wire:model.live.debounce.400ms="message"
                rows="4" 
                placeholder="Tell me about your project, idea, or timeline..."
                class="w-full px-4 py-3 rounded-xl bg-[#141416] dark:bg-slate-900/90 border @error('message') border-rose-500 dark:border-rose-500 @else border-[rgba(212,175,55,0.22)] dark:border-slate-700/80 @enderror text-[#F5F5F5] dark:text-white placeholder:text-[#85858E] dark:placeholder:text-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/50 focus:border-[#D4AF37] dark:focus:ring-emerald-800 transition-all resize-none shadow-inner"
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
                class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-gradient-to-r from-[#D4AF37] to-[#F1D27A] hover:from-[#F1D27A] hover:to-[#FF8C42] text-[#0B0B0D] dark:from-[#022c22] dark:via-[#064e3b] dark:to-[#047857] dark:hover:from-[#064e3b] dark:hover:via-[#047857] dark:hover:to-[#059669] dark:text-white font-bold text-sm shadow-lg shadow-[#D4AF37]/20 dark:shadow-emerald-950/25 hover:shadow-[#D4AF37]/40 border border-[#D4AF37] dark:border-emerald-500/30 transition-all duration-200 cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed group"
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
                    <svg class="animate-spin -ml-1 mr-2 h-4 h-4 text-[#0B0B0D] dark:text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Sending...</span>
                </span>
            </button>
        </div>
    </form>
</div>
