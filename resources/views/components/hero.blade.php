<section id="home" class="relative pt-32 sm:pt-36 lg:pt-40 pb-16 lg:pb-24 overflow-hidden">
    <!-- Subtle Background Glow -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-gradient-to-tr from-emerald-500/15 via-teal-400/10 to-emerald-950/5 blur-[130px] rounded-full pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <!-- Left Content Column -->
            <div class="lg:col-span-7 flex flex-col items-start space-y-6 text-left">

                <!-- Availability Status Badge -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-50/90 dark:bg-emerald-950/60 border border-emerald-200/80 dark:border-emerald-800/60 text-emerald-950 dark:text-emerald-300 text-xs font-semibold tracking-wide shadow-sm shadow-emerald-500/10">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_8px_#10b981]"></span>
                    <span>Siswa PPLG • SMKN 1 Bangsri</span>
                </div>

                <!-- Main Heading -->
                <div class="space-y-1">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.12]">
                        Hi, I'm <br class="hidden sm:inline">
                        <span class="bg-gradient-to-r from-[#022c22] via-[#064e3b] to-[#059669] bg-clip-text text-transparent dark:from-emerald-400 dark:via-emerald-300 dark:to-teal-300">Reyno Andrean</span> <br>
                        <span class="bg-gradient-to-r from-[#022c22] via-[#064e3b] to-[#059669] bg-clip-text text-transparent dark:from-emerald-400 dark:via-emerald-300 dark:to-teal-300">Wijaksono</span>
                    </h1>
                </div>

                <!-- Subtitle / Roles -->
                <p class="text-sm sm:text-base font-semibold text-slate-700 dark:text-slate-300 flex flex-wrap items-center gap-x-2 gap-y-1">
                    <span>Web Development</span>
                    <span class="text-emerald-600 dark:text-emerald-400 font-bold">•</span>
                    <span>Graphic Design</span>
                    <span class="text-emerald-600 dark:text-emerald-400 font-bold">•</span>
                    <span>UI/UX Design</span>
                </p>

                <!-- Pitch Description -->
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-400 max-w-xl leading-relaxed">
                    Siswa SMKN 1 Bangsri jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) dengan keahlian dalam pengembangan website modern dan desain grafis kreatif.
                </p>

                <!-- Action CTAs -->
                <div class="flex flex-wrap items-center gap-4 pt-2 w-full sm:w-auto">
                    <a
                        href="#projects"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-gradient-to-r from-[#022c22] via-[#064e3b] to-[#047857] hover:from-[#064e3b] hover:via-[#047857] hover:to-[#059669] text-white font-semibold text-sm shadow-lg shadow-emerald-950/25 hover:shadow-emerald-600/35 border border-emerald-500/30 transition-all duration-300 group">
                        <span>View Projects</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>

                    <a
                        href="{{ route('cv.download') }}"
                        download
                        data-turbo="false"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-white/90 dark:bg-slate-900 border border-emerald-900/20 dark:border-slate-800 hover:border-emerald-500 hover:bg-emerald-50/50 dark:hover:bg-slate-800 text-emerald-950 dark:text-slate-200 font-semibold text-sm transition-all duration-200 shadow-sm group">
                        <span>Download CV</span>
                        <svg class="w-4 h-4 ml-2 text-emerald-700 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Visual Column (Custom Built Background Elements + Cutout Person Photo) -->
            <div class="lg:col-span-5 relative flex justify-center items-center">
                <div class="relative w-full max-w-[440px] sm:max-w-[480px] flex items-center justify-center">

                    <!-- Layer 1: Multi-layered Dynamic Ambient Glow Shadows -->
                    <div class="absolute -inset-6 bg-gradient-to-tr from-emerald-600/35 via-teal-400/25 to-[#022c22]/35 rounded-full blur-[80px] pointer-events-none animate-pulse-slow"></div>
                    <div class="absolute top-1/4 -right-10 w-64 h-64 bg-emerald-400/30 dark:bg-emerald-400/40 rounded-full blur-[65px] pointer-events-none"></div>
                    <div class="absolute -bottom-6 -left-10 w-72 h-72 bg-[#064e3b]/35 dark:bg-emerald-500/35 rounded-full blur-[75px] pointer-events-none"></div>

                    <!-- Layer 2: Custom Built 3D Disc & Curved Wing Elements in Luminous Deep Dark Green -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none">
                        <svg class="w-[118%] h-[118%] -translate-y-10 sm:-translate-y-12" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <radialGradient id="customDiscGrad" cx="35%" cy="30%" r="70%">
                                    <stop offset="0%" stop-color="#059669"/>
                                    <stop offset="30%" stop-color="#047857"/>
                                    <stop offset="60%" stop-color="#064e3b"/>
                                    <stop offset="85%" stop-color="#022c22"/>
                                    <stop offset="100%" stop-color="#011913"/>
                                </radialGradient>
                                <linearGradient id="customRimGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#a7f3d0"/>
                                    <stop offset="40%" stop-color="#34d399"/>
                                    <stop offset="80%" stop-color="#059669" stop-opacity="0.6"/>
                                    <stop offset="100%" stop-color="#064e3b" stop-opacity="0.1"/>
                                </linearGradient>
                                <linearGradient id="customWingGrad" x1="10%" y1="60%" x2="95%" y2="20%">
                                    <stop offset="0%" stop-color="#022c22"/>
                                    <stop offset="50%" stop-color="#065f46"/>
                                    <stop offset="80%" stop-color="#059669"/>
                                    <stop offset="100%" stop-color="#34d399"/>
                                </linearGradient>
                                <linearGradient id="customWingStroke" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#34d399" stop-opacity="0.3"/>
                                    <stop offset="60%" stop-color="#6ee7b7"/>
                                    <stop offset="100%" stop-color="#d1fae5"/>
                                </linearGradient>
                                <filter id="emeraldGlowEffect" x="-30%" y="-30%" width="160%" height="160%">
                                    <feGaussianBlur stdDeviation="7" result="blur"/>
                                    <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                                </filter>
                            </defs>

                            <!-- Lower Left Organic Curved Accent -->
                            <path d="M 70 330 C 45 295 55 240 105 220 C 150 205 195 230 205 270 C 215 315 170 355 115 360 C 85 362 75 345 70 330 Z" 
                                  fill="url(#customDiscGrad)" 
                                  opacity="0.9" 
                                  filter="drop-shadow(0 15px 30px rgba(2, 44, 34, 0.45))" />

                            <!-- Main 3D Tilted Circular Disc -->
                            <ellipse cx="270" cy="235" rx="160" ry="160" 
                                     fill="url(#customDiscGrad)" 
                                     stroke="url(#customRimGrad)" 
                                     stroke-width="2.5" 
                                     filter="drop-shadow(0 20px 40px rgba(2, 44, 34, 0.55))" />

                            <!-- Glowing Emerald Arc Rim Light -->
                            <path d="M 125 190 A 160 160 0 0 1 395 135" 
                                  stroke="#34d399" 
                                  stroke-width="3" 
                                  stroke-linecap="round" 
                                  opacity="0.9" 
                                  filter="url(#emeraldGlowEffect)" />

                            <!-- Right Curved Wing / Swoosh extending outward -->
                            <path d="M 240 265 C 300 240 375 210 425 205 C 445 203 452 215 438 232 C 405 270 330 310 270 325 Z" 
                                  fill="url(#customWingGrad)" 
                                  stroke="url(#customWingStroke)" 
                                  stroke-width="2" 
                                  filter="drop-shadow(0 12px 25px rgba(52, 211, 153, 0.45))" />
                        </svg>
                    </div>

                    <!-- Layer 3: The Person's Cutout Photo (Completely Transparent, Cardless) -->
                    <div class="relative z-10 w-full flex justify-center">
                        <img
                            src="{{ asset('images/reyno-real-cutout.png') }}?v={{ file_exists(public_path('images/reyno-real-cutout.png')) ? filemtime(public_path('images/reyno-real-cutout.png')) : 1 }}"
                            alt="Reyno Andrean Wijaksono - Developer"
                            class="w-full h-auto max-h-[480px] sm:max-h-[520px] object-contain select-none transition-transform duration-500 hover:scale-[1.02] drop-shadow-[0_15px_30px_rgba(2,44,34,0.3)] dark:drop-shadow-[0_20px_40px_rgba(0,0,0,0.5)]"
                            loading="eager">
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>