@props(['projects' => []])

<section id="projects" class="py-20 lg:py-24 bg-white/60 dark:bg-slate-900/40 border-y border-slate-200/60 dark:border-slate-800/60 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center justify-center text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Featured Work
            </h2>
            <div class="w-12 h-1 bg-blue-600 rounded-full mt-3"></div>
        </div>

        <!-- Project Grid mirroring the Reference Layout -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            
            @php
                $p1 = $projects->firstWhere('slug', 'bewole-furniture-jepara') ?? $projects->get(0);
                $p2 = $projects->firstWhere('slug', 'website-portfolio-pribadi') ?? $projects->get(1);
                $p3 = $projects->firstWhere('slug', 'desain-konten-media-sosial') ?? $projects->get(2);
                $p4 = $projects->firstWhere('slug', 'website-ecommerce-aziziscakes') ?? $projects->get(3);
            @endphp

            <!-- Project 1: Website E-Commerce Bewole Furniture Jepara (Large Featured Spotlight Card) -->
            @if($p1)
                <div class="md:col-span-8 group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm hover:shadow-xl hover:border-blue-300 dark:hover:border-blue-700/60 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 items-center">
                        <div class="sm:col-span-7 space-y-4">
                            <!-- Category Badges -->
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 text-[11px] font-bold uppercase tracking-wider">
                                    E-COMMERCE
                                </span>
                                <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 text-[11px] font-bold uppercase tracking-wider">
                                    LARAVEL 13
                                </span>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ $p1->title }}
                            </h3>

                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed line-clamp-3">
                                {{ $p1->description }}
                            </p>

                            <!-- Tech Stack Pills -->
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                @foreach(array_slice($p1->technologies ?? [], 0, 4) as $tech)
                                    <span class="px-2.5 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>

                            <div class="pt-3">
                                <a 
                                    href="{{ route('projects.show', $p1->slug) }}" 
                                    class="inline-flex items-center text-sm font-semibold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"
                                >
                                    <span>Explore Project</span>
                                    <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card Mockup Image Preview -->
                        <div class="sm:col-span-5 relative">
                            <div class="rounded-2xl overflow-hidden shadow-md border border-slate-100 dark:border-slate-800 transform group-hover:scale-[1.03] transition-transform duration-300">
                                <img 
                                    src="{{ asset($p1->image ?? 'images/projects/bewole-furniture.jpg') }}?v={{ file_exists(public_path($p1->image ?? 'images/projects/bewole-furniture.jpg')) ? filemtime(public_path($p1->image ?? 'images/projects/bewole-furniture.jpg')) : 1 }}" 
                                    alt="{{ $p1->title }}" 
                                    class="w-full h-auto aspect-[4/3] object-cover"
                                    loading="lazy"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Project 2: Website Portfolio Pribadi (Solid Blue Styled Card) -->
            @if($p2)
                <div class="md:col-span-4 group relative rounded-3xl bg-blue-600 text-white p-6 sm:p-8 shadow-md hover:shadow-xl hover:bg-blue-700 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <!-- Decorative Background Elements -->
                    <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-white/10 rounded-full blur-xl pointer-events-none"></div>

                    <div class="space-y-4 relative z-10">
                        <!-- Icon Badge -->
                        <div class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-white tracking-tight">
                            {{ $p2->title }}
                        </h3>

                        <p class="text-sm text-blue-100 leading-relaxed line-clamp-3">
                            {{ $p2->description }}
                        </p>

                        <!-- Tech Stack Pills -->
                        <div class="flex flex-wrap gap-1.5 pt-1">
                            @foreach(array_slice($p2->technologies ?? [], 0, 4) as $tech)
                                <span class="px-2.5 py-0.5 rounded-md bg-white/20 text-white text-xs font-medium">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>

                        <!-- Card Mockup Image Preview -->
                        <div class="rounded-2xl overflow-hidden shadow-md border border-white/20 transform group-hover:scale-[1.02] transition-transform duration-300 mt-2">
                            <img 
                                src="{{ asset($p2->image ?? 'images/projects/portfolio.jpg') }}?v={{ file_exists(public_path($p2->image ?? 'images/projects/portfolio.jpg')) ? filemtime(public_path($p2->image ?? 'images/projects/portfolio.jpg')) : 1 }}" 
                                alt="{{ $p2->title }}" 
                                class="w-full h-auto aspect-[16/9] object-cover"
                                loading="lazy"
                            >
                        </div>
                    </div>

                    <div class="pt-6 relative z-10">
                        <a 
                            href="{{ route('projects.show', $p2->slug) }}" 
                            class="inline-flex items-center text-sm font-semibold text-white hover:text-blue-200 transition-colors"
                        >
                            <span>Explore Project</span>
                            <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

            <!-- Project 3: Desain Konten Media Sosial (Clean Minimalist Card) -->
            @if($p3)
                <div class="md:col-span-4 group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm hover:shadow-xl hover:border-blue-300 dark:hover:border-blue-700/60 transition-all duration-300 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ $p3->title }}
                        </h3>

                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed line-clamp-3">
                            {{ $p3->description }}
                        </p>

                        <!-- Tech Stack Pills -->
                        <div class="flex flex-wrap gap-1.5 pt-1">
                            @foreach(array_slice($p3->technologies ?? [], 0, 3) as $tech)
                                <span class="px-2.5 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-medium">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-6">
                        <a 
                            href="{{ route('projects.show', $p3->slug) }}" 
                            class="inline-flex items-center text-sm font-semibold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"
                        >
                            <span>Explore Project</span>
                            <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

            <!-- Project 4: Website E-Commerce Aziziscakes (Spotlight Card with Image Preview) -->
            @if($p4)
                <div class="md:col-span-8 group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm hover:shadow-xl hover:border-blue-300 dark:hover:border-blue-700/60 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 items-center">
                        <div class="sm:col-span-7 space-y-4">
                            <!-- Category Badges -->
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 text-[11px] font-bold uppercase tracking-wider">
                                    COMPANY PROFILE
                                </span>
                                <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 text-[11px] font-bold uppercase tracking-wider">
                                    LARAVEL 13
                                </span>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ $p4->title }}
                            </h3>

                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed line-clamp-3">
                                {{ $p4->description }}
                            </p>

                            <!-- Tech Stack Pills -->
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                @foreach(array_slice($p4->technologies ?? [], 0, 4) as $tech)
                                    <span class="px-2.5 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>

                            <div class="pt-3">
                                <a 
                                    href="{{ route('projects.show', $p4->slug) }}" 
                                    class="inline-flex items-center text-sm font-semibold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"
                                >
                                    <span>Explore Project</span>
                                    <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card Mockup Image Preview -->
                        <div class="sm:col-span-5 relative">
                            <div class="rounded-2xl overflow-hidden shadow-md border border-slate-100 dark:border-slate-800 transform group-hover:scale-[1.03] transition-transform duration-300">
                                <img 
                                    src="{{ asset($p4->image ?? 'images/projects/azizicake.jpg') }}?v={{ file_exists(public_path($p4->image ?? 'images/projects/azizicake.jpg')) ? filemtime(public_path($p4->image ?? 'images/projects/azizicake.jpg')) : 1 }}" 
                                    alt="{{ $p4->title }}" 
                                    class="w-full h-auto aspect-[4/3] object-cover"
                                    loading="lazy"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
