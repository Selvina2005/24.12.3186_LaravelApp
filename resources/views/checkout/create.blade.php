@extends('layouts.app')

@section('title', 'Checkout - ' . $event->title)

@section('content')

<main class="max-w-3xl mx-auto px-4 sm:px-6 py-12 sm:py-16">

    <!-- HEADER & BACK BUTTON -->
    <div class="mb-8">
        <a href="{{ route('events.show', $event->id) }}"
            class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 font-bold text-sm bg-indigo-50/80 hover:bg-indigo-100/80 px-4 py-2.5 rounded-xl transition duration-200 mb-6 group">

            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2.5"
                    d="M15 19l-7-7 7-7">
                </path>
            </svg>

            Kembali ke Event
        </a>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            Checkout
        </h1>

        <p class="text-slate-500 mt-1.5 text-sm sm:text-base">
            Lengkapi data Anda untuk mendapatkan tiket.
        </p>
    </div>

    <!-- ERROR NOTIFICATION -->
    @if(session('error'))
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl font-semibold text-sm flex items-start gap-3 shadow-sm">
            <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-8">

        <!-- Summary Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-sm relative overflow-hidden">
            <!-- Decorative Subtle Accent Line -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600"></div>

            <h3 class="text-lg font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4 flex items-center justify-between">
                <span>Pesanan Anda</span>
                <span class="text-xs font-semibold px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full">Ringkasan</span>
            </h3>

            <div class="flex flex-col sm:flex-row gap-5 items-start">

                <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                    ? asset('storage/' . $event->poster_path)
                    : 'https://placehold.co/200x200' }}"
                    alt="Event"
                    class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover border border-slate-100 shadow-sm shrink-0">

                <div class="flex-1">
                    <h4 class="font-extrabold text-slate-900 text-lg sm:text-xl leading-snug">
                        {{ $event->title }}
                    </h4>

                    <p class="text-slate-500 text-sm mt-1.5 flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $event->date->format('d M Y') }} • {{ $event->location }}</span>
                    </p>

                    <p class="text-indigo-600 font-extrabold text-base mt-3 inline-block bg-indigo-50/80 px-3 py-1 rounded-lg">
                        @if($event->price == 0)
                            GRATIS
                        @else
                            1 x Rp {{ number_format($event->price, 0, ',', '.') }}
                        @endif
                    </p>
                </div>

            </div>

            @php
                $serviceFee = $event->price == 0 ? 0 : 5000;
                $totalPrice = $event->price + $serviceFee;
            @endphp
            <div class="mt-8 pt-6 border-t border-slate-100 space-y-3">

                <div class="flex justify-between text-slate-600 text-sm font-medium">
                    <span>Harga Tiket</span>
                    <span class="text-slate-900 font-semibold">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                </div>

                <div class="flex justify-between text-slate-600 text-sm font-medium">
                    <span>Biaya Layanan</span>
                    <span class="text-slate-900 font-semibold">Rp {{ number_format($serviceFee,0,',','.') }}</span>
                </div>

                <div class="flex justify-between items-center text-xl sm:text-2xl font-black mt-4 pt-4 border-t border-slate-100">
                    <span class="text-slate-900">Total Bayar</span>
                    <span class="text-indigo-600">
                        Rp {{ number_format($totalPrice, 0, ',', '.') }}
                    </span>
                </div>

            </div>

        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-sm">

            <h3 class="text-lg font-bold text-indigo-600 mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                <span> Data Pemesan</span>
            </h3>

            <!-- Informasi Login Google -->
            <div class="bg-emerald-50/80 border border-emerald-200/80 rounded-2xl p-4 mb-6 flex items-start gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-emerald-800 font-medium text-xs sm:text-sm leading-relaxed">
                    Anda telah login menggunakan akun Google.
                    Nama dan email telah diisi otomatis.
                    Silakan lengkapi nomor WhatsApp untuk melanjutkan pembayaran.
                </p>
            </div>

            <form action="{{ route('checkout.store', $event->id) }}"
                method="POST"
                class="space-y-6">

                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                        Nama Lengkap
                    </label>

                    <div class="relative">
                        <input
                            type="text"
                            name="customer_name"
                            value="{{ auth()->user()->name }}"
                            class="w-full px-4 py-3.5 bg-slate-100/80 text-slate-600 border border-slate-200 rounded-xl font-medium text-sm focus:outline-none cursor-not-allowed"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                            Email Aktif
                        </label>

                        <input
                            type="email"
                            name="customer_email"
                            value="{{ auth()->user()->email }}"
                            class="w-full px-4 py-3.5 bg-slate-100/80 text-slate-600 border border-slate-200 rounded-xl font-medium text-sm focus:outline-none cursor-not-allowed"
                            readonly>

                        <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-wider flex items-center gap-1">
                            <span>*E-Ticket akan dikirim ke email ini</span>
                        </p>

                    </div>

                    <div>

                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                            No. WhatsApp
                        </label>

                        <input
                            type="tel"
                            name="customer_phone"
                            placeholder="08xxxxxxx"
                            class="w-full px-4 py-3.5 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-800 font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition duration-150"
                            required
                            value="{{ old('customer_phone') }}">

                    </div>

                </div>

                <div class="pt-2">
                    @if($event->price == 0)
                    <button
                        type="submit"
                        class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white rounded-2xl font-bold text-lg shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 transition duration-200 flex items-center justify-center gap-2">
                        <span> Dapatkan Tiket Gratis</span>
                    </button>
                    @else
                    <button
                        type="submit"
                        class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white rounded-2xl font-bold text-lg shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 transition duration-200 flex items-center justify-center gap-2">
                        <span>Lanjut Pembayaran</span>
                    </button>
                    @endif
                </div>

                <p class="text-center text-xs text-slate-400 font-medium">
                    Dengan menekan tombol di atas, Anda menyetujui Syarat & Ketentuan kami.
                </p>

            </form>

        </div>

    </div>

</main>
@endsection