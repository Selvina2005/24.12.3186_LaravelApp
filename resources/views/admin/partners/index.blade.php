@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10 px-6">

    <div class="max-w-6xl mx-auto">

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-8 py-6 flex justify-between items-center">

                <div>
                    <h1 class="text-3xl font-bold text-white">
                        Data Partner
                    </h1>

                    <p class="text-blue-100 mt-1">
                        Kelola seluruh data partner dengan mudah
                    </p>
                </div>

                <a href="/admin/partners/create"
                   class="bg-white text-indigo-600 px-5 py-3 rounded-xl font-semibold shadow hover:bg-gray-100 transition duration-300">

                    + Tambah Partner

                </a>

            </div>

            <!-- Table -->
            <div class="p-8 overflow-x-auto">

                <table class="w-full border-collapse">

                    <thead>

                        <tr class="bg-gray-100 text-left text-gray-700">

                            <th class="p-4 font-semibold">No</th>
                            <th class="p-4 font-semibold">Nama</th>
                            <th class="p-4 font-semibold">Logo</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($partners as $partner)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 font-medium text-gray-800">
                                {{ $partner->name }}
                            </td>

                            <td class="p-4">

                                <img src="{{ asset('assets/concert.png') }}"
                                     class="w-20 h-20 rounded-lg object-cover shadow">

                            </td>

                            <td class="p-4">

                                <div class="flex justify-center gap-3">

                                    <a href="/admin/partners/{{ $partner->id }}/edit"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg shadow transition">

                                        Edit

                                    </a>

                                    <form action="/admin/partners/{{ $partner->id }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection