<footer class="py-12 bg-white dark:bg-slate-950 border-t border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-400 transition-colors">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-6 border-b border-slate-100 dark:border-slate-900">
            <!-- Brand & Identity -->
            <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-2 sm:space-y-0 sm:space-x-3 text-center sm:text-left">
                <a href="{{ url('/') }}#home" class="text-xl font-extrabold text-slate-900 dark:text-white font-sans">
                    RA<span class="text-emerald-700 dark:text-emerald-400">.</span>
                </a>
                <div class="hidden sm:block w-px h-6 bg-slate-200 dark:bg-slate-800"></div>
                <div>
                    <span class="block text-sm font-bold text-slate-900 dark:text-white">
                        REYNO ANDREAN WIJAKSONO
                    </span>
                    <span class="block text-xs text-slate-500 dark:text-slate-400">
                        Web Development & Graphic Design • SMKN 1 Bangsri
                    </span>
                </div>
            </div>

            <!-- Direct Contact & Socials -->
            <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-medium">
                <a 
                    href="mailto:reynoandreanwijaksono@gmail.com" 
                    class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors flex items-center space-x-1.5"
                >
                    <svg class="w-3.5 h-3.5 text-emerald-700 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>reynoandreanwijaksono@gmail.com</span>
                </a>

                <span class="text-slate-300 dark:text-slate-700">•</span>

                <a 
                    href="https://wa.me/628882686430" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="hover:text-emerald-700 dark:hover:text-emerald-400 transition-colors flex items-center space-x-1.5"
                >
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a11.042 11.042 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>08882686430</span>
                </a>

                <span class="text-slate-300 dark:text-slate-700">•</span>

                <a 
                    href="https://instagram.com/reynoooow" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="hover:text-pink-600 dark:hover:text-pink-400 transition-colors"
                >
                    @reynoooow
                </a>

                <span class="text-slate-300 dark:text-slate-700">•</span>

                <a 
                    href="https://www.linkedin.com/in/reynoandreanwijaksono" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors"
                >
                    LinkedIn
                </a>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500 dark:text-slate-400">
            <!-- Copyright -->
            <div>
                &copy; {{ date('Y') }} Reyno Andrean Wijaksono. All rights reserved.
            </div>

            <!-- Quick Nav & Back to Top -->
            <div class="flex items-center space-x-4">
                <a href="{{ url('/#home') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">Home</a>
                <a href="{{ url('/#about') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">About</a>
                <a href="{{ url('/#skills') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">Skills</a>
                <a href="{{ url('/#projects') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">Projects</a>
                <a href="{{ url('/#contact') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">Contact</a>

                <button 
                    type="button"
                    onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" 
                    aria-label="Back to Top"
                    class="p-2 rounded-xl bg-slate-100 dark:bg-slate-900 text-slate-700 dark:text-slate-300 hover:text-emerald-800 dark:hover:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-slate-800 transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</footer>
