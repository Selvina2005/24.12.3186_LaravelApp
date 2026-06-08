<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 sticky top-0 h-screen">

        <!-- Logo -->
        <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                AH
            </div>
            <span class="text-xl font-bold text-white">
                AmikomEventHub
            </span>
        </div>

        <!-- Menu -->
        <nav class="flex-1 space-y-2">

            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">
                Main Menu
            </p>

            <!-- Dashboard -->
            <a href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl transition">

                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>

                Dashboard
            </a>

            <!-- Event -->
            <a href="{{ url('/admin/events') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl transition">

                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>

                Kelola Event
            </a>

            <!-- Partner -->
            <a href="{{ url('/admin/partners') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl transition">

                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 21h18M5 21V7a2 2 0 012-2h10a2 2 0 012 2v14M9 9h1m-1 4h1m4-4h1m-1 4h1">
                    </path>
                </svg>

                Partners
            </a>

            <!-- Transaksi -->
            <a href="{{ url('/admin/transactions') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl transition">

                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>

                Laporan Transaksi
            </a>

            <!-- Kategori -->
            <a href="{{ url('/admin/categories') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl transition">

                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>

                Kategori
            </a>

        </nav>

        <!-- Logout -->
        <div class="pt-6 border-t border-indigo-800">

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white transition w-full">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>

                    Keluar
                </button>

            </form>

        </div>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>