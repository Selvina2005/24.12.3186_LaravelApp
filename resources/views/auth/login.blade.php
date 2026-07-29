<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>

</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white relative overflow-x-hidden">

<!-- EFEK BACKGROUND GLOW DUA WARNA -->
<div class="fixed -top-24 -left-20 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="fixed -bottom-24 -right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

<div class="min-h-screen flex items-center justify-center p-4 sm:p-6">

    <!-- MAIN LOGIN CARD -->
    <div class="glass-card bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100/80 w-full max-w-md p-6 sm:p-10 relative z-10 transition-all duration-300">

        <!-- LOGO CONTAINER -->
        <div class="flex justify-center mb-6">
            <div class="relative">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-600 to-indigo-500 flex items-center justify-center text-white text-2xl font-extrabold shadow-lg shadow-indigo-500/30">
                    A
                </div>
                <!-- Mini Glow Accent -->
                <span class="absolute -top-1 -right-1 flex h-3.5 w-3.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-indigo-500"></span>
                </span>
            </div>
        </div>

        <!-- HEADER TITLE -->
        <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-slate-900 tracking-tight">
            Admin Login
        </h1>

        <p class="text-center text-slate-500 text-sm mt-2 mb-8 font-normal leading-relaxed">
            Silakan login untuk mengakses Dashboard Admin.
        </p>

        <!-- ERROR NOTIFICATION -->
        @error('email')
        <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl px-4 py-3 mb-6 text-sm flex items-start gap-3 shadow-sm">
            <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ $message }}</span>
        </div>
        @enderror

        <!-- FORM -->
        <form action="{{ route('admin.login.post') }}" method="POST">

            @csrf

            <!-- EMAIL INPUT -->
            <div class="mb-5">

                <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-600">
                    Email
                </label>

                <div class="relative">
                    <input
                        type="email"
                        name="email"
                        class="w-full bg-slate-50/80 rounded-xl border border-slate-200 px-4 py-3.5 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition duration-150"
                        placeholder="Masukkan email"
                        required>
                </div>

            </div>

            <!-- PASSWORD INPUT -->
            <div class="mb-6">

                <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-600">
                    Password
                </label>

                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        class="w-full bg-slate-50/80 rounded-xl border border-slate-200 px-4 py-3.5 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition duration-150"
                        placeholder="Masukkan password"
                        required>
                </div>

            </div>

            <!-- SUBMIT BUTTON -->
            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white py-3.5 rounded-xl font-semibold text-sm shadow-md shadow-indigo-200 hover:shadow-lg hover:shadow-indigo-300 transition duration-200">

                Login

            </button>

        </form>

        <!-- FOOTER COPYRIGHT -->
        <div class="mt-8 text-center text-xs font-medium text-slate-400">

            © {{ date('Y') }} AmikomEventHub

        </div>

    </div>

</div>

</body>
</html>