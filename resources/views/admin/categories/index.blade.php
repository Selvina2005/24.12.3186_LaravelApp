@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Manajemen Kategori</h1>

<!-- Tombol Tambah -->
<div class="mb-4">
    <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow">
        + Tambah Kategori
    </button>
</div>

<!-- Tabel -->
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-4">No</th>
                <th class="p-4">Nama Kategori</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <tr class="border-t">
                <td class="p-4">1</td>
                <td class="p-4">Seminar</td>
                <td class="p-4">
                    <button class="text-blue-500">Edit</button>
                    <button class="text-red-500 ml-2">Hapus</button>
                </td>
            </tr>

            <tr class="border-t">
                <td class="p-4">2</td>
                <td class="p-4">Konser</td>
                <td class="p-4">
                    <button class="text-blue-500">Edit</button>
                    <button class="text-red-500 ml-2">Hapus</button>
                </td>
            </tr>

            <tr class="border-t">
                <td class="p-4">3</td>
                <td class="p-4">Workshop</td>
                <td class="p-4">
                    <button class="text-blue-500">Edit</button>
                    <button class="text-red-500 ml-2">Hapus</button>
                </td>
            </tr>

        </tbody>
    </table>
</div>

@endsection