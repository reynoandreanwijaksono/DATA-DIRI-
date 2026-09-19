<header class="fixed top-0 inset-x-0 z-50 transition-all duration-300 py-3.5 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        <!-- Liquid Glass Glowing Outer Border Wrapper -->
        <div class="liquid-glass-wrapper">
            <nav class="liquid-glass-nav relative flex items-center justify-between px-5 py-3 rounded-full">
                
                <!-- Liquid Glass Internal Animated Fluids & Specular Sheen -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none rounded-full" aria-hidden="true">
                    <div class="liquid-blob liquid-blob-1"></div>
                    <div class="liquid-blob liquid-blob-2"></div>
                    <div class="liquid-blob liquid-blob-3"></div>
                    <div class="liquid-sheen"></div>
                </div>

                <!-- Logo Brand -->
                <a href="{{ url('/') }}#home" class="relative z-10 flex items-center space-x-1.5 group">
                    <span class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white font-sans group-hover:text-emerald-800 dark:group-hover:text-emerald-400 transition-colors">
                        RA<span class="text-emerald-700 dark:text-emerald-400 drop-shadow-[0_0_8px_rgba(16,185,129,0.6)]">.</span>
                    </span>
                </a>

                <!-- Desktop Nav Links -->
                <div class="relative z-10 hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" class="nav-link relative px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 rounded-full transition-all duration-200 group overflow-hidden">
                        <span class="relative z-10">Home</span>
                        <span class="absolute inset-0 rounded-full bg-emerald-500/10 dark:bg-emerald-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></span>
                    </a>
                    <a href="{{ request()->is('/') ? '#about' : url('/#about') }}" class="nav-link relative px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 rounded-full transition-all duration-200 group overflow-hidden">
                        <span class="relative z-10">About</span>
                        <span class="absolute inset-0 rounded-full bg-emerald-500/10 dark:bg-emerald-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></span>
                    </a>
                    <a href="{{ request()->is('/') ? '#skills' : url('/#skills') }}" class="nav-link relative px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 rounded-full transition-all duration-200 group overflow-hidden">
                        <span class="relative z-10">Skills</span>
                        <span class="absolute inset-0 rounded-full bg-emerald-500/10 dark:bg-emerald-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></span>
                    </a>
                    <a href="{{ request()->is('/') ? '#projects' : url('/#projects') }}" class="nav-link relative px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 rounded-full transition-all duration-200 group overflow-hidden">
                        <span class="relative z-10">Projects</span>
                        <span class="absolute inset-0 rounded-full bg-emerald-500/10 dark:bg-emerald-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></span>
                    </a>
                    <a href="{{ request()->is('/') ? '#experience' : url('/#experience') }}" class="nav-link relative px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 rounded-full transition-all duration-200 group overflow-hidden">
                        <span class="relative z-10">Experience</span>
                        <span class="absolute inset-0 rounded-full bg-emerald-500/10 dark:bg-emerald-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></span>
                    </a>
                    <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}" class="nav-link relative px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 rounded-full transition-all duration-200 group overflow-hidden">
                        <span class="relative z-10">Contact</span>
                        <span class="absolute inset-0 rounded-full bg-emerald-500/10 dark:bg-emerald-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></span>
                    </a>
                </div>

                <!-- Right Controls: Dark Mode Toggle & Mobile Menu -->
                <div class="relative z-10 flex items-center space-x-2.5">
                    <!-- Dark / Light Mode Toggle Button -->
                    <button 
                        type="button" 
                        onclick="window.toggleTheme()" 
                        aria-label="Toggle Dark Mode"
                        class="p-2 rounded-full text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 hover:bg-emerald-500/15 dark:hover:bg-emerald-400/20 transition-all duration-200 cursor-pointer"
                    >
                        <!-- Sun icon for dark mode -->
                        <svg class="w-5 h-5 hidden dark:block text-emerald-300 drop-shadow-[0_0_6px_rgba(52,211,153,0.5)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <!-- Moon icon for light mode -->
                        <svg class="w-5 h-5 block dark:hidden text-emerald-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button 
                        type="button" 
                        id="mobile-menu-btn"
                        aria-label="Open Mobile Menu"
                        class="md:hidden p-2 rounded-full text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 hover:bg-emerald-500/15 dark:hover:bg-emerald-400/20 transition-all duration-200"
                        onclick="document.getElementById('mobile-drawer').classList.toggle('hidden')"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </nav>
        </div>

        <!-- Mobile Drawer Menu with Liquid Glass Styling -->
        <div id="mobile-drawer" class="hidden md:hidden mt-2 p-4 rounded-2xl liquid-glass-drawer transition-all duration-300">
            <!-- Subtle internal liquid sheen for mobile drawer -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none rounded-2xl" aria-hidden="true">
                <div class="liquid-sheen"></div>
            </div>
            <div class="relative z-10 flex flex-col space-y-2">
                <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-500/10 dark:hover:bg-emerald-400/15 hover:text-emerald-900 dark:hover:text-emerald-300 transition-colors">
                    Home
                </a>
                <a href="{{ request()->is('/') ? '#about' : url('/#about') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-500/10 dark:hover:bg-emerald-400/15 hover:text-emerald-900 dark:hover:text-emerald-300 transition-colors">
                    About
                </a>
                <a href="{{ request()->is('/') ? '#skills' : url('/#skills') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-500/10 dark:hover:bg-emerald-400/15 hover:text-emerald-900 dark:hover:text-emerald-300 transition-colors">
                    Skills
                </a>
                <a href="{{ request()->is('/') ? '#projects' : url('/#projects') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-500/10 dark:hover:bg-emerald-400/15 hover:text-emerald-900 dark:hover:text-emerald-300 transition-colors">
                    Projects
                </a>
                <a href="{{ request()->is('/') ? '#experience' : url('/#experience') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-500/10 dark:hover:bg-emerald-400/15 hover:text-emerald-900 dark:hover:text-emerald-300 transition-colors">
                    Experience
                </a>
                <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-500/10 dark:hover:bg-emerald-400/15 hover:text-emerald-900 dark:hover:text-emerald-300 transition-colors">
                    Contact
                </a>
            </div>
        </div>
    </div>
</header>
