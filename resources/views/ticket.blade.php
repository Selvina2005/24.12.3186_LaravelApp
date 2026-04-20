@extends('layouts.app')

@section('content')

<div class="bg-indigo-600 text-white min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">

        <!-- Success Banner -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-black">Pembayaran Berhasil!</h1>
            <p class="text-indigo-100 mt-2">Tiket Anda telah terbit dan siap digunakan.</p>
        </div>

        <!-- Ticket Card -->
        <div class="bg-white text-slate-900 rounded-[2.5rem] overflow-hidden shadow-2xl">

            <!-- Header -->
            <div class="p-8 bg-indigo-50 border-b-4 border-dashed border-indigo-100 text-center relative">
                <p class="text-indigo-600 text-xs font-bold uppercase mb-2">E-Ticket Resmi</p>
                <h2 class="text-2xl font-black">Jazz Night 2024</h2>
            </div>

            <!-- Body -->
            <div class="p-8 space-y-6">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-slate-400 font-bold">Nama</p>
                        <p class="font-bold">Donni Prabowo</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-bold">Tanggal</p>
                        <p class="font-bold">16 Nov, 19:30</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-bold">Order ID</p>
                        <p class="font-bold">TRX-99210</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-bold">Lokasi</p>
                        <p class="font-bold">Blue Note Lounge</p>
                    </div>
                </div>

                <!-- QR -->
                <div class="bg-slate-100 p-6 rounded-2xl text-center">
                    <p class="text-xs text-slate-400 font-bold mb-4">Scan QR</p>

                    <div class="w-40 h-40 mx-auto bg-white border flex flex-wrap p-1">
                        <div class="w-1/4 h-1/4 bg-black"></div>
                        <div class="w-1/4 h-1/4"></div>
                        <div class="w-1/4 h-1/4 bg-black"></div>
                        <div class="w-1/4 h-1/4"></div>
                        <div class="w-1/4 h-1/4"></div>
                        <div class="w-1/4 h-1/4 bg-black"></div>
                        <div class="w-1/4 h-1/4"></div>
                        <div class="w-1/4 h-1/4 bg-black"></div>
                    </div>

                    <p class="mt-4 font-mono font-bold">TKT-001293848</p>
                </div>

            </div>

            <!-- Footer -->
            <div class="p-6">
                <button onclick="window.print()"
                    class="w-full py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700">
                    Cetak / Simpan PDF
                </button>

                <a href="/"
                    class="block text-center mt-4 text-slate-500 font-bold hover:text-indigo-600">
                    Kembali ke Beranda
                </a>
            </div>

        </div>

    </div>

</div>

@endsection