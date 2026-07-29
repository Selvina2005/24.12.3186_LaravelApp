@extends('layouts.app')

@section('title', 'Pembayaran - ' . $transaction->event->title)

@section('content')

<main class="min-h-[85vh] flex items-center justify-center px-4 sm:px-6 py-12 sm:py-20 text-center relative overflow-hidden bg-slate-50/50">

    <!-- Subtle Background Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <!-- MAIN CARD -->
    <div class="bg-white/90 backdrop-blur-md rounded-3xl border border-slate-200/80 p-8 sm:p-12 shadow-xl shadow-slate-200/50 w-full max-w-md relative z-10 transition-all duration-300">

        <!-- ICON CONTAINER WITH GLOW -->
        <div class="relative w-20 h-20 mx-auto mb-6">
            <div class="absolute inset-0 bg-indigo-500/20 rounded-2xl blur-lg animate-pulse"></div>
            <div class="relative w-20 h-20 bg-gradient-to-tr from-indigo-600 to-indigo-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
        </div>

        <!-- HEADER TITLE & SUBTITLE -->
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mb-2">
            Selesaikan Pembayaran
        </h2>

        <p class="text-slate-500 text-sm sm:text-base leading-relaxed mb-8">
            Mohon selesaikan pembayaran tiket Anda untuk event
            <strong class="text-slate-800 font-semibold">{{ $transaction->event->title }}</strong>.
        </p>

        <!-- TOTAL BILL CARD -->
        <div class="p-6 bg-slate-50/80 rounded-2xl border border-slate-200/60 mb-8 relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-1 h-full bg-indigo-600"></div>

            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">
                Total Tagihan
            </p>

            <h3 class="text-3xl sm:text-4xl font-black text-indigo-600 tracking-tight">
                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
            </h3>

            <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-200/60 text-slate-600 text-xs font-mono font-medium">
                <span>Order ID: {{ $transaction->order_id }}</span>
            </div>
        </div>

        <!-- ACTION BUTTON -->
        <button
            id="pay-button"
            class="w-full py-4 sm:py-4.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white rounded-2xl font-bold text-lg shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/35 transition-all duration-200 animate-bounce-in flex items-center justify-center gap-2">
            <span>Bayar Sekarang</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </button>

    </div>
</main>

<script
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script type="text/javascript">
document.getElementById('pay-button').onclick = function () {

    // SnapToken acquired from previous step
    snap.pay('{{ $transaction->snap_token }}', {

        // Optional
        onSuccess: function(result){
            window.location.href = "{{ route('checkout.success', $transaction->order_id) }}";
        },

        // Optional
        onPending: function(result){
            window.location.href = "{{ route('checkout.success', $transaction->order_id) }}";
        },

        // Optional
        onError: function(result){
            alert("Pembayaran Gagal!");
        }

    });
};

// Auto trigger
window.onload = function() {
    document.getElementById('pay-button').click();
}
</script>

<style>
@keyframes bounce-in {
    0% {
        transform: scale(0.92);
        opacity: 0;
    }

    70% {
        transform: scale(1.03);
        opacity: 1;
    }

    100% {
        transform: scale(1);
    }
}

.animate-bounce-in {
    animation: bounce-in 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>

@endsection