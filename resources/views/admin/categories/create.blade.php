@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white p-6 rounded-xl shadow max-w-2xl w-full">

    <form action="/admin/categories" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2">Nama Kategori</label>

            <input 
                type="text"
                name="name"
                class="border p-2 rounded-lg w-full"
            >
        </div>

        <button 
            type="submit"
            class="px-4 py-2 bg-indigo-600 text-white rounded-lg"
        >
            Simpan
        </button>

    </form>

</div>

@endsection