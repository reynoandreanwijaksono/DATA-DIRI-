<x-layouts.app :title="$project->title . ' — Case Study | Reyno Andrean Wijaksono'" :description="$project->description">
    <div class="pt-32 sm:pt-36 pb-20 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-12">
            
            <!-- Breadcrumbs & Back Link -->
            <div class="flex items-center justify-between">
                <nav class="flex items-center space-x-2 text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-medium">
                    <a href="{{ url('/') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">Home</a>
                    <span>/</span>
                    <a href="{{ url('/#projects') }}" class="hover:text-emerald-800 dark:hover:text-emerald-400 transition-colors">Projects</a>
                    <span>/</span>
                    <span class="text-slate-900 dark:text-white font-semibold truncate max-w-[200px] sm:max-w-none">{{ $project->title }}</span>
                </nav>

                <a 
                    href="{{ url('/#projects') }}" 
                    class="inline-flex items-center text-xs sm:text-sm font-semibold text-emerald-800 dark:text-emerald-400 hover:text-emerald-600 transition-colors"
                >
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Portfolio</span>
                </a>
            </div>

            <!-- Project Hero Banner -->
            <div class="space-y-6">
                <!-- Badges -->
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3.5 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-950 dark:text-emerald-300 border border-emerald-200/60 text-xs font-bold uppercase tracking-wider">
                        {{ $project->category_badges ?? $project->category }}
                    </span>
                    <span class="px-3.5 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 text-xs font-bold uppercase tracking-wider flex items-center space-x-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Completed Project</span>
                    </span>
                </div>

                <!-- Title & Subtitle -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight">
                        {{ $project->title }}
                    </h1>
                    @if($project->subtitle)
                        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 font-medium">
                            {{ $project->subtitle }}
                        </p>
                    @endif
                </div>

                <!-- Action CTAs -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    @if($project->live_url)
                        <a 
                            href="{{ $project->live_url }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center px-7 py-3 rounded-xl bg-gradient-to-r from-[#022c22] via-[#064e3b] to-[#047857] hover:from-[#064e3b] hover:via-[#047857] hover:to-[#059669] text-white font-semibold text-sm shadow-md shadow-emerald-950/25 hover:shadow-emerald-600/35 border border-emerald-500/30 transition-all duration-200 group"
                        >
                            <span>Live Demo</span>
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    @endif

                    @if($project->github_url)
                        <a 
                            href="{{ $project->github_url }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center px-6 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200 font-medium text-sm transition-all duration-200 shadow-xs group"
                        >
                            <svg class="w-4 h-4 mr-2 fill-current text-slate-700 dark:text-slate-300 group-hover:text-emerald-800 dark:group-hover:text-emerald-400" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                            </svg>
                            <span>Source Code</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Main High-Res Mockup Showcase -->
            <div class="rounded-3xl overflow-hidden border border-slate-200/80 dark:border-slate-800 shadow-xl bg-white dark:bg-slate-900">
                <img 
                    src="{{ asset($project->image ?? 'images/projects/azizicake.jpg') }}?v={{ file_exists(public_path($project->image ?? '')) ? filemtime(public_path($project->image ?? '')) : 1 }}" 
                    alt="{{ $project->title }}" 
                    class="w-full h-auto aspect-[16/9] object-cover"
                >
            </div>

            <!-- Key Metrics Showcase Banner -->
            @if(!empty($project->metrics))
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($project->metrics as $metric)
                        <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm text-center">
                            <span class="block text-3xl font-extrabold text-emerald-800 dark:text-emerald-400">
                                {{ $metric['value'] }}
                            </span>
                            <span class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mt-1">
                                {{ $metric['label'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- 2-Column Detailed Case Study Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left: Deep Case Study Content -->
                <div class="lg:col-span-8 space-y-10">
                    
                    <!-- 1. Overview -->
                    <div class="p-7 sm:p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
                        <div class="flex items-center space-x-2.5 text-emerald-800 dark:text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h2 class="text-lg font-bold uppercase tracking-wider text-slate-900 dark:text-white">Project Overview</h2>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                            {{ $project->description }}
                        </p>
                    </div>

                    <!-- 2. Problem Statement -->
                    @if($project->problem)
                        <div class="p-7 sm:p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
                            <div class="flex items-center space-x-2.5 text-rose-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <h2 class="text-lg font-bold uppercase tracking-wider text-slate-900 dark:text-white">The Challenge & Problem</h2>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                                {{ $project->problem }}
                            </p>
                        </div>
                    @endif

                    <!-- 3. The Architecture & Solution -->
                    @if($project->solution)
                        <div class="p-7 sm:p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
                            <div class="flex items-center space-x-2.5 text-emerald-700 dark:text-emerald-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h2 class="text-lg font-bold uppercase tracking-wider text-slate-900 dark:text-white">The Engineering Solution</h2>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                                {{ $project->solution }}
                            </p>
                        </div>
                    @endif

                    <!-- 4. Key Features Breakdown -->
                    @if(!empty($project->features))
                        <div class="p-7 sm:p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
                            <div class="flex items-center space-x-2.5 text-emerald-800 dark:text-emerald-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <h2 class="text-lg font-bold uppercase tracking-wider text-slate-900 dark:text-white">Key Features</h2>
                            </div>

                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                                @foreach($project->features as $feature)
                                    <li class="flex items-start space-x-2.5 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-800 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                        <svg class="w-4 h-4 text-emerald-700 dark:text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- 5. Results & Impact -->
                    @if(!empty($project->results))
                        <div class="p-7 sm:p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
                            <div class="flex items-center space-x-2.5 text-emerald-800 dark:text-emerald-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <h2 class="text-lg font-bold uppercase tracking-wider text-slate-900 dark:text-white">Business Impact & Results</h2>
                            </div>

                            <ul class="space-y-2.5 pt-1 text-sm text-slate-600 dark:text-slate-300">
                                @foreach($project->results as $result)
                                    <li class="flex items-start space-x-2.5">
                                        <div class="w-1.5 h-1.5 rounded-full bg-[#064e3b] shrink-0 mt-2"></div>
                                        <span>{{ $result }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>

                <!-- Right: Meta Information Sidebar -->
                <div class="lg:col-span-4 space-y-6">
                    
                    <!-- Metadata Box -->
                    <div class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-5">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">
                            Project Metadata
                        </h3>

                        <div class="space-y-4 text-xs sm:text-sm">
                            <div>
                                <span class="block text-slate-400 dark:text-slate-500 font-semibold uppercase text-[10px] tracking-wider">Role & Scope</span>
                                <span class="block font-bold text-slate-800 dark:text-slate-200 mt-0.5">Frontend & Full-Stack Developer</span>
                            </div>

                            <div>
                                <span class="block text-slate-400 dark:text-slate-500 font-semibold uppercase text-[10px] tracking-wider">Category</span>
                                <span class="block font-bold text-slate-800 dark:text-slate-200 mt-0.5">{{ $project->category }}</span>
                            </div>

                            <div>
                                <span class="block text-slate-400 dark:text-slate-500 font-semibold uppercase text-[10px] tracking-wider">Status</span>
                                <span class="inline-flex items-center space-x-1.5 font-bold text-emerald-600 dark:text-emerald-400 mt-0.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    <span>Production Ready</span>
                                </span>
                            </div>
                        </div>

                        <div class="pt-2 border-t border-slate-100 dark:border-slate-800">
                            <span class="block text-slate-400 dark:text-slate-500 font-semibold uppercase text-[10px] tracking-wider mb-2">Technologies Used</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($project->technologies ?? [] as $tech)
                                    <span class="px-2.5 py-1 rounded-md bg-emerald-50 dark:bg-emerald-950/50 text-emerald-900 dark:text-emerald-300 border border-emerald-200/60 text-xs font-semibold">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Work Together CTA Box (Glowing Dark Green) -->
                    <div class="p-6 rounded-3xl bg-gradient-to-br from-[#022c22] via-[#064e3b] to-[#043328] text-white border border-emerald-500/30 shadow-xl shadow-emerald-950/20 space-y-4">
                        <h4 class="text-lg font-bold">Have a project in mind?</h4>
                        <p class="text-xs text-emerald-100/90 leading-relaxed">
                            I'm open for freelance, internships, or full-time opportunities. Let's discuss how we can work together.
                        </p>
                        <a 
                            href="{{ url('/#contact') }}" 
                            class="inline-flex items-center justify-center w-full px-4 py-2.5 rounded-xl bg-white text-emerald-950 font-bold text-xs hover:bg-emerald-50 hover:shadow-[0_0_15px_rgba(52,211,153,0.3)] transition-all shadow-sm"
                        >
                            Get in Touch
                        </a>
                    </div>

                </div>

            </div>

            <!-- Next & Previous Project Navigation -->
            <div class="pt-12 border-t border-slate-200/80 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                @if($prevProject)
                    <a 
                        href="{{ route('projects.show', $prevProject->slug) }}" 
                        class="w-full sm:w-auto p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-emerald-400 dark:hover:border-emerald-700 shadow-xs flex items-center space-x-3 group transition-all"
                    >
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-emerald-800 dark:group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <div>
                            <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Previous Project</span>
                            <span class="block text-sm font-bold text-slate-900 dark:text-white group-hover:text-emerald-800 dark:group-hover:text-emerald-400">{{ $prevProject->title }}</span>
                        </div>
                    </a>
                @endif

                @if($nextProject)
                    <a 
                        href="{{ route('projects.show', $nextProject->slug) }}" 
                        class="w-full sm:w-auto p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-emerald-400 dark:hover:border-emerald-700 shadow-xs flex items-center justify-end space-x-3 group transition-all text-right ml-auto"
                    >
                        <div>
                            <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Next Project</span>
                            <span class="block text-sm font-bold text-slate-900 dark:text-white group-hover:text-emerald-800 dark:group-hover:text-emerald-400">{{ $nextProject->title }}</span>
                        </div>
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-emerald-800 dark:group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @endif
            </div>

        </div>
    </div>
</x-layouts.app>
