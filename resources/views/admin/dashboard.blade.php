@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Ringkasan')

@section('content')

{{-- 1. ORGANIZER BANNER --}}
@if(auth()->user()->role == 'organizer')
<div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-indigo-700 to-slate-900 text-white p-6 md:p-8 rounded-3xl mb-8 shadow-xl shadow-indigo-100">
    <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-semibold text-indigo-200 uppercase tracking-wider mb-2 border border-white/10">
                Dashboard Organizer
            </span>
            <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                {{ auth()->user()->organization->name ?? '-' }}
            </h2>
        </div>
    </div>
    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
</div>
@endif

{{-- 2. STATS GRID (Ringkasan Utama) --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Total Pendapatan --}}
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-200 group">
        <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Pendapatan</span>
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">
            Rp {{ number_format($totalRevenue, 0, ',', '.') }}
        </h3>
    </div>

    {{-- Tiket Terjual --}}
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-200 group">
        <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Tiket Terjual</span>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
            </div>
        </div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">
            {{ number_format($ticketsSold, 0, ',', '.') }}
        </h3>
    </div>

    {{-- Event Aktif --}}
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-200 group">
        <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Event Aktif</span>
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">
            {{ $activeEvents }} <span class="text-sm font-normal text-slate-400">Event</span>
        </h3>
    </div>

    {{-- Pesanan Pending --}}
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-200 group">
        <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Pesanan Pending</span>
            <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">
            {{ $pendingOrders }} <span class="text-sm font-normal text-slate-400">Pesanan</span>
        </h3>
    </div>
</div>

{{-- 3. AREA GRAFIK & LIST ORGANISASI (Superadmin Only) --}}
@if(auth()->user()->role == 'superadmin')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    {{-- Container Smooth Area Chart (2 Kolom) --}}
    <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 shadow-sm p-6 md:p-8 flex flex-col justify-between">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Performa Event Organisasi</h2>
                <p class="text-xs text-slate-400">Jumlah event yang terdaftar berdasarkan tiap organisasi.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span>
                <span class="text-xs font-semibold text-slate-500">Jumlah Event</span>
            </div>
        </div>

        <div class="relative w-full h-[320px]">
            <canvas id="eventChart"></canvas>
        </div>
    </div>

    {{-- Ringkasan Organisasi (1 Kolom) --}}
    <div class="lg:col-span-1 bg-white rounded-3xl border border-slate-100 shadow-sm p-6 md:p-8 flex flex-col">
        <div class="mb-4">
            <h2 class="text-lg font-bold text-slate-800">Organisasi Terdaftar</h2>
            <p class="text-xs text-slate-400">Daftar mitra dan jumlah event mereka.</p>
        </div>

        <div class="space-y-3 overflow-y-auto max-h-[300px] pr-1">
            @forelse($organizations as $organization)
            <div class="flex items-center justify-between p-3.5 bg-slate-50/70 hover:bg-indigo-50/50 rounded-2xl transition duration-150 border border-slate-100/60">
                <div class="flex items-center gap-3 truncate">
                    <div class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center text-xs shrink-0">
                        {{ strtoupper(substr($organization->name, 0, 2)) }}
                    </div>
                    <span class="font-semibold text-sm text-slate-700 truncate max-w-[140px]">
                        {{ $organization->name }}
                    </span>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-2xs">
                    {{ $organization->events->count() }} Event
                </span>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400 text-sm">
                Belum ada data organisasi.
            </div>
            @endforelse
        </div>
    </div>
</div>
@endif

{{-- 4. TABEL TRANSAKSI TERAKHIR (Full Width) --}}
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden mb-10">
    <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Transaksi Terakhir</h3>
            <p class="text-xs text-slate-400">Aktivitas pembayaran tiket terbaru dalam sistem.</p>
        </div>
        <span class="text-xs font-semibold text-slate-400 bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-100 self-start md:self-auto">
            Menampilkan {{ $recentTransactions->count() }} data terbaru
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50/80 text-slate-400 uppercase text-[10px] font-black tracking-widest border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4">Tanggal & Order ID</th>
                    <th class="px-6 py-4">Pembeli</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-right">Total Tagihan</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($recentTransactions as $trx)
                    <tr class="hover:bg-slate-50/80 transition duration-150">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-slate-700 block">{{ $trx->created_at->format('d M Y, H:i') }}</span>
                            <span class="text-xs text-slate-400 font-mono tracking-tight">{{ $trx->order_id }}</span>
                        </td>

                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-800 tracking-tight">{{ $trx->customer_name }}</p>
                            <p class="text-xs text-slate-400">{{ $trx->customer_email }}</p>
                        </td>

                        <td class="px-6 py-4 font-medium text-slate-600">
                            {{ $trx->event->title ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            @if($trx->status === 'settlement' || $trx->status === 'success')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200/60 rounded-full text-xs font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Success
                                </span>
                            @elseif($trx->status === 'pending')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-600 border border-amber-200/60 rounded-full text-xs font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-rose-50 text-rose-600 border border-rose-200/60 rounded-full text-xs font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> {{ $trx->status }}
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 font-black text-indigo-600 text-right whitespace-nowrap">
                            Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-12 h-12 bg-slate-50 text-slate-300 rounded-2xl flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-slate-500">Belum ada riwayat transaksi.</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- SCRIPT CHART.JS (SMOOTH AREA CHART) --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@if(auth()->user()->role == 'superadmin')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('eventChart').getContext('2d');

    // Gradasi Warna Vertikal Transparan
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(99, 102, 241, 0.35)');  // Indigo transparan atas
    gradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)');   // Full transparan bawah

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($eventPerOrganization as $org)
                    "{{ $org->name }}",
                @endforeach
            ],
            datasets: [{
                label: 'Jumlah Event',
                data: [
                    @foreach($eventPerOrganization as $org)
                        {{ $org->events_count }},
                    @endforeach
                ],
                borderColor: '#6366f1',
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#6366f1',
                pointBorderWidth: 3,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointHoverBackgroundColor: '#6366f1',
                pointHoverBorderColor: '#ffffff',
                pointHoverBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    titleFont: { size: 13, weight: 'bold' },
                    bodyFont: { size: 12 },
                    cornerRadius: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return ' Total: ' + context.raw + ' Event';
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        color: '#64748b',
                        font: { size: 12, weight: '500' }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#94a3b8',
                        font: { size: 11 }
                    },
                    grid: {
                        color: '#f1f5f9',
                        drawBorder: false
                    }
                }
            }
        }
    });
});
</script>
@endif

@endsection