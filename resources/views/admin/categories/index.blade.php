@extends('layouts.admin')

@section('content')

<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-7xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                Manajemen Kategori
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Kelola daftar kategori event dan filter pencarian data secara efisien.
            </p>
        </div>
    </div>

    <!-- SEARCH & ACTION BAR -->
    <div class="mb-6 bg-white p-4 md:p-5 rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80">
        <form 
            action="/admin/categories" 
            method="GET" 
            class="flex flex-col md:flex-row gap-3 md:items-center"
        >
            <!-- SEARCH INPUT -->
            <div class="relative w-full md:flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text"
                    name="search"
                    placeholder="Cari kategori..."
                    class="w-full bg-slate-50/80 border border-slate-200 pl-10 pr-4 py-2.5 text-xs text-slate-800 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                >
            </div>

            <div class="flex items-center gap-2">
                <!-- BUTTON SEARCH -->
                <button 
                    type="submit"
                    class="px-5 py-2.5 bg-slate-800 hover:bg-slate-900 active:bg-black text-white text-xs font-semibold rounded-xl transition duration-150 shadow-sm"
                >
                    Search
                </button>

                <!-- BUTTON TAMBAH -->
                <a 
                    href="/admin/categories/create"
                    class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white text-xs font-semibold rounded-xl text-center transition duration-150 shadow-md shadow-indigo-100 whitespace-nowrap"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Kategori
                </a>
            </div>
        </form>
    </div>

    <!-- TABLE CONTAINER -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- HEAD -->
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-6 w-20">ID</th>
                        <th class="py-4 px-6">Nama Kategori</th>
                        <th class="py-4 px-6">Created At</th>
                        <th class="py-4 px-6">Updated At</th>
                        <th class="py-4 px-6 text-center w-32">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50/60 transition duration-150">
                            <!-- ID -->
                            <td class="py-4 px-6 font-mono font-bold text-slate-400">
                                #{{ $category->id }}
                            </td>

                            <!-- NAMA -->
                            <td class="py-4 px-6 font-semibold text-slate-900 text-sm">
                                {{ $category->name }}
                            </td>

                            <!-- CREATED -->
                            <td class="py-4 px-6 text-slate-500 whitespace-nowrap">
                                {{ $category->created_at }}
                            </td>

                            <!-- UPDATED -->
                            <td class="py-4 px-6 text-slate-500 whitespace-nowrap">
                                {{ $category->updated_at }}
                            </td>

                            <!-- AKSI -->
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- EDIT -->
                                    <a 
                                        href="/admin/categories/{{ $category->id }}/edit"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 font-semibold text-[11px] rounded-lg transition duration-150"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form 
                                        action="/admin/categories/{{ $category->id }}" 
                                        method="POST"
                                        class="inline-block"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button 
                                            type="submit"
                                            class="inline-flex items-center gap-1 px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 font-semibold text-[11px] rounded-lg transition duration-150"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')"
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
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    <p class="font-medium text-sm text-slate-500">Data kategori belum tersedia</p>
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