@extends('layouts.app')

@section('content')

<div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-6">

    <!-- CARD FAQ -->
    <div class="max-w-xl w-full bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">FAQ</h1>

        <div class="space-y-3 text-slate-700">
            <p><span class="font-bold">Q:</span> Apa ini?</p>
            <p><span class="font-bold">A:</span> Ini halaman bantuan sederhana.</p>
        </div>
    </div>

    <!-- NAV BUTTON -->
    <div class="mt-6 space-x-2">
        <a href="/" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Home
        </a>
        <a href="/profil" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
            Profil
        </a>
        <a href="/katalog" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Katalog
        </a>
    </div>

</div>

@endsection