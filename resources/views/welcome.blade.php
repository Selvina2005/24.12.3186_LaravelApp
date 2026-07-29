@extends('layouts.app')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 space-y-8">
            <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
                #1 Event Platform
            </span>

            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
            </h1>

            <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu. Pesan aman & cepat dengan Midtrans.
            </p>

            <div class="flex gap-4">
                <a href="#events"
                    class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 transition-transform">
                    Mulai Jelajah
                </a>

                <a href="#"
                    class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition">
                    Cara Pesan
                </a>
            </div>
        </div>

        <div class="flex-1 relative">
            <div class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

            <img src="assets/concert.png" alt="Concert"
                class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center">

            <div class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-bold uppercase">Terverifikasi</p>
                        <p class="font-bold">Pembayaran Aman via Midtrans</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PARTNER SECTION (LOGO CENDERUNG ORIGINAL & TERANG) -->
    <section class="py-14 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Partner Kami</h2>
                <p class="text-slate-500 text-sm mt-1">Platform AmikomEventHub didukung oleh berbagai partner terpercaya.</p>
            </div>

            <!-- Grid Partner -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                @forelse($partners as $partner)
                    <div class="bg-slate-50/80 rounded-2xl p-4 flex flex-col items-center justify-center gap-3 border border-slate-100 hover:border-indigo-200 transition duration-200 group">
                        <div class="w-20 h-20 flex items-center justify-center">
                            <img src="{{ asset('storage/'.$partner->logo_url) }}"
                                 alt="{{ $partner->name }}"
                                 class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <span class="text-xs font-semibold text-slate-700 text-center line-clamp-1">
                            {{ $partner->name }}
                        </span>
                    </div>
                @empty
                    <div class="col-span-full text-center py-6 text-slate-400 text-sm">
                        Belum ada partner tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- EVENTS GRID (TANPA PENGGESER / SCROLLBAR) -->
    <section id="events" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div>
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Event Terdekat</h2>
                <p class="text-slate-500 text-sm mt-1">Jangan sampai ketinggalan acara seru minggu ini!</p>
            </div>
        <!-- Header Event Terdekat & Filter Kategori -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 pb-4 border-b border-slate-200">
            

            <!-- Navigasi Kategori (Flexible Wrap - Tanpa Penggeser/Scroll) -->
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                {{-- Semua Kategori --}}
                <a href="{{ url('/') }}#events" 
                   class="py-2 text-sm font-medium transition duration-150 {{ !request('category') ? 'text-indigo-600 font-bold border-b-2 border-indigo-600' : 'text-slate-500 hover:text-slate-900' }}">
                    Semua Kategori
                </a>

                {{-- List Kategori --}}
                @foreach ($categories as $cat)
                    <a href="{{ url('/?category=' . $cat->slug) }}#events" 
                       class="py-2 text-sm font-medium transition duration-150 {{ request('category') == $cat->slug ? 'text-indigo-600 font-bold border-b-2 border-indigo-600' : 'text-slate-500 hover:text-slate-900' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Grid Event Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col justify-between">
                    <div>
                        <!-- Poster Event -->
                        <div class="relative overflow-hidden aspect-[3/4] bg-slate-100">
                            <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                                ? asset('storage/' . $event->poster_path)
                                : 'https://placehold.co/600x400' }}"
                                alt="{{ $event->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <!-- Badge Category -->
                            <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600 shadow-xs">
                                {{ $event->category->name ?? 'Uncategorized' }}
                            </div>
                        </div>

                        <!-- Content Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-slate-800 group-hover:text-indigo-600 transition">
                                {{ $event->title }}
                            </h3>

                            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Card (Harga & Detail Button) -->
                    <div class="px-6 pb-6 pt-4 border-t border-slate-100 flex justify-between items-center">
                        @if($event->price == 0)
                            <span class="text-2xl font-black text-emerald-600">GRATIS</span>
                        @else
                            <span class="text-2xl font-black text-indigo-600">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </span>
                        @endif

                        <a href="{{ route('events.show', $event->id) }}"
                            class="px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition duration-200">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- REVIEW PENGUNJUNG SECTION -->
    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-black text-slate-800">Apa Kata Peserta?</h2>
            <p class="text-slate-500 mt-2">
                Pengalaman nyata dari peserta yang telah mengikuti berbagai event di AmikomEventHub.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($reviews as $eventId => $eventReviews)
                @php
                    $event = $eventReviews->first()->event;
                    $average = $eventReviews->avg('rating');
                    $total = $eventReviews->count();
                @endphp

                <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6 hover:shadow-xl transition">
                    {{-- Header --}}
                    <div class="mb-4">
                        <h3 class="font-bold text-xl text-slate-800">
                            {{ $event->title }}
                        </h3>
                        <p class="text-sm text-indigo-600 font-semibold">
                            {{ $event->organization->name ?? 'Penyelenggara' }}
                        </p>
                        <p class="text-sm text-slate-500 mt-1">
                            Kerja sama dengan: {{ $event->partner->name ?? '-' }}
                        </p>
                    </div>

                    {{-- Rating --}}
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-yellow-500 font-bold text-lg">
                            ⭐ {{ number_format($average,1) }}
                        </span>
                        <span class="text-sm text-slate-500">
                            ({{ $total }} Review)
                        </span>
                    </div>

                    {{-- Tanggal --}}
                    <div class="flex items-center gap-2 text-slate-500 text-sm mb-6">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y H:i') }}
                        </span>
                    </div>

                    {{-- Tombol --}}
                    <a href="{{ route('review.index', $event->id) }}"
                       class="block text-center bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                        Detail Review
                    </a>
                </div>
            @empty
                <div class="col-span-3 text-center py-20">
                    <div class="text-6xl mb-4">⭐</div>
                    <h3 class="text-xl font-bold text-slate-700">Belum Ada Review</h3>
                    <p class="text-slate-500 mt-2">Jadilah peserta pertama yang membagikan pengalamanmu.</p>
                </div>
            @endforelse
        </div>
    </section>

@endsection