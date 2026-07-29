<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- AlpineJS (Untuk Fitur Buka/Tutup Menu HP) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Hover Line Effect pada Navbar */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #4f46e5;
            transition: width 0.3s ease-in-out;
            border-radius: 99px;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen antialiased selection:bg-indigo-500 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- NAVBAR -->
    <header class="sticky top-4 z-50 mx-4 md:mx-8">
        <nav class="glass px-6 py-3.5 rounded-2xl border border-white/60 shadow-xl shadow-slate-200/50 flex justify-between items-center transition-all duration-300">
            
            <!-- LOGO & BRAND -->
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-extrabold text-lg shadow-md shadow-indigo-200 group-hover:scale-105 transition duration-200">
                    AH
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900 group-hover:text-indigo-600 transition duration-200">
                    AmikomEventHub
                </span>
            </a>

            <!-- MENU NAVIGASI (DESKTOP) -->
            <div class="hidden md:flex items-center gap-8 font-medium text-slate-600 text-sm">
                <a href="/" class="text-indigo-600 font-bold nav-link">
                    Jelajahi
                </a>

                <a href="#events" class="hover:text-indigo-600 transition nav-link">
                    Kategori
                </a>

                <a href="{{ route('ticket') }}" class="hover:text-indigo-600 transition nav-link">
                    Tiket Saya
                </a>

                <a href="#about" class="hover:text-indigo-600 transition nav-link">
                    Tentang Kami
                </a>
            </div>

            <!-- HAMBURGER BUTTON (MOBILE) -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 focus:outline-none transition">
                <svg class="w-6 h-6" x-show="!mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-6 h-6" x-show="mobileMenuOpen" x-cloak fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </nav>

        <!-- MENU DROPDOWN (MOBILE) -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             x-cloak
             class="md:hidden mt-3 glass p-5 rounded-2xl border border-white/60 shadow-2xl flex flex-col gap-3 font-semibold text-slate-700 text-sm">
            
            <a href="/" @click="mobileMenuOpen = false" class="text-indigo-600 font-bold bg-indigo-50/80 p-3 rounded-xl">
                Jelajahi
            </a>

            <a href="#events" @click="mobileMenuOpen = false" class="hover:text-indigo-600 p-3 rounded-xl hover:bg-slate-100/80 transition">
                Kategori
            </a>

            <a href="{{ route('ticket') }}" @click="mobileMenuOpen = false" class="hover:text-indigo-600 p-3 rounded-xl hover:bg-slate-100/80 transition">
                Tiket Saya
            </a>

            <a href="#about" @click="mobileMenuOpen = false" class="hover:text-indigo-600 p-3 rounded-xl hover:bg-slate-100/80 transition">
                Tentang Kami
            </a>
        </div>
    </header>

    <!-- ISI HALAMAN -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER (WARNA INDIGO-900 ASLI TETAPI LEBIH RAPI & PROFESIONAL) -->
    <footer id="about" class="bg-indigo-900 text-indigo-100 py-16 px-6 mt-20 border-t border-indigo-800/60 relative overflow-hidden">
        <!-- Glow Effect Halus -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-32 bg-indigo-600/20 blur-3xl rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto text-center relative z-10 space-y-3">
            <div class="inline-flex items-center gap-3">
                <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-base shadow-md shadow-indigo-950">
                    AH
                </div>
                <h2 class="text-white font-extrabold text-2xl tracking-tight">AmikomEventHub</h2>
            </div>
            
            <p class="text-indigo-300 text-sm max-w-md mx-auto font-normal leading-relaxed">
                Platform tiket event terbaik untuk menemukan dan menghadiri berbagai acara kampus favorit Anda.
            </p>
        </div>

        <div class="max-w-7xl mx-auto mt-12 pt-6 border-t border-indigo-800/80 text-center text-indigo-300/70 text-xs font-medium relative z-10">
            &copy; 2024 AmikomEventHub. All rights reserved.
        </div>
    </footer>

</body>
</html>