@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>

<div class="bg-slate-50/70 min-h-screen py-8 sm:py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto space-y-8">

        <!-- Header Section (Tailored Indigo Theme with Live Stats) -->
        <div class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-indigo-800 rounded-3xl p-8 sm:p-10 text-white shadow-xl shadow-indigo-600/15 relative overflow-hidden">
            
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 relative z-10">
                <!-- Text Info -->
                <div class="space-y-2 text-center sm:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 bg-white/10 backdrop-blur-md border border-white/15 text-indigo-100 rounded-full text-xs font-bold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        E-Wallet Tiket
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight">
                        Tiket Saya
                    </h1>

                    <p class="text-indigo-100/90 text-sm sm:text-base font-medium">
                        Daftar tiket yang sudah berhasil dibeli
                    </p>
                </div>

                <!-- Decorative Badge with Count Counter -->
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-md border border-white/20 p-2.5 pl-4 rounded-2xl shrink-0">
                    <div class="text-right">
                        <p class="text-[10px] uppercase tracking-wider text-indigo-200 font-bold">Total Koleksi</p>
                        <p class="text-lg font-black text-white leading-tight">{{ count($transactions) }} Tiket</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-white/15 flex items-center justify-center text-white shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 001.105 1.79l.01.005A2 2 0 015 15.79V19a2 2 0 002 2h10a2 2 0 002-2v-3.21a2 2 0 01.885-1.65l.01-.005A2 2 0 0021 12V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Soft Background Glow Effects -->
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute left-1/3 -top-12 w-32 h-32 bg-purple-400/20 rounded-full blur-2xl pointer-events-none"></div>
        </div>

        <!-- Ticket Cards Loop -->
        <div class="space-y-6">
            @forelse($transactions as $transaction)

            <!-- Main Ticket Card with Ticket Cutout Notch -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md hover:border-indigo-200 transition duration-300 overflow-hidden relative group">
                
                <!-- Ticket Side Cutout Accents (Left & Right Notches) -->
                <div class="hidden sm:block absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-slate-50/70 border-r border-slate-200/80 rounded-full z-20"></div>
                <div class="hidden sm:block absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-slate-50/70 border-l border-slate-200/80 rounded-full z-20"></div>

                <!-- Subtle Top Accent Line -->
                <div class="h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600"></div>

                <div class="p-6 sm:p-8 space-y-6 relative">
                    
                    <!-- Watermark Icon Background -->
                    <svg class="w-32 h-32 absolute -right-6 -bottom-6 text-slate-100/60 pointer-events-none -z-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 001.105 1.79l.01.005A2 2 0 015 15.79V19a2 2 0 002 2h10a2 2 0 002-2v-3.21a2 2 0 01.885-1.65l.01-.005A2 2 0 0021 12V7a2 2 0 00-2-2H5z"></path>
                    </svg>

                    <!-- Content Top Header -->
                    <div class="space-y-4 relative z-10">
                        
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight group-hover:text-indigo-600 transition">
                                {{ $transaction->event->title }}
                            </h2>

                            <!-- Status Badge -->
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-bold rounded-full w-fit">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Tiket Resmi
                            </span>
                        </div>

                        <!-- Date & Location Badges -->
                        <div class="flex flex-wrap gap-3 text-sm font-semibold text-slate-600">
                            <!-- Date Badge -->
                            <div class="flex items-center gap-2.5 bg-slate-50/80 px-4 py-2 rounded-2xl border border-slate-100">
                                <svg class="w-4 h-4 text-indigo-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y, H:i') }}</span>
                            </div>

                            <!-- Location Badge -->
                            <div class="flex items-center gap-2.5 bg-slate-50/80 px-4 py-2 rounded-2xl border border-slate-100">
                                <svg class="w-4 h-4 text-indigo-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $transaction->event->location }}</span>
                            </div>
                        </div>

                        <!-- Order ID -->
                        <div class="flex items-center gap-2 text-xs font-mono text-slate-400">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                            </svg>
                            <span>Order ID: <strong class="text-slate-600 font-semibold">{{ $transaction->order_id }}</strong></span>
                        </div>
                    </div>

                    <!-- Dashed Perforated Line (Tiket Potong) -->
                    <div class="border-t-2 border-dashed border-slate-100 my-2 relative z-10"></div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3 flex-wrap relative z-10">

                        <a href="{{ route('ticket.show', $transaction->id) }}"
                           class="inline-flex items-center gap-2.5 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-2xl font-extrabold text-sm shadow-md shadow-indigo-600/20 transition duration-200 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 001.105 1.79l.01.005A2 2 0 015 15.79V19a2 2 0 002 2h10a2 2 0 002-2v-3.21a2 2 0 01.885-1.65l.01-.005A2 2 0 0021 12V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                            Detail Tiket
                        </a>

                        @if(now()->greaterThan(
                            \Carbon\Carbon::parse($transaction->event->date)->addDay()))

                            @if($transaction->event->reviews
                                ->where('user_id', auth()->id())
                                ->count() == 0)

                                <a href="{{ route('review.create', $transaction->event->id) }}"
                                   class="inline-flex items-center gap-2.5 bg-amber-500 hover:bg-amber-600 text-white px-6 py-3.5 rounded-2xl font-extrabold text-sm shadow-md shadow-amber-500/20 transition duration-200 active:scale-95">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    Beri Review
                                </a>

                            @else

                                <span class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-200/80 text-emerald-700 px-5 py-3.5 rounded-2xl font-extrabold text-sm">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Review Terkirim
                                </span>

                            @endif

                        @endif

                    </div>

                </div>
            </div>

            @empty

            <div class="bg-white rounded-3xl border border-slate-200/80 p-12 text-center shadow-sm space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 001.105 1.79l.01.005A2 2 0 015 15.79V19a2 2 0 002 2h10a2 2 0 002-2v-3.21a2 2 0 01.885-1.65l.01-.005A2 2 0 0021 12V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                </div>
                <p class="font-extrabold text-slate-600 text-lg">
                    Belum ada tiket yang dibeli.
                </p>
            </div>

            @endforelse
        </div>

    </div>

</div>

@endsection