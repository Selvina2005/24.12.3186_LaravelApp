@extends('layouts.admin')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-6">

    <div class="bg-white p-8 rounded-xl shadow-lg max-w-2xl w-full">

        <!-- TITLE -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Edit Partner
        </h1>

        <!-- FORM -->
        <form action="/admin/partners/{{ $partner->id }}" method="POST" enctype="multipart/form-data" class="space-y-5">
             @csrf
            @method('PUT')

            <!-- NAMA PARTNER -->
            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Nama Partner
                </label>

                <input 
                    type="text"
                    name="name"
                    value="{{ $partner->name }}"
                    placeholder="Masukkan nama partner"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                    required
                >
            </div>

           <!-- LOGO PARTNER -->
            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Logo Partner
                </label>

                <input
                    type="file"
                    name="logo"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                >

                @if($partner->logo_url)
                    <div class="mt-4">
                        <img
                            src="{{ asset('storage/'.$partner->logo_url) }}"
                            alt="{{ $partner->name }}"
                            class="h-20 w-32 object-contain border rounded-lg p-2 bg-gray-50"
                        >
                    </div>
                @endif
            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 pt-4">

                <!-- UPDATE -->
                <button 
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg shadow transition"
                >
                    Update
                </button>

                <!-- BATAL -->
                <a 
                    href="/admin/partners"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2.5 rounded-lg transition"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection