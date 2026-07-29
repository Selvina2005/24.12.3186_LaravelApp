@extends('layouts.admin')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')

<div class="p-6 md:p-8 max-w-7xl mx-auto">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">
                Manajemen Event
            </h2>
            <p class="text-xs md:text-sm text-slate-400 mt-1">
                Kelola daftar acara, poster, stok tiket, dan informasi organizer.
            </p>
        </div>

        <a
            href="{{ route('admin.events.create') }}"
            class="inline-flex items-center justify-center gap-2 bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm shadow-sm hover:bg-indigo-700 hover:shadow transition-all duration-200"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Event
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 text-emerald-700 p-4 rounded-2xl mb-6 border border-emerald-200/80 shadow-sm text-sm font-medium">
            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Table Container -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">

            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-slate-50/80 text-slate-400 uppercase text-[10px] font-black tracking-widest border-b border-slate-100">

                        <th class="p-4 md:px-6 md:py-4">
                            Poster
                        </th>

                        <th class="p-4 md:px-6 md:py-4">
                            Judul Event
                        </th>

                        <th class="p-4 md:px-6 md:py-4">
                            Kategori
                        </th>

                        <th class="p-4 md:px-6 md:py-4">
                            Organizer
                        </th>
                        
                        <th class="p-4 md:px-6 md:py-4">
                            Tanggal
                        </th>

                        <th class="p-4 md:px-6 md:py-4">
                            Harga
                        </th>

                        <th class="p-4 md:px-6 md:py-4 text-center">
                            Stok
                        </th>

                        <th class="p-4 md:px-6 md:py-4 text-right">
                            Aksi Pilihan
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @foreach($events as $event)

                    <tr class="hover:bg-slate-50/80 transition duration-150">

                        <td class="p-4 md:px-6 md:py-4">

                            <img
                                src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                                    ? asset('storage/' . $event->poster_path)
                                    : 'https://placehold.co/160x200' }}"
                                class="w-16 h-20 rounded-none object-cover shadow-sm border border-slate-200"
                                alt="{{ $event->title }}"
                            >

                        </td>

                        <td class="p-4 md:px-6 md:py-4 font-bold text-slate-800 max-w-xs leading-snug">
                            {{ $event->title }}
                        </td>

                        <td class="p-4 md:px-6 md:py-4">
                            <span class="inline-flex items-center px-2.5 py-1 bg-indigo-50 text-indigo-700 rounded-md text-xs font-semibold">
                                {{ $event->category->name ?? '-' }}
                            </span>
                        </td>

                        <td class="p-4 md:px-6 md:py-4 text-slate-600 font-semibold">
                            {{ $event->organization->name ?? '-' }}
                        </td>

                        <td class="p-4 md:px-6 md:py-4 text-slate-500 whitespace-nowrap text-xs font-medium">
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}
                        </td>

                        <td class="p-4 md:px-6 md:py-4 font-bold whitespace-nowrap">

                            @if($event->price == 0)

                                <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-xs font-extrabold tracking-wider uppercase">
                                    GRATIS
                                </span>

                            @else

                                <span class="text-slate-800 font-extrabold">
                                    Rp {{ number_format($event->price, 0, ',', '.') }}
                                </span>

                            @endif

                        </td>

                        <td class="p-4 md:px-6 md:py-4 text-center font-bold">

                            @if($event->stock > 10)
                                <span class="inline-flex items-center justify-center min-w-[2.5rem] px-2 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200/60 rounded-full text-xs font-extrabold">
                                    {{ $event->stock }}
                                </span>
                            @else
                                <span class="inline-flex items-center justify-center min-w-[2.5rem] px-2 py-1 bg-rose-50 text-rose-600 border border-rose-200/60 rounded-full text-xs font-extrabold">
                                    {{ $event->stock }}
                                </span>
                            @endif

                        </td>

                        <td class="p-4 md:px-6 md:py-4 text-right">

                            <div class="flex items-center justify-end gap-2">

                                <a
                                    href="{{ route('admin.events.edit', $event->id) }}"
                                    class="bg-sky-50 text-sky-600 border border-sky-200/80 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-sky-600 hover:text-white transition-all duration-150"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.events.destroy', $event->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Anda yakin ingin menghapus data acara ini secara permanen?');"
                                    class="inline-block"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-rose-50 text-rose-600 border border-rose-200/80 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-rose-600 hover:text-white transition-all duration-150"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection