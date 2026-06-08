<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <h1 class="text-2xl font-bold text-center mb-6">
            Login Admin
        </h1>

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="border p-2 rounded-lg w-full"
                    required
                >
            </div>

            <div class="mb-4">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="border p-2 rounded-lg w-full"
                    required
                >
            </div>

            @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ $message }}
                </div>
            @enderror
            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg"
            >
                Login
            </button>
        </form>

    </div>

</div>

</body>
</html>