@extends('layouts.admin')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white p-6 rounded-xl shadow max-w-2xl w-full">

        <h1 class="text-2xl font-bold mb-6">Tambah Partner</h1>
    <form action="/admin/partners" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Nama Partner
                </label>

                <input 
                    type="text" 
                    name="name"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none"
                >
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Logo Partner
                </label>

                <input 
                    type="file" 
                    name="logo"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-3"
                >
            </div>

            <div class="flex gap-3 pt-2">

                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg">
                    Simpan
                </button>

                <a href="/admin/partners"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2.5 rounded-lg">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection