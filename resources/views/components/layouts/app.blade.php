<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Reyno Andrean Wijaksono — Web Development & Graphic Design' }}</title>
    <meta name="description" content="{{ $description ?? 'Portfolio pribadi Reyno Andrean Wijaksono, siswa SMKN 1 Bangsri (PPLG) yang berfokus pada Web Development dan Graphic Design.' }}">
    <meta name="keywords" content="Reyno Andrean Wijaksono, Web Development, Graphic Design, Laravel, PHP, MySQL, Tailwind CSS, Figma, Canva, SMKN 1 Bangsri, PPLG">
    <meta name="author" content="Reyno Andrean Wijaksono">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Reyno Andrean Wijaksono — Web Development & Graphic Design' }}">
    <meta property="og:description" content="{{ $description ?? 'Portfolio pribadi Reyno Andrean Wijaksono, siswa SMKN 1 Bangsri (PPLG) yang berfokus pada Web Development dan Graphic Design.' }}">
    <meta property="og:image" content="{{ asset('images/profile.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Reyno Andrean Wijaksono — Web Development & Graphic Design' }}">
    <meta property="twitter:description" content="{{ $description ?? 'Portfolio pribadi Reyno Andrean Wijaksono, siswa SMKN 1 Bangsri (PPLG) yang berfokus pada Web Development dan Graphic Design.' }}">
    <meta property="twitter:image" content="{{ asset('images/profile.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='24' fill='%230057D9'/><text x='50%' y='55%' dominant-baseline='central' text-anchor='middle' font-family='sans-serif' font-weight='800' font-size='46' fill='white'>RA.</text></svg>">

    <!-- Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Dark Mode Initializer Script (Zero Flash) -->
    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }

        window.toggleTheme = function() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            window.dispatchEvent(new CustomEvent('theme-changed', { detail: { isDark } }));
        };
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-[#F8F9FC] dark:bg-[#051022] text-slate-900 dark:text-slate-100 font-sans antialiased selection:bg-blue-600 selection:text-white transition-colors duration-300 min-h-screen flex flex-col">

    <!-- Navbar Component -->
    <x-navbar />

    <!-- Main Content Slot -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer Component -->
    <x-footer />

    @livewireScripts

    <!-- Turbo & Navigation Lifecycle Handler -->
    <script>
        (function() {
            let activeScrollListener = null;

            function initScrollSpy() {
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('.nav-link');
                if (!sections.length || !navLinks.length) return;

                function highlightNav() {
                    const scrollY = window.pageYOffset;
                    sections.forEach(current => {
                        const sectionHeight = current.offsetHeight;
                        const sectionTop = current.offsetTop - 120;
                        const sectionId = current.getAttribute('id');

                        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                            navLinks.forEach(link => {
                                const href = link.getAttribute('href') || '';
                                if (href === `#${sectionId}` || (href === '/' && sectionId === 'home') || href.endsWith(`#${sectionId}`)) {
                                    link.classList.add('text-blue-600', 'dark:text-blue-400', 'font-semibold');
                                    link.classList.remove('text-slate-600', 'dark:text-slate-300');
                                } else if (href.includes('#')) {
                                    link.classList.remove('text-blue-600', 'dark:text-blue-400', 'font-semibold');
                                    link.classList.add('text-slate-600', 'dark:text-slate-300');
                                }
                            });
                        }
                    });
                }

                if (activeScrollListener) {
                    window.removeEventListener('scroll', activeScrollListener);
                }
                activeScrollListener = highlightNav;
                window.addEventListener('scroll', highlightNav, { passive: true });
                highlightNav();
            }

            // Runs on initial page load and every subsequent Turbo Drive visit
            document.addEventListener('turbo:load', () => {
                initScrollSpy();

                // Reconnect Livewire if present
                if (window.Livewire && typeof window.Livewire.rescan === 'function') {
                    window.Livewire.rescan();
                }
            });

            // Ensure clean state before Turbo caches DOM snapshot
            document.addEventListener('turbo:before-cache', () => {
                const drawer = document.getElementById('mobile-drawer');
                if (drawer && !drawer.classList.contains('hidden')) {
                    drawer.classList.add('hidden');
                }
            });
        })();
    </script>
</body>
</html>
