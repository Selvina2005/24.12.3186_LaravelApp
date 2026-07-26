@extends('layouts.app')

@section('content')

<div class="bg-indigo-600 min-h-screen p-6">

<div class="max-w-md mx-auto">

<div class="text-center text-white mb-8">
    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white">
        ✓
    </div>

    <h1 class="text-3xl font-black">
        Detail Tiket
    </h1>

    <p class="text-indigo-100">
        Tunjukkan tiket ini saat check-in event
    </p>
</div>


<div class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl mb-8">

<div class="p-8 bg-indigo-50 border-b-4 border-dashed border-indigo-100 text-center">

<p class="text-indigo-600 text-xs font-bold uppercase">
E-Ticket Resmi
</p>

<h2 class="text-2xl font-black">
{{ $transaction->event->title }}
</h2>

</div>


<div class="p-8 space-y-6">

<div class="grid grid-cols-2 gap-4">

<div>
<p class="text-xs text-slate-400 font-bold">
Nama
</p>

<p class="font-bold">
{{ $transaction->customer_name }}
</p>
</div>


<div>
<p class="text-xs text-slate-400 font-bold">
Tanggal
</p>

<p class="font-bold">
{{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y, H:i') }}
</p>
</div>


<div>
<p class="text-xs text-slate-400 font-bold">
Order ID
</p>

<p class="font-bold">
{{ $transaction->order_id }}
</p>
</div>


<div>
<p class="text-xs text-slate-400 font-bold">
Lokasi
</p>

<p class="font-bold">
{{ $transaction->event->location }}
</p>
</div>

</div>


<div class="bg-slate-100 p-6 rounded-2xl text-center">

<p class="text-xs text-slate-400 font-bold mb-4">
Scan QR
</p>

<img
src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($transaction->order_id) }}"
class="mx-auto"
>

<p class="mt-4 font-mono font-bold">
{{ $transaction->order_id }}
</p>

</div>

</div>

</div>

</div>

</div>

@endsection