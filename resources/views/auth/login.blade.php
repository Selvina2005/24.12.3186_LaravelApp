<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Plus Jakarta Sans',sans-serif;
        }
    </style>

</head>
<body class="bg-slate-100">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 w-full max-w-md p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-6">

            <div class="w-16 h-16 rounded-full bg-indigo-600 flex items-center justify-center text-white text-2xl font-bold shadow">
                A
            </div>

        </div>

        <h1 class="text-3xl font-bold text-center text-slate-800">
            Admin Login
        </h1>

        <p class="text-center text-slate-500 mt-2 mb-8">
            Silakan login untuk mengakses Dashboard Admin.
        </p>

        @error('email')
        <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg px-4 py-3 mb-5 text-sm">
            {{ $message }}
        </div>
        @enderror

        <form action="{{ route('admin.login.post') }}" method="POST">

            @csrf

            <div class="mb-5">

                <label class="block mb-2 text-sm font-semibold text-slate-700">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Masukkan email"
                    required>

            </div>

            <div class="mb-6">

                <label class="block mb-2 text-sm font-semibold text-slate-700">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Masukkan password"
                    required>

            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-semibold transition duration-300">

                Login

            </button>

        </form>

        <div class="mt-8 text-center text-sm text-slate-500">

            © {{ date('Y') }} AmikomEventHub

        </div>

    </div>

</div>

</body>
</html>