@extends('layouts.admin')

@section('content')
<!-- Google Fonts: Inter untuk tampilan UI yang modern & profesional -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-5xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                Edit Pengaturan Event
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Perbarui detail informasi acara, waktu pelaksanaan, dan kapasitas tiket.
            </p>
        </div>

        <a href="{{ route('admin.events.index') }}" 
           class="inline-flex items-center gap-2 text-xs font-semibold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2.5 rounded-xl transition duration-150 self-start md:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Error Summary Alert -->
    @if ($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 shadow-sm">
            <div class="flex items-center gap-2 font-bold mb-2 text-sm">
                <svg class="w-5 h-5 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Terdapat kesalahan pada input form:</span>
            </div>
            <ul class="list-disc list-inside text-xs space-y-1 pl-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Main Form Container -->
    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 md:p-8">

        @csrf
        @method('PUT')

        <div class="space-y-6">

            <!-- Judul Event -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Judul Event <span class="text-rose-500">*</span>
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $event->title) }}"
                       class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                       placeholder="Masukkan judul event"
                       required>
            </div>

            <!-- Penyelenggara & Partner (2 Columns) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Penyelenggara <span class="text-rose-500">*</span>
                    </label>
                    <select name="organization_id"
                            class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                            required>
                        <option value="">Pilih Penyelenggara</option>
                        @foreach($organizations as $organization)
                            <option value="{{ $organization->id }}"
                                {{ old('organization_id', $event->organization_id) == $organization->id ? 'selected' : '' }}>
                                {{ $organization->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Partner <span class="text-rose-500">*</span>
                    </label>
                    <select name="partner_id"
                            class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                            required>
                        <option value="">Pilih Partner</option>
                        @foreach($partners as $partner)
                            <option value="{{ $partner->id }}"
                                {{ old('partner_id', $event->partner_id) == $partner->id ? 'selected' : '' }}>
                                {{ $partner->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Kategori Event -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Kategori Event <span class="text-rose-500">*</span>
                </label>
                <select name="category_id"
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                        required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi Pendek -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Deskripsi Pendek <span class="text-rose-500">*</span>
                </label>
                <textarea name="description"
                          rows="3"
                          class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                          placeholder="Tuliskan deskripsi ringkas mengenai event..."
                          required>{{ old('description', $event->description) }}</textarea>
            </div>

            <!-- Tanggal, Harga, Stok (3 Columns) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Tanggal & Waktu <span class="text-rose-500">*</span>
                    </label>
                    <input type="datetime-local"
                           name="date"
                           value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') }}"
                           class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                           required>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Harga Tiket (Rp) <span class="text-rose-500">*</span>
                    </label>
                    <input type="number"
                           name="price"
                           value="{{ old('price', $event->price) }}"
                           class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                           placeholder="0"
                           required>

                    @error('price')
                        <p class="text-rose-500 text-xs mt-1.5 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Kapasitas Stok <span class="text-rose-500">*</span>
                    </label>
                    <input type="number"
                           name="stock"
                           value="{{ old('stock', $event->stock) }}"
                           class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                           placeholder="0"
                           required>
                </div>
            </div>

            <!-- Lokasi / Gedung -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Lokasi / Gedung <span class="text-rose-500">*</span>
                </label>
                <input type="text"
                       name="location"
                       value="{{ old('location', $event->location) }}"
                       class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                       placeholder="Contoh: Grand Ballroom Hotel Indonesia"
                       required>
            </div>

            <!-- Poster Event & Preview -->
            <div class="pt-4 border-t border-slate-100">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Poster Event (Opsional)
                </label>
                
                <input type="file"
                       name="poster"
                       accept="image/*"
                       class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 transition cursor-pointer">

                @if($event->poster_path)
                    <div class="mt-4 p-4 bg-slate-50 border border-slate-200/80 rounded-2xl inline-block">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Poster Saat Ini:
                        </p>
                        <img src="{{ asset('storage/' . $event->poster_path) }}"
                             class="w-36 h-auto rounded-xl border border-slate-200 shadow-sm object-cover"
                             alt="Poster Event">
                    </div>
                @endif
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-3 border-t border-slate-100 mt-8 pt-6">
            <a href="{{ route('admin.events.index') }}" 
               class="px-5 py-2.5 rounded-xl font-semibold text-xs text-slate-500 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 transition duration-150">
                Batal
            </a>
            <button type="submit"
                    class="bg-indigo-600 text-white px-7 py-2.5 rounded-xl font-semibold text-xs shadow-md shadow-indigo-100 hover:bg-indigo-700 hover:shadow-lg transition duration-150">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection