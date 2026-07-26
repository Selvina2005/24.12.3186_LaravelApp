@extends('layouts.app')

@section('content')

<div class="bg-indigo-600 min-h-screen p-6">

    <div class="max-w-4xl mx-auto">

        <div class="text-center text-white mb-8">

            <h1 class="text-3xl font-black">
                Tiket Saya
            </h1>

            <p class="text-indigo-100">
                Daftar tiket yang sudah berhasil dibeli
            </p>

        </div>

        @forelse($transactions as $transaction)

        <div class="bg-white rounded-3xl shadow-xl p-6 mb-6">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        {{ $transaction->event->title }}
                    </h2>

                    <p class="text-slate-500 mt-3">
                        📅 {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y, H:i') }}
                    </p>

                    <p class="text-slate-500">
                        📍 {{ $transaction->event->location }}
                    </p>

                    <p class="text-xs text-slate-400 mt-2">
                        Order ID: {{ $transaction->order_id }}
                    </p>

                </div>

            </div>

            <div class="mt-6 flex gap-3 flex-wrap">

                <a href="{{ route('ticket.show', $transaction->id) }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl font-bold transition">
                    🎫 Detail Tiket
                </a>

                @if(now()->greaterThan(
                    \Carbon\Carbon::parse($transaction->event->date)->addDay()))

                    @if($transaction->event->reviews
                        ->where('user_id', auth()->id())
                        ->count() == 0)

                        <a href="{{ route('review.create', $transaction->event->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-xl font-bold transition">
                            ⭐ Beri Review
                        </a>

                    @else

                        <span class="bg-green-100 text-green-700 px-5 py-3 rounded-xl font-bold">
                            ✅ Review Terkirim
                        </span>

                    @endif

                @endif

            </div>

        </div>

        @empty

        <div class="bg-white rounded-3xl p-8 text-center">

            <p class="font-bold text-slate-500">
                Belum ada tiket yang dibeli.
            </p>

        </div>

        @endforelse

    </div>

</div>

@endsection