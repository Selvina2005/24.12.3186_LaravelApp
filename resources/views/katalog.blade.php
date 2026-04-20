@extends('layouts.app')

@section('content')

<div class="bg-slate-100 min-h-screen">

    <!-- CONTENT -->
    <div class="max-w-6xl mx-auto p-6">

        <h2 class="text-2xl font-bold mb-6 text-slate-700">Daftar Event</h2>

        <!-- GRID EVENT -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- EVENT 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('assets/concert.png') }}"
                     class="w-full h-40 object-cover">

                <div class="p-4">
                    <h2 class="font-bold text-slate-800">Seminar Teknologi</h2>
                    <p class="text-sm text-slate-500 mt-1">Belajar perkembangan teknologi terbaru.</p>
                    <p class="text-indigo-600 font-semibold mt-2">📅 20 Mei 2026</p>

                    <a href="#" class="block mt-3 text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Daftar
                    </a>
                </div>
            </div>

            <!-- EVENT 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('assets/workshop.png') }}"
                     class="w-full h-40 object-cover">

                <div class="p-4">
                    <h2 class="font-bold text-slate-800">Workshop UI/UX</h2>
                    <p class="text-sm text-slate-500 mt-1">Belajar desain aplikasi modern.</p>
                    <p class="text-indigo-600 font-semibold mt-2">📅 25 Mei 2026</p>

                    <a href="#" class="block mt-3 text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Daftar
                    </a>
                </div>
            </div>

            <!-- EVENT 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('assets/hackathon.png') }}"
                     class="w-full h-40 object-cover">

                <div class="p-4">
                    <h2 class="font-bold text-slate-800">Hackathon Coding</h2>
                    <p class="text-sm text-slate-500 mt-1">Kompetisi coding untuk mahasiswa.</p>
                    <p class="text-indigo-600 font-semibold mt-2">📅 30 Mei 2026</p>

                    <a href="#" class="block mt-3 text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Daftar
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection