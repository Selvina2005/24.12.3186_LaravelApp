@extends('layouts.app')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-slate-50/50 text-slate-900 antialiased">

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
        <!-- Left: Poster -->
        <div class="lg:col-span-1">
            <div class="sticky top-8">
                <div class="relative group rounded-3xl overflow-hidden bg-white shadow-xl shadow-slate-200/50 border border-slate-200/80 transition duration-300">
                    <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                        ? asset('storage/' . $event->poster_path)
                        : 'https://placehold.co/200x600' }}"
                        alt="{{ $event->title }}"
                        class="w-full object-cover aspect-[3/4] rounded-3xl transform group-hover:scale-105 transition duration-500 ease-out">
                </div>
            </div>
        </div>

        <!-- Right: Main Unified Content Card & Others -->
        <div class="lg:col-span-2 space-y-8 sm:space-y-10">
            
            <!-- Unified Card: Header + Organizer + Description -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden relative">
                <!-- Top Accent Line -->
                <div class="h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600"></div>

                <div class="p-6 sm:p-8 space-y-8">
                    <!-- Event Title & Category -->
                    <div class="space-y-4">
                        <div>
                            <span class="inline-flex items-center px-3.5 py-1.5 bg-indigo-50 border border-indigo-100 text-indigo-700 rounded-full text-xs font-extrabold uppercase tracking-wider">
                                {{ $event->category->name ?? 'Kategori Event' }}
                            </span>
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                            {{ $event->title }}
                        </h1>

                        <!-- Date & Location Badges -->
                        <div class="flex flex-wrap gap-4 sm:gap-6 text-slate-600 font-semibold text-sm sm:text-base pt-1">
                            <div class="flex items-center gap-2.5 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                                <svg class="w-5 h-5 text-indigo-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y H:i') }}</span>
                            </div>

                            <div class="flex items-center gap-2.5 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                                <svg class="w-5 h-5 text-indigo-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $event->location }}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Penyelenggara Section -->
                    <div class="bg-slate-50/80 p-5 rounded-2xl border border-slate-100">
                        <h4 class="font-extrabold text-xs text-slate-400 uppercase tracking-wider mb-3">
                            Penyelenggara
                        </h4>

                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-2xl bg-indigo-100/80 border border-indigo-200/60 flex items-center justify-center font-bold text-indigo-600 text-lg shadow-sm shrink-0">
                                {{ strtoupper(substr($event->partner->name ?? 'P', 0, 2)) }}
                            </div>

                            <div>
                                <p class="font-bold text-slate-900 text-base leading-snug">
                                    {{ $event->partner->name ?? 'Penyelenggara' }}
                                </p>

                                <p class="text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200/60 px-2 py-0.5 rounded-md inline-block mt-1">
                                    Verified Organizer
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi Section -->
                    <div class="space-y-3 pt-2">
                        <h4 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                            Deskripsi Event
                        </h4>

                        <p class="text-slate-600 text-base sm:text-lg leading-relaxed whitespace-pre-line">
                            {{ $event->description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card Beli Tiket / CTA -->
            <div class="bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 rounded-3xl p-6 sm:p-10 text-white shadow-xl shadow-indigo-600/20 relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="space-y-2">
                        <p class="text-indigo-200 font-extrabold uppercase tracking-widest text-xs">Harga Tiket</p>
                        <h2 class="text-4xl sm:text-5xl font-black tracking-tight flex items-baseline gap-2">
                            Rp {{ number_format($event->price,0,',','.') }}
                            <span class="text-base font-medium text-indigo-200/80">
                                / orang
                            </span>
                        </h2>
                        <p class="pt-2 text-indigo-100 text-sm sm:text-base flex items-center gap-2 font-medium">
                            <svg class="w-5 h-5 text-indigo-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Sisa stok: <span class="font-bold underline text-white">{{ $event->stock }} Tiket lagi!</span>
                        </p>
                    </div>

                    <div class="w-full md:w-auto">
                        <a href="{{ route('google.login', ['event' => $event->id]) }}"
                            class="block w-full text-center px-8 py-4 sm:px-10 sm:py-5 bg-white text-indigo-700 rounded-2xl font-black text-lg sm:text-xl hover:bg-slate-100 hover:shadow-2xl transition duration-200 shadow-lg active:scale-95">

                            @if($event->price == 0)
                                Klaim Tiket Gratis
                            @else
                                Pesan Sekarang
                            @endif

                        </a>
                    </div>
                </div>

                <!-- Decoration elements -->
                <div class="absolute -right-16 -bottom-16 w-56 h-56 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-indigo-400/20 rounded-full blur-2xl pointer-events-none"></div>
            </div>

            <!-- Kebijakan Tiket -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                <h3 class="text-lg sm:text-xl font-bold text-slate-900 tracking-tight">Kebijakan Tiket</h3>
                <ul class="space-y-3 text-slate-600 text-sm sm:text-base font-medium">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>E-Ticket akan dikirimkan otomatis setelah pembayaran berhasil.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Tiket dapat discan di pintu masuk (Check-in).</span>
                    </li>
                    <li class="flex items-start gap-3 text-rose-600">
                        <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Tiket yang sudah dibeli tidak dapat direfund.</span>
                    </li>
                </ul>
            </div>

        </div>
    </main>

</body>

</html>
@endsection