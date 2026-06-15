@extends('layouts.admin')
@php
use Illuminate\Support\Str;
@endphp
@section('content')

<h1 class="text-2xl font-bold mb-6">Manajemen Partner</h1>

<!-- SEARCH & ACTION BAR -->
<div class="mb-6">
    <form action="/admin/partners" method="GET" class="flex flex-col md:flex-row gap-3 md:items-center">

        <!-- Input Search -->
        <input 
            type="text"
            name="search"
            placeholder="Cari partner..."
            class="w-full md:flex-1 border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 p-2.5 rounded-lg outline-none transition"
        >

        <!-- Button Search -->
        <button 
            type="submit"
            class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition"
        >
            Search
        </button>

        <!-- Button Tambah -->
        <a 
            href="/admin/partners/create"
            class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-center transition"
        >
            + Tambah Partner
        </a>

    </form>
</div>

<!-- TABEL -->
<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full text-left">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-4">ID</th>
                <th class="p-4">Nama Partner</th>
                <th class="p-4">Logo</th>
                <th class="p-4">Created At</th>
                <th class="p-4">Updated At</th>
                <th class="p-4">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($partners as $partner)

            <tr class="border-t hover:bg-gray-50 transition">

                <!-- ID -->
                <td class="p-4">
                    {{ $partner->id }}
                </td>

                <!-- NAMA -->
                <td class="p-4">
                    {{ $partner->name }}
                </td>

                <!-- LOGO -->
                <td class="p-4">

                    @if($partner->logo_url)

                        <img
                            src="{{ asset('storage/' . $partner->logo_url) }}"
                            alt="{{ $partner->name }}"
                            class="h-16 w-24 object-contain">

                    @else

                        <span class="text-gray-400">Tidak ada logo</span>

                    @endif

                </td>

                <!-- CREATED -->
                <td class="p-4">
                    {{ $partner->created_at }}
                </td>

                <!-- UPDATED -->
                <td class="p-4">
                    {{ $partner->updated_at }}
                </td>

                <!-- AKSI -->
                <td class="p-4">

                    <div class="flex gap-2 items-center">

                        <!-- EDIT -->
                        <a 
                            href="/admin/partners/{{ $partner->id }}/edit"
                            class="text-blue-500 hover:underline"
                        >
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form 
                            action="/admin/partners/{{ $partner->id }}" 
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit"
                                class="text-red-500 hover:underline"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center p-6 text-gray-500">
                    Data partner belum tersedia
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection