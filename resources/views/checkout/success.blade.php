@extends('layouts.app')

@section('title', 'Pembayaran Berhasil')

@section('content')

<main class="min-h-[85vh] flex items-center justify-center px-4 sm:px-6 py-12 sm:py-20 text-center relative overflow-hidden bg-slate-50/50">

    <!-- Subtle Background Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <!-- MAIN CARD -->
    <div class="bg-white/90 backdrop-blur-md rounded-3xl border border-slate-200/80 p-8 sm:p-12 shadow-xl shadow-slate-200/50 w-full max-w-md relative z-10 transition-all duration-300">

        <!-- SUCCESS ICON WITH GLOW -->
        <div class="relative w-24 h-24 mx-auto mb-6">
            <div class="absolute inset-0 bg-emerald-500/20 rounded-full blur-xl animate-pulse"></div>
            <div class="relative w-24 h-24 bg-gradient-to-tr from-emerald-600 to-emerald-500 text-white rounded-full flex items-center justify-center shadow-lg shadow-emerald-500/30">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="3"
                        d="M5 13l4 4L19 7">
                    </path>
                </svg>
            </div>
        </div>

        <!-- HEADER TITLE -->
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-4">
            Terima Kasih!
        </h2>

        <!-- DESCRIPTION TEXT -->
        <p class="text-slate-500 text-sm sm:text-base mb-8 leading-relaxed">
            Pembayaran untuk pesanan <strong class="text-slate-800 font-semibold">{{ $transaction->order_id }}</strong> sedang diproses atau telah berhasil.
            E-Ticket akan dikirim ke email Anda (<strong class="text-slate-800 font-semibold">{{ $transaction->customer_email }}</strong>) setelah pembayaran
            terkonfirmasi lunas.
        </p>

        <!-- BACK TO HOME BUTTON -->
        <a
            href="{{ route('home') }}"
            class="inline-flex items-center justify-center w-full px-8 py-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white rounded-2xl font-bold text-base shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/35 transition duration-200 gap-2">
            <span>Kembali ke Beranda</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>

    </div>
</main>

@endsection