@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-2xl mx-auto">

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-8 py-6">

                <h1 class="text-3xl font-bold text-white">
                    Edit Partner
                </h1>

                <p class="text-blue-100 mt-1">
                    Perbarui informasi partner dengan mudah dan cepat.
                </p>

            </div>

            <div class="p-8">

                <form action="/admin/partners/{{ $partner->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Partner
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $partner->name }}"
                               placeholder="Masukkan nama partner"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">

                    </div>

                    <div class="mb-8">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Logo URL
                        </label>

                        <input type="text"
                               name="logo_url"
                               value="{{ $partner->logo_url }}"
                               placeholder="Masukkan URL logo"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">

                    </div>

                    <div class="flex items-center gap-4">

                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-md transition duration-300">

                            Update Partner

                        </button>

                        <a href="/admin/partners"
                           class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-xl transition duration-300">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection