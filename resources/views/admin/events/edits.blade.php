@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Menyunting Pengaturan Event
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 mt-2">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Judul Event
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $event->title) }}"
                   class="w-full border border-gray-300 p-2.5 rounded focus:ring focus:ring-blue-200"
                   required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Kategori Event
            </label>

            <select name="category_id"
                    class="w-full border border-gray-300 p-2.5 rounded"
                    required>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $event->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Deskripsi Pendek
            </label>

            <textarea name="description"
                      rows="3"
                      class="w-full border border-gray-300 p-2.5 rounded"
                      required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-4">

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Tanggal & Waktu
                </label>

                <input type="datetime-local"
                       name="date"
                       value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') }}"
                       class="w-full border border-gray-300 p-2.5 rounded"
                       required>
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Harga Tiket (Rp)
                </label>

                <input type="number"
                    name="price"
                    min="0"
                    value="{{ old('price', $event->price) }}"
                    class="w-full border border-gray-300 p-2.5 rounded"
                    required>
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Stok Tiket
                </label>

                <input type="number"
                    name="stock"
                    min="1"
                    value="{{ old('stock', $event->stock) }}"
                    class="w-full border border-gray-300 p-2.5 rounded"
                    required>
            </div>

        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Lokasi Event
            </label>

            <input type="text"
                   name="location"
                   value="{{ old('location', $event->location) }}"
                   class="w-full border border-gray-300 p-2.5 rounded"
                   required>
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">
                Poster Event (Opsional)
            </label>

            <input type="file"
                   name="poster"
                   accept="image/*"
                   class="w-full border border-gray-300 p-2.5 rounded">

            @if($event->poster_path)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">
                        Poster Saat Ini:
                    </p>

                    <img src="{{ asset('storage/' . $event->poster_path) }}"
                         alt="Poster Event"
                         class="w-40 rounded-lg border shadow">
                </div>
            @endif
        </div>

        <div class="flex justify-end border-t pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-8 py-2.5 rounded font-semibold hover:bg-blue-700 shadow-md">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection