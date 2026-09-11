<header class="fixed top-0 inset-x-0 z-50 transition-all duration-300 py-3.5 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        <nav class="flex items-center justify-between px-5 py-3 rounded-full bg-white/85 dark:bg-slate-900/85 backdrop-blur-md border border-slate-200/70 dark:border-slate-800/80 shadow-sm shadow-slate-200/50 dark:shadow-none transition-colors">
            
            <!-- Logo Brand -->
            <a href="{{ url('/') }}#home" class="flex items-center space-x-1.5 group">
                <span class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white font-sans group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    RA<span class="text-blue-600 dark:text-blue-500">.</span>
                </span>
            </a>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" class="nav-link px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 rounded-full transition-colors">
                    Home
                </a>
                <a href="{{ request()->is('/') ? '#about' : url('/#about') }}" class="nav-link px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 rounded-full transition-colors">
                    About
                </a>
                <a href="{{ request()->is('/') ? '#skills' : url('/#skills') }}" class="nav-link px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 rounded-full transition-colors">
                    Skills
                </a>
                <a href="{{ request()->is('/') ? '#projects' : url('/#projects') }}" class="nav-link px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 rounded-full transition-colors">
                    Projects
                </a>
                <a href="{{ request()->is('/') ? '#experience' : url('/#experience') }}" class="nav-link px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 rounded-full transition-colors">
                    Experience
                </a>
                <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}" class="nav-link px-3.5 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 rounded-full transition-colors">
                    Contact
                </a>
            </div>

            <!-- Right Controls: Dark Mode Toggle & Mobile Menu -->
            <div class="flex items-center space-x-2.5">
                <!-- Dark / Light Mode Toggle Button -->
                <button 
                    type="button" 
                    onclick="window.toggleTheme()" 
                    aria-label="Toggle Dark Mode"
                    class="p-2 rounded-full text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer"
                >
                    <!-- Sun icon for dark mode -->
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <!-- Moon icon for light mode -->
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                <!-- Mobile Menu Button -->
                <button 
                    type="button" 
                    id="mobile-menu-btn"
                    aria-label="Open Mobile Menu"
                    class="md:hidden p-2 rounded-full text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:bg-slate-800 transition-colors"
                    onclick="document.getElementById('mobile-drawer').classList.toggle('hidden')"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-drawer" class="hidden md:hidden mt-2 p-4 rounded-2xl bg-white/95 dark:bg-slate-900/95 backdrop-blur-lg border border-slate-200/80 dark:border-slate-800 shadow-xl transition-all">
            <div class="flex flex-col space-y-2">
                <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-800/60 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    Home
                </a>
                <a href="{{ request()->is('/') ? '#about' : url('/#about') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-800/60 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    About
                </a>
                <a href="{{ request()->is('/') ? '#skills' : url('/#skills') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-800/60 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    Skills
                </a>
                <a href="{{ request()->is('/') ? '#projects' : url('/#projects') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-800/60 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    Projects
                </a>
                <a href="{{ request()->is('/') ? '#experience' : url('/#experience') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-800/60 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    Experience
                </a>
                <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-800/60 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    Contact
                </a>
            </div>
        </div>
    </div>
</header>
