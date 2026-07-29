@extends('layouts.admin')

@section('content')

<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-4xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                Edit Kategori
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Perbarui informasi nama kategori di bawah ini.
            </p>
        </div>

        <!-- BUTTON KEMBALI (HEADER) -->
        <a href="/admin/categories" 
           class="inline-flex items-center gap-2 text-xs font-semibold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2.5 rounded-xl transition duration-150 self-start md:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- MAIN FORM CONTAINER -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 md:p-8">

        <form action="/admin/categories/{{ $category->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- NAMA KATEGORI -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Nama Kategori <span class="text-rose-500">*</span>
                </label>

                <input 
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Masukkan nama kategori..."
                    class="w-full bg-slate-50/80 border @error('name') border-rose-300 bg-rose-50/30 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                >

                @error('name')
                    <p class="text-rose-500 text-xs font-medium mt-2 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- ACTION BUTTONS -->
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6 mt-8">

                <a href="/admin/categories"
                   class="px-5 py-2.5 rounded-xl font-semibold text-xs text-slate-500 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 transition duration-150">
                    Kembali
                </a>

                <button 
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white px-7 py-2.5 rounded-xl font-semibold text-xs shadow-md shadow-indigo-100 hover:shadow-lg transition duration-150"
                >
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection