@props(['experiences' => []])

<section id="experience" class="py-20 lg:py-24 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center justify-center text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Pendidikan & Organisasi
            </h2>
            <div class="w-12 h-1 bg-blue-600 rounded-full mt-3"></div>
            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 max-w-xl mt-4">
                Riwayat pendidikan kejuruan dan aktivitas organisasi ekstrakurikuler di sekolah.
            </p>
        </div>

        <!-- Vertical Timeline -->
        <div class="relative pl-6 sm:pl-8 border-l-2 border-blue-200 dark:border-slate-800 space-y-12">
            
            @foreach($experiences as $exp)
                <div class="relative group">
                    <!-- Glowing Marker Node -->
                    <div class="absolute -left-[31px] sm:-left-[39px] top-1.5 w-4 h-4 rounded-full {{ $exp->is_current ? 'bg-blue-600 ring-4 ring-blue-100 dark:ring-blue-950 shadow-md shadow-blue-500/50' : 'bg-slate-300 dark:bg-slate-600 ring-4 ring-white dark:ring-slate-900' }} transition-all"></div>

                    <div class="p-6 sm:p-7 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-md hover:border-blue-300 dark:hover:border-blue-700/60 transition-all">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-3">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                    {{ $exp->position }}
                                </h3>
                                <p class="text-sm font-semibold text-blue-600 dark:text-blue-400 mt-0.5">
                                    {{ $exp->company }} <span class="text-slate-400 font-normal">({{ $exp->location ?? 'Indonesia' }})</span>
                                </p>
                            </div>

                            <span class="inline-flex self-start sm:self-auto px-3 py-1 rounded-full {{ $exp->is_current ? 'bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-bold' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-medium' }} text-xs">
                                {{ $exp->period }}
                            </span>
                        </div>

                        @if($exp->description)
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4 leading-relaxed">
                                {{ $exp->description }}
                            </p>
                        @endif

                        @if(!empty($exp->responsibilities))
                            <ul class="space-y-2 text-xs sm:text-sm text-slate-600 dark:text-slate-400">
                                @foreach($exp->responsibilities as $resp)
                                    <li class="flex items-start space-x-2.5">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>{{ $resp }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if(!empty($exp->technologies))
                            <div class="flex flex-wrap gap-1.5 pt-4 mt-4 border-t border-slate-100 dark:border-slate-800/80">
                                @foreach($exp->technologies as $tech)
                                    <span class="px-2.5 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
