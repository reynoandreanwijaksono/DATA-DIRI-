@props(['experiences' => []])

<section id="experience" class="py-20 lg:py-24 relative bg-[#0B0B0D] dark:bg-transparent">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center justify-center text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#F5F5F5] dark:text-white tracking-tight">
                Pendidikan & Organisasi
            </h2>
            <div class="w-14 h-1.5 bg-gradient-to-r from-[#D4AF37] via-[#F1D27A] to-[#FF8C42] dark:from-[#022c22] dark:via-[#064e3b] dark:to-[#10b981] rounded-full mt-3 shadow-[0_0_12px_rgba(212,175,55,0.4)] dark:shadow-[0_0_10px_rgba(16,185,129,0.35)]"></div>
            <p class="text-sm sm:text-base text-[#B8B8BE] dark:text-slate-400 max-w-xl mt-4">
                Riwayat pendidikan kejuruan dan aktivitas organisasi ekstrakurikuler di sekolah.
            </p>
        </div>

        <!-- Vertical Timeline -->
        <div class="relative pl-6 sm:pl-8 border-l-2 border-[#D4AF37]/30 dark:border-slate-800 space-y-12">
            
            @foreach($experiences as $exp)
                <div class="relative group">
                    <!-- Glowing Marker Node -->
                    <div class="absolute -left-[31px] sm:-left-[39px] top-1.5 w-4 h-4 rounded-full {{ $exp->is_current ? 'bg-[#D4AF37] ring-4 ring-[#D4AF37]/20 dark:bg-[#064e3b] dark:ring-emerald-950 shadow-md shadow-[#D4AF37]/50 dark:shadow-emerald-500/50' : 'bg-[#242428] ring-4 ring-[#0B0B0D] border border-[#D4AF37]/30 dark:border-none dark:bg-slate-600 dark:ring-slate-900' }} transition-all"></div>

                    <div class="p-6 sm:p-7 rounded-2xl bg-[#1C1C1F] dark:bg-slate-900 border border-[rgba(212,175,55,0.22)] dark:border-slate-800 shadow-sm hover:shadow-lg hover:shadow-[rgba(212,175,55,0.08)] hover:border-[#D4AF37]/60 dark:hover:border-emerald-700/60 transition-all">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-3">
                            <div>
                                <h3 class="text-xl font-bold text-[#F5F5F5] dark:text-white">
                                    {{ $exp->position }}
                                </h3>
                                <p class="text-sm font-semibold text-[#D4AF37] dark:text-emerald-400 mt-0.5">
                                    {{ $exp->company }} <span class="text-[#85858E] dark:text-slate-400 font-normal">({{ $exp->location ?? 'Indonesia' }})</span>
                                </p>
                            </div>

                            <span class="inline-flex self-start sm:self-auto px-3 py-1 rounded-full {{ $exp->is_current ? 'bg-[#242428] dark:bg-emerald-950/60 text-[#F1D27A] dark:text-emerald-300 border border-[#D4AF37]/40 dark:border-emerald-200/60 font-bold' : 'bg-[#141416] dark:bg-slate-800 text-[#B8B8BE] dark:text-slate-400 border border-white/5 font-medium' }} text-xs">
                                {{ $exp->period }}
                            </span>
                        </div>

                        @if($exp->description)
                            <p class="text-sm text-[#B8B8BE] dark:text-slate-400 mb-4 leading-relaxed">
                                {{ $exp->description }}
                            </p>
                        @endif

                        @if(!empty($exp->responsibilities))
                            <ul class="space-y-2 text-xs sm:text-sm text-[#B8B8BE] dark:text-slate-400">
                                @foreach($exp->responsibilities as $resp)
                                    <li class="flex items-start space-x-2.5">
                                        <svg class="w-4 h-4 text-[#D4AF37] dark:text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>{{ $resp }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if(!empty($exp->technologies))
                            <div class="flex flex-wrap gap-1.5 pt-4 mt-4 border-t border-[rgba(212,175,55,0.12)] dark:border-slate-800/80">
                                @foreach($exp->technologies as $tech)
                                    <span class="px-2.5 py-0.5 rounded-md bg-[#242428] dark:bg-slate-800 text-[#F5F5F5] dark:text-slate-300 border border-white/5 text-xs font-medium">
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
