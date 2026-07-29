@extends('layouts.admin')

@section('title', 'Laporan Transaksi - Admin')
@section('page_title', 'Laporan Transaksi')
@section('page_subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')

<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-7xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- HEADER SECTION -->
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
            Laporan Transaksi
        </h1>
        <p class="text-sm text-slate-500 mt-1">
            Pantau ringkasan arus kas, detail pembeli, dan status pembayaran tiket secara berkala.
        </p>
    </div>

    <!-- TABLE CONTAINER -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-6">Order ID</th>
                        <th class="py-4 px-6">Detail Pembeli</th>
                        <th class="py-4 px-6">Event</th>
                        <th class="py-4 px-6">Tgl Transaksi</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Total Tagihan</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($transactions as $trx)
                        <tr class="hover:bg-slate-50/60 transition duration-150 {{ $trx->status == 'pending' ? 'text-slate-400' : '' }}">

                            <!-- ORDER ID -->
                            <td class="py-4 px-6 font-medium whitespace-nowrap">
                                <span class="font-mono font-bold px-3 py-1.5 rounded-lg text-xs {{ $trx->status == 'pending' ? 'bg-slate-100 text-slate-500' : 'text-indigo-600 bg-indigo-50 border border-indigo-100/50' }}">
                                    {{ $trx->order_id }}
                                </span>
                            </td>

                            <!-- DETAIL PEMBELI -->
                            <td class="py-4 px-6">
                                <p class="font-bold text-slate-900 text-sm mb-0.5">
                                    {{ $trx->customer_name }}
                                </p>
                                <p class="text-xs text-slate-500 leading-relaxed">
                                    {{ $trx->customer_email }}<br>
                                    <span class="text-slate-400">{{ $trx->customer_phone }}</span>
                                </p>
                            </td>

                            <!-- EVENT -->
                            <td class="py-4 px-6">
                                <p class="font-semibold text-slate-800 max-w-xs truncate">
                                    {{ $trx->event->title ?? '-' }}
                                </p>
                            </td>

                            <!-- TANGGAL TRANSAKSI -->
                            <td class="py-4 px-6 text-slate-500 whitespace-nowrap">
                                {{ $trx->created_at->format('d M Y, H:i') }}
                            </td>

                            <!-- STATUS -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if($trx->status === 'settlement' || $trx->status === 'success')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200/60 rounded-lg text-[11px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Success
                                    </span>
                                @elseif($trx->status === 'pending')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 border border-amber-200/60 rounded-lg text-[11px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Pending
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-rose-50 text-rose-700 border border-rose-200/60 rounded-lg text-[11px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        {{ $trx->status }}
                                    </span>
                                @endif
                            </td>

                            <!-- TOTAL TAGIHAN -->
                            <td class="py-4 px-6 text-right font-bold text-sm whitespace-nowrap {{ $trx->status == 'pending' ? 'text-slate-400' : 'text-slate-900' }}">
                                Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="font-medium text-sm text-slate-500">Belum ada transaksi</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION CONTAINER -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100">
            {{ $transactions->links() }}
        </div>
    </div>

</div>

@endsection