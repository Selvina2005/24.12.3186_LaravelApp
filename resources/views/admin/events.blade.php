@extends('layouts.admin')

@section('content')

<div class="p-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">Kelola Event</h1>
            <p class="text-slate-500">Buat dan atur acara seru Anda di sini.</p>
        </div>

        <button class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold">
            + Tambah Event Baru
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white p-6 rounded-2xl shadow mb-6 flex gap-4">
        <input type="text" placeholder="Cari nama event..."
            class="flex-1 border p-3 rounded-xl">

        <select class="border p-3 rounded-xl">
            <option>Semua Kategori</option>
        </select>
    </div>
    @yield('content')
    <!-- Table -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full text-left">
            <thead class="bg-gray-100 text-sm">
                <tr>
                    <th class="p-4">NO</th>
                    <th class="p-4">POSTER</th>
                    <th class="p-4">EVENT</th>
                    <th class="p-4">HARGA / STOK</th>
                    <th class="p-4">AKSI</th>
                </tr>
            </thead>

            <tbody>

                <!-- Event 1 -->
                <tr class="border-t">
                    <td class="p-4">1</td>
                    <td class="p-4">
                        <img src="{{ asset('assets/concert.png') }}" class="w-16 rounded">
                    </td>
                    <td class="p-4">
                        <p class="font-bold">Jazz Night 2024</p>
                        <p class="text-sm text-gray-500">Musik • 16 Nov 2024</p>
                    </td>
                    <td class="p-4">
                        <p class="text-indigo-600 font-bold">Rp 150.000</p>
                        <p class="text-sm text-gray-500">Stok: 42/100</p>
                    </td>
                    <td class="p-4 flex gap-2">
                        <button class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded">Edit</button>
                        <button class="bg-red-100 text-red-600 px-3 py-1 rounded">Hapus</button>
                    </td>
                </tr>

                <!-- Event 2 -->
                <tr class="border-t">
                    <td class="p-4">2</td>
                    <td class="p-4">
                        <img src="{{ asset('assets/workshop.png') }}" class="w-16 rounded">
                    </td>
                    <td class="p-4">
                        <p class="font-bold">AI & Future Workshop</p>
                        <p class="text-sm text-gray-500">Tech • 26 Oct 2024</p>
                    </td>
                    <td class="p-4">
                        <p class="text-indigo-600 font-bold">Rp 50.000</p>
                        <p class="text-sm text-gray-500">Stok: 12/50</p>
                    </td>
                    <td class="p-4 flex gap-2">
                        <button class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded">Edit</button>
                        <button class="bg-red-100 text-red-600 px-3 py-1 rounded">Hapus</button>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

</div>

@endsection