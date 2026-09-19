@props(['certifications' => []])

@if(count($certifications) > 0)
<section id="certifications" class="py-20 lg:py-24 bg-white/60 dark:bg-slate-900/40 border-y border-slate-200/60 dark:border-slate-800/60 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center justify-center text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Certifications
            </h2>
            <div class="w-14 h-1.5 bg-gradient-to-r from-[#022c22] via-[#064e3b] to-[#10b981] rounded-full mt-3 shadow-[0_0_10px_rgba(16,185,129,0.35)]"></div>
        </div>

        <!-- 3-Column Certifications Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($certifications as $cert)
                <div class="group rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-emerald-400 dark:hover:border-emerald-700/60 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                    
                    <div>
                        <!-- Certificate Mockup Image -->
                        <div class="relative overflow-hidden bg-slate-100 dark:bg-slate-800 aspect-[16/10] border-b border-slate-100 dark:border-slate-800">
                            <img 
                                src="{{ asset($cert->image ?? 'images/certificates/meta.jpg') }}" 
                                alt="{{ $cert->title }}" 
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                        </div>

                        <!-- Content Area -->
                        <div class="p-6 space-y-2">
                            <h3 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-emerald-800 dark:group-hover:text-emerald-400 transition-colors">
                                {{ $cert->title }}
                            </h3>

                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                {{ $cert->issuer }} • Issued {{ $cert->issued_date }}
                            </p>

                            @if(!empty($cert->skills))
                                <div class="flex flex-wrap gap-1.5 pt-2">
                                    @foreach(array_slice($cert->skills, 0, 3) as $skill)
                                        <span class="px-2 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-950/50 text-emerald-900 dark:text-emerald-300 border border-emerald-200/60 text-[11px] font-medium">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($cert->credential_url)
                        <div class="p-6 pt-0">
                            <a 
                                href="{{ $cert->credential_url }}" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="inline-flex items-center text-xs font-semibold text-emerald-800 dark:text-emerald-400 hover:text-emerald-600 transition-colors group/link"
                            >
                                <span>Verify Credential</span>
                                <svg class="w-3.5 h-3.5 ml-1 transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>

    </div>
</section>
@endif
