@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Manajemen Kategori
</h1>

<!-- SEARCH & ACTION -->
<div class="mb-6">
    
    <form 
        action="/admin/categories" 
        method="GET" 
        class="flex flex-col md:flex-row gap-3 md:items-center"
    >

        <!-- SEARCH -->
        <input 
            type="text"
            name="search"
            placeholder="Cari kategori..."
            class="w-full md:flex-1 border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 p-3 rounded-lg outline-none transition"
        >

        <!-- BUTTON SEARCH -->
        <button 
            type="submit"
            class="px-5 py-3 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition"
        >
            Search
        </button>

        <!-- BUTTON TAMBAH -->
        <a 
            href="/admin/categories/create"
            class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-center transition"
        >
            + Tambah Kategori
        </a>

    </form>

</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full text-left">

        <!-- HEAD -->
        <thead class="bg-gray-100">

            <tr>
                <th class="p-5 font-semibold">ID</th>
                <th class="p-5 font-semibold">Nama Kategori</th>
                <th class="p-5 font-semibold">Created At</th>
                <th class="p-5 font-semibold">Updated At</th>
                <th class="p-5 font-semibold">Aksi</th>
            </tr>

        </thead>

        <!-- BODY -->
        <tbody>

            @forelse($categories as $category)

            <tr class="border-t hover:bg-gray-50 transition">

                <!-- ID -->
                <td class="p-5">
                    {{ $category->id }}
                </td>

                <!-- NAMA -->
                <td class="p-5 font-medium">
                    {{ $category->name }}
                </td>

                <!-- CREATED -->
                <td class="p-5 text-gray-600">
                    {{ $category->created_at }}
                </td>

                <!-- UPDATED -->
                <td class="p-5 text-gray-600">
                    {{ $category->updated_at }}
                </td>

                <!-- AKSI -->
                <td class="p-5">

                    <div class="flex items-center gap-3">

                        <!-- EDIT -->
                        <a 
                            href="/admin/categories/{{ $category->id }}/edit"
                            class="text-blue-500 hover:underline"
                        >
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form 
                            action="/admin/categories/{{ $category->id }}" 
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit"
                                class="text-red-500 hover:underline"
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5" class="p-6 text-center text-gray-500">
                    Data kategori belum tersedia
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection