@props(['skills' => []])

<section id="skills" class="py-20 lg:py-28 relative overflow-hidden">
    <!-- Ambient Background Lighting & Subtle 3D Glass Orbs -->
    <div class="absolute top-1/4 -right-20 w-80 h-80 bg-emerald-500/10 dark:bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -left-20 w-80 h-80 bg-teal-500/10 dark:bg-emerald-950/40 rounded-full blur-3xl pointer-events-none"></div>
    
    <!-- 3D Floating Liquid Glass Emerald Orb (Echoing user visual reference) -->
    <div class="skill-floating-orb hidden lg:block w-14 h-14 -top-6 right-12 opacity-80 pointer-events-none z-10" aria-hidden="true"></div>
    <div class="skill-floating-orb hidden md:block w-8 h-8 bottom-16 left-8 opacity-60 pointer-events-none z-10" style="animation-delay: -3s;" aria-hidden="true"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
        
        <!-- Section Header (Aligned with user visual reference) -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 dark:bg-emerald-950/70 border border-emerald-500/25 text-emerald-800 dark:text-emerald-300 text-xs font-bold tracking-wider uppercase mb-3 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>KEAHLIAN & TEKNOLOGI</span>
            </div>
            
            <!-- Headline -->
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                <span class="bg-gradient-to-r from-[#022c22] via-[#064e3b] to-[#059669] dark:from-white dark:via-emerald-200 dark:to-emerald-400 bg-clip-text text-transparent">
                    Teknologi & Perangkat Lunak
                </span> <br class="hidden sm:block"> yang Saya Kuasai
            </h2>
            
            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 max-w-2xl mt-4 leading-relaxed">
                Teknologi, bahasa pemrograman, dan tools pengembangan web yang aktif saya pelajari dan gunakan dalam pembuatan proyek web.
            </p>

            <!-- Category Filter Tabs (Liquid Glass Capsule Switcher) -->
            <div class="mt-8 p-1.5 rounded-full liquid-glass-nav border border-emerald-900/10 dark:border-emerald-500/20 inline-flex flex-wrap items-center justify-center gap-1 shadow-sm">
                <button type="button" onclick="filterSkills('all', this)" class="skill-filter-btn active px-4 py-2 rounded-full text-xs sm:text-sm font-semibold cursor-pointer">
                    Semua (12)
                </button>
                <button type="button" onclick="filterSkills('web', this)" class="skill-filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 cursor-pointer">
                    Web & Backend
                </button>
                <button type="button" onclick="filterSkills('tools', this)" class="skill-filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 cursor-pointer">
                    Tools & Workflow
                </button>
                <button type="button" onclick="filterSkills('design', this)" class="skill-filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-900 dark:hover:text-emerald-300 cursor-pointer">
                    UI/UX & Desain
                </button>
            </div>
        </div>

        <!-- 3D Liquid Glass Grid of 12 Technologies (2 rows of 6 on large screens) -->
        <div id="skills-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-5">
            
            <!-- 1. Laravel -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #FF2D20; --skill-glow: rgba(255, 45, 32, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(255,45,32,0.5)]" viewBox="0 0 24 24" fill="none">
                        <path d="M23.604 9.076a.75.75 0 00-.36-.643L13.88.581a.75.75 0 00-.76 0L3.756 6.012a.75.75 0 00-.36.643v5.696a.75.75 0 00.36.643l2.845 1.63a.75.75 0 00.76 0l2.465-1.412v2.825a.75.75 0 00.36.643l6.638 3.805a.75.75 0 00.76 0l5.88-3.37a.75.75 0 00.36-.643V9.076z" fill="#FF2D20"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-red-500 transition-colors">Laravel</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Framework</span>
                </div>
            </div>

            <!-- 2. PHP -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #777BB4; --skill-glow: rgba(119, 123, 180, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-9 h-9 drop-shadow-[0_0_8px_rgba(119,123,180,0.5)]" viewBox="0 0 24 24" fill="#777BB4">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-5 13.5l1.2-6h2.1c1.2 0 1.9.6 1.7 1.8-.3 1.3-1.1 2.2-2.3 2.2H8.3l-.6 2H7zm6.7 0l1.2-6h2.1c1.2 0 1.9.6 1.7 1.8-.3 1.3-1.1 2.2-2.3 2.2H15l-.6 2h-1.3zM10.8 11h.7c.6 0 .9-.3 1.1-.9.1-.5 0-.8-.5-.8h-.8l-.5 1.7zm6.7 0h.7c.6 0 .9-.3 1.1-.9.1-.5 0-.8-.5-.8h-.8l-.5 1.7z"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-indigo-400 transition-colors">PHP</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Language</span>
                </div>
            </div>

            <!-- 3. MySQL -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #00758F; --skill-glow: rgba(0, 117, 143, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-9 h-9 drop-shadow-[0_0_8px_rgba(0,117,143,0.5)]" viewBox="0 0 24 24" fill="#00758F">
                        <ellipse cx="12" cy="6" rx="8" ry="3"/>
                        <path d="M4 6v6c0 1.66 3.58 3 8 3s8-1.34 8-3V6" fill="none" stroke="#00758F" stroke-width="2"/>
                        <path d="M4 12v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6" fill="none" stroke="#00758F" stroke-width="2"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cyan-500 transition-colors">MySQL</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Database</span>
                </div>
            </div>

            <!-- 4. MongoDB -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #47A248; --skill-glow: rgba(71, 162, 72, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(71,162,72,0.5)]" viewBox="0 0 24 24" fill="#47A248">
                        <path d="M12 1.5C11.5 1.5 12 1.6 12 1.6c-.6.4-5 3.9-5 9.7 0 4.8 3.5 7.9 4.8 9 0 .4.1.8.2 1.2.1.2.2.4.4.5.2-.1.3-.3.4-.5.1-.4.2-.8.2-1.2 1.3-1.1 4.8-4.2 4.8-9 0-5.8-4.4-9.3-5-9.7 0 0 .1-.1-.8-.1zm0 17.5v-16c.3.3 4.2 3.3 4.2 8.3 0 4.2-2.9 6.8-4.2 7.7z"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-emerald-500 transition-colors">MongoDB</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">NoSQL DB</span>
                </div>
            </div>

            <!-- 5. Tailwind CSS -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #06B6D4; --skill-glow: rgba(6, 182, 212, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(6,182,212,0.5)]" viewBox="0 0 24 24" fill="#06B6D4">
                        <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cyan-400 transition-colors">Tailwind CSS</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Styling</span>
                </div>
            </div>

            <!-- 6. JavaScript -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #F7DF1E; --skill-glow: rgba(247, 223, 30, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-[#F7DF1E]/90 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <span class="font-extrabold text-black text-xl tracking-tighter">JS</span>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-amber-400 transition-colors">JavaScript</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Language</span>
                </div>
            </div>

            <!-- 7. React -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="web" style="--skill-color: #61DAFB; --skill-glow: rgba(97, 218, 251, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(97,218,251,0.6)]" viewBox="0 0 24 24" fill="none" stroke="#61DAFB" stroke-width="1.8">
                        <ellipse cx="12" cy="12" rx="10" ry="4"/>
                        <ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(60 12 12)"/>
                        <ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(120 12 12)"/>
                        <circle cx="12" cy="12" r="1.8" fill="#61DAFB"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cyan-400 transition-colors">React</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Library</span>
                </div>
            </div>

            <!-- 8. Postman -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="tools" style="--skill-color: #FF6C37; --skill-glow: rgba(255, 108, 55, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(255,108,55,0.5)]" viewBox="0 0 24 24" fill="#FF6C37">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 6v6l4 2" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M15 8l3-2m-3 10l3 2M9 8L6 6m3 10l-3 2" stroke="white" stroke-width="1.5"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-orange-400 transition-colors">Postman</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">API Testing</span>
                </div>
            </div>

            <!-- 9. Figma -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="design" style="--skill-color: #F24E1E; --skill-glow: rgba(242, 78, 30, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(242,78,30,0.5)]" viewBox="0 0 24 24" fill="none">
                        <path d="M8 2h4a4 4 0 0 1 4 4 4 4 0 0 1-4 4H8V2z" fill="#FF7262"/>
                        <path d="M4 6a4 4 0 0 1 4-4h4v8H8a4 4 0 0 1-4-4z" fill="#F24E1E"/>
                        <path d="M4 14a4 4 0 0 1 4-4h4v8H8a4 4 0 0 1-4-4z" fill="#A259FF"/>
                        <path d="M4 22a4 4 0 0 1 4-4h4v4a4 4 0 0 1-4 4 4 4 0 0 1-4-4z" fill="#0ACF83"/>
                        <circle cx="16" cy="14" r="4" fill="#1ABCFE"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-purple-400 transition-colors">Figma</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">UI/UX Design</span>
                </div>
            </div>

            <!-- 10. Canva -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="design" style="--skill-color: #00C4CC; --skill-glow: rgba(0, 196, 204, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-[#00C4CC]/15 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <span class="font-extrabold text-[#00C4CC] text-2xl font-serif">C</span>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cyan-400 transition-colors">Canva</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Design Visual</span>
                </div>
            </div>

            <!-- 11. VS Code -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="tools" style="--skill-color: #007ACC; --skill-glow: rgba(0, 122, 204, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(0,122,204,0.5)]" viewBox="0 0 24 24" fill="#007ACC">
                        <path d="M17.5 2.5l4.5 2.5v14l-4.5 2.5-10-8.5 10-10.5zm-5.5 9.5l-8 7-2-1 6-6-6-6 2-1 8 7z"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-blue-400 transition-colors">VS Code</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Code Editor</span>
                </div>
            </div>

            <!-- 12. Git & GitHub -->
            <div class="skill-glass-tile p-5 flex flex-col items-center justify-between text-center group cursor-pointer" data-category="tools" style="--skill-color: #10B981; --skill-glow: rgba(16, 185, 129, 0.45);">
                <div class="skill-sheen"></div>
                <div class="w-14 h-14 rounded-2xl bg-white/80 dark:bg-slate-900/80 shadow-xs flex items-center justify-center group-hover:scale-110 transition-transform duration-300 mt-1">
                    <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(16,185,129,0.5)] text-slate-800 dark:text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-emerald-400 transition-colors">Git & GitHub</h3>
                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">Version Control</span>
                </div>
            </div>

        </div>

        <!-- Complementary Soft Skills Grid (Bottom Ribbon) -->
        <div class="mt-14 pt-10 border-t border-slate-200/60 dark:border-slate-800/80">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Interpersonal & Soft Skills</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Kemampuan kolaborasi, adaptabilitas, dan pemecahan masalah dalam tim kerja</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-800 dark:text-emerald-300 text-xs font-bold border border-emerald-500/20">
                    5 Nilai Utama
                </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3.5">
                <div class="skill-glass-tile p-3.5 flex items-center space-x-3 group cursor-pointer" style="--skill-color: #10b981; --skill-glow: rgba(16, 185, 129, 0.35);">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <span class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">Problem Solving</span>
                </div>

                <div class="skill-glass-tile p-3.5 flex items-center space-x-3 group cursor-pointer" style="--skill-color: #10b981; --skill-glow: rgba(16, 185, 129, 0.35);">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <span class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">Kerja Sama Tim</span>
                </div>

                <div class="skill-glass-tile p-3.5 flex items-center space-x-3 group cursor-pointer" style="--skill-color: #10b981; --skill-glow: rgba(16, 185, 129, 0.35);">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <span class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">Komunikasi</span>
                </div>

                <div class="skill-glass-tile p-3.5 flex items-center space-x-3 group cursor-pointer" style="--skill-color: #10b981; --skill-glow: rgba(16, 185, 129, 0.35);">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">Manajemen Waktu</span>
                </div>

                <div class="skill-glass-tile p-3.5 flex items-center space-x-3 group cursor-pointer" style="--skill-color: #10b981; --skill-glow: rgba(16, 185, 129, 0.35);">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <span class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">Cepat Adaptasi</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Vanilla JavaScript Filter Handler for Skills Grid -->
    <script>
        function filterSkills(category, btn) {
            const buttons = document.querySelectorAll('.skill-filter-btn');
            buttons.forEach(b => {
                b.classList.remove('active', 'font-semibold');
                b.classList.add('font-medium', 'text-slate-600', 'dark:text-slate-300');
            });
            btn.classList.add('active', 'font-semibold');
            btn.classList.remove('font-medium', 'text-slate-600', 'dark:text-slate-300');

            const tiles = document.querySelectorAll('#skills-grid .skill-glass-tile');
            tiles.forEach(tile => {
                const tileCategory = tile.getAttribute('data-category');
                if (category === 'all' || tileCategory === category) {
                    tile.style.display = 'flex';
                    tile.style.opacity = '0';
                    tile.style.transform = 'scale(0.92)';
                    setTimeout(() => {
                        tile.style.transition = 'all 0.35s cubic-bezier(0.34, 1.4, 0.64, 1)';
                        tile.style.opacity = '1';
                        tile.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    tile.style.display = 'none';
                }
            });
        }
    </script>
</section>

