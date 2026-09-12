<section id="about" class="py-20 lg:py-24 bg-white/60 dark:bg-slate-900/40 border-y border-slate-200/60 dark:border-slate-800/60 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center justify-center text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                About Me
            </h2>
            <div class="w-12 h-1 bg-blue-600 rounded-full mt-3"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Profile Photo & Bio Card -->
            <div class="lg:col-span-4 flex flex-col items-start space-y-4">
                <div class="w-full relative group">
                    <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-md">
                        <img 
                            src="{{ asset('images/profile.jpg') }}?v={{ file_exists(public_path('images/profile.jpg')) ? filemtime(public_path('images/profile.jpg')) : 1 }}" 
                            alt="Reyno Andrean Wijaksono" 
                            class="w-full aspect-[4/4.5] object-cover object-center transform group-hover:scale-[1.02] transition-transform duration-500"
                            loading="lazy"
                        >
                    </div>
                </div>

                <div class="space-y-3 pt-1">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                        Reyno Andrean Wijaksono
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Saya adalah siswa SMKN 1 Bangsri jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) yang memiliki minat besar di bidang pengembangan website dan desain grafis.
                    </p>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Memiliki kemampuan dalam membangun website menggunakan Laravel, PHP, MySQL, HTML, CSS, JavaScript, dan Tailwind CSS serta mampu membuat desain visual menggunakan Figma dan Canva.
                    </p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 italic">
                        Senang mempelajari teknologi baru, mampu bekerja individu maupun tim, dan bersemangat terus berkembang di industri kreatif.
                    </p>
                </div>
            </div>

            <!-- Right: Highlights Grid & Education Timeline -->
            <div class="lg:col-span-8 flex flex-col space-y-10">
                
                <!-- 4 CV Highlights Cards -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                    <!-- Highlight 1: Location -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-sm hover:shadow-md hover:border-blue-300 dark:hover:border-blue-700/60 transition-all text-center flex flex-col justify-between">
                        <span class="block text-xs font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400 mb-2">
                            Lokasi
                        </span>
                        <span class="block text-base sm:text-lg font-bold text-slate-900 dark:text-white tracking-tight leading-tight">
                            Mlonggo, Jepara
                        </span>
                        <span class="block text-[11px] font-medium text-slate-500 dark:text-slate-400 mt-2">
                            Jawa Tengah, ID
                        </span>
                    </div>

                    <!-- Highlight 2: Education -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-sm hover:shadow-md hover:border-blue-300 dark:hover:border-blue-700/60 transition-all text-center flex flex-col justify-between">
                        <span class="block text-xs font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400 mb-2">
                            Pendidikan
                        </span>
                        <span class="block text-base sm:text-lg font-bold text-slate-900 dark:text-white tracking-tight leading-tight">
                            SMKN 1 Bangsri
                        </span>
                        <span class="block text-[11px] font-medium text-slate-500 dark:text-slate-400 mt-2">
                            PPLG (2024 – Sekarang)
                        </span>
                    </div>

                    <!-- Highlight 3: Focus -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-sm hover:shadow-md hover:border-blue-300 dark:hover:border-blue-700/60 transition-all text-center flex flex-col justify-between">
                        <span class="block text-xs font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400 mb-2">
                            Fokus Utama
                        </span>
                        <span class="block text-base sm:text-lg font-bold text-slate-900 dark:text-white tracking-tight leading-tight">
                            Web & Desain
                        </span>
                        <span class="block text-[11px] font-medium text-slate-500 dark:text-slate-400 mt-2">
                            Laravel & Figma
                        </span>
                    </div>

                    <!-- Highlight 4: Languages -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-sm hover:shadow-md hover:border-blue-300 dark:hover:border-blue-700/60 transition-all text-center flex flex-col justify-between">
                        <span class="block text-xs font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400 mb-2">
                            Bahasa
                        </span>
                        <span class="block text-base sm:text-lg font-bold text-slate-900 dark:text-white tracking-tight leading-tight">
                            Indonesia & Inggris
                        </span>
                        <span class="block text-[11px] font-medium text-slate-500 dark:text-slate-400 mt-2">
                            Aktif & Dasar
                        </span>
                    </div>
                </div>

                <!-- Education & Activity Timeline -->
                <div class="p-6 sm:p-7 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center space-x-2.5 mb-6 text-blue-600 dark:text-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                        <h4 class="text-sm font-bold tracking-wide uppercase text-slate-900 dark:text-white">
                            Pendidikan & Aktivitas
                        </h4>
                    </div>

                    <div class="relative pl-6 border-l-2 border-blue-200 dark:border-slate-700 space-y-6">
                        <!-- Education: SMKN 1 Bangsri -->
                        <div class="relative group">
                            <span class="absolute -left-[31px] top-1.5 w-3.5 h-3.5 rounded-full bg-blue-600 ring-4 ring-white dark:ring-slate-900"></span>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-md bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-400 text-xs font-semibold">
                                    2024 – Sekarang
                                </span>
                                <span class="text-xs text-slate-400 font-medium">Bangsri, Jepara</span>
                            </div>
                            <h5 class="text-base font-bold text-slate-900 dark:text-white mt-1.5">
                                SMK Negeri 1 Bangsri
                            </h5>
                            <p class="text-xs sm:text-sm font-medium text-blue-600 dark:text-blue-400 mt-0.5">
                                Pengembangan Perangkat Lunak dan Gim (PPLG)
                            </p>
                            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
                                Membangun website menggunakan Laravel, PHP, MySQL, HTML, CSS, JavaScript, dan Tailwind CSS serta mendesain antarmuka visual dengan Figma dan Canva.
                            </p>
                        </div>

                        <!-- Organization: Voli SMKN 1 Bangsri -->
                        <div class="relative group">
                            <span class="absolute -left-[31px] top-1.5 w-3.5 h-3.5 rounded-full bg-slate-400 dark:bg-slate-600 ring-4 ring-white dark:ring-slate-900"></span>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-semibold">
                                    2024 – Sekarang
                                </span>
                                <span class="text-xs text-slate-400 font-medium">Ekstrakurikuler</span>
                            </div>
                            <h5 class="text-base font-bold text-slate-900 dark:text-white mt-1.5">
                                Ekstrakurikuler Bola Voli SMKN 1 Bangsri
                            </h5>
                            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
                                Mengembangkan kemampuan kerja sama tim, komunikasi yang baik, disiplin berolahraga, dan manajemen waktu yang seimbang dengan kegiatan akademik.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
