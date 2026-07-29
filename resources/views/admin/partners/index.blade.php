@extends('layouts.admin')
@php
use Illuminate\Support\Str;
@endphp
@section('content')

<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-7xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                Manajemen Partner
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Kelola daftar partner, logo, serta informasi detail terkait.
            </p>
        </div>

        <!-- ACTION BUTTON (TOP RIGHT) -->
        <a href="/admin/partners/create" 
           class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold text-xs rounded-xl shadow-md shadow-indigo-100 transition duration-150 self-start md:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Partner
        </a>
    </div>

    <!-- SEARCH BAR CONTAINER -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 p-4 mb-6">
        <form action="/admin/partners" method="GET" class="flex flex-col md:flex-row gap-3">
            <!-- Input Search -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text"
                    name="search"
                    placeholder="Cari partner berdasarkan nama..."
                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50/80 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 rounded-xl text-xs text-slate-800 transition duration-150"
                >
            </div>

            <!-- Button Search -->
            <button 
                type="submit"
                class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold text-xs rounded-xl transition duration-150 shadow-sm shrink-0"
            >
                Cari Data
            </button>
        </form>
    </div>

    <!-- TABLE CONTAINER -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Logo</th>
                        <th class="py-4 px-6">Nama Partner</th>
                        <th class="py-4 px-6">Created At</th>
                        <th class="py-4 px-6">Updated At</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($partners as $partner)
                    <tr class="hover:bg-slate-50/60 transition duration-150">
                        <!-- ID -->
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            #{{ $partner->id }}
                        </td>

                        <!-- LOGO (SQUARE / NORMAL NO ROUNDED) -->
                        <td class="py-4 px-6">
                            @if($partner->logo_url)
                                <div class="w-24 h-16 flex items-center justify-start overflow-hidden">
                                    <img
                                        src="{{ asset('storage/' . $partner->logo_url) }}"
                                        alt="{{ $partner->name }}"
                                        class="max-h-full max-w-full object-contain">
                                </div>
                            @else
                                <span class="text-slate-400 text-xs">
                                    Tidak ada logo
                                </span>
                            @endif
                        </td>

                        <!-- NAMA -->
                        <td class="py-4 px-6 font-bold text-slate-900">
                            {{ $partner->name }}
                        </td>

                        <!-- CREATED -->
                        <td class="py-4 px-6 text-slate-500 whitespace-nowrap">
                            {{ $partner->created_at }}
                        </td>

                        <!-- UPDATED -->
                        <td class="py-4 px-6 text-slate-500 whitespace-nowrap">
                            {{ $partner->updated_at }}
                        </td>

                        <!-- AKSI -->
                        <td class="py-4 px-6 text-right whitespace-nowrap">
                            <div class="inline-flex items-center gap-2 justify-end">
                                <!-- EDIT -->
                                <a 
                                    href="/admin/partners/{{ $partner->id }}/edit"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg font-semibold text-xs text-indigo-600 hover:text-indigo-700 bg-indigo-50 hover:bg-indigo-100/70 transition duration-150"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form 
                                    action="/admin/partners/{{ $partner->id }}" 
                                    method="POST"
                                    class="inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button 
                                        type="submit"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg font-semibold text-xs text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100/70 transition duration-150"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="font-medium text-sm text-slate-500">Data partner belum tersedia</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection