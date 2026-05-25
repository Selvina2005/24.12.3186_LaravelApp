@extends('layouts.admin')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">

    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl w-full">

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Edit Kategori
        </h1>

        <!-- FORM -->
        <form action="/admin/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('PUT')

            <!-- INPUT -->
            <div class="mb-5">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Nama Kategori
                </label>

                <input 
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Masukkan nama kategori..."
                    class="w-full border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 p-3 rounded-xl outline-none transition"
                >

                @error('name')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3">

                <a href="/admin/categories"
                    class="px-5 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl transition">
                    Kembali
                </a>

                <button 
                    type="submit"
                    class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition shadow-md"
                >
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection