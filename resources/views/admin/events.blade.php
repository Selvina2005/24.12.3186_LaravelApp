@extends('layouts.admin')

@section('content')

<div class="p-10">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        
        <div>
            <h1 class="text-3xl font-bold">Kelola Event</h1>

            <p class="text-slate-500">
                Buat dan atur acara seru Anda di sini.
            </p>
        </div>

        <!-- BUTTON TAMBAH -->
        <a 
            href="#"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold transition"
        >
            + Tambah Event Baru
        </a>

    </div>

    <!-- SEARCH -->
    <div class="bg-white p-6 rounded-2xl shadow mb-6 flex gap-4">

        <input 
            type="text" 
            placeholder="Cari nama event..."
            class="flex-1 border border-gray-300 p-3 rounded-xl outline-none focus:ring-2 focus:ring-indigo-200"
        >

        <select class="border border-gray-300 p-3 rounded-xl outline-none">
            <option>Semua Kategori</option>
        </select>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full text-left">

            <!-- TABLE HEAD -->
            <thead class="bg-gray-100 text-sm">

                <tr>
                    <th class="p-4">NO</th>
                    <th class="p-4">POSTER</th>
                    <th class="p-4">EVENT</th>
                    <th class="p-4">HARGA / STOK</th>
                    <th class="p-4">AKSI</th>
                </tr>

            </thead>

            <!-- TABLE BODY -->
            <tbody>

                <!-- EVENT 1 -->
                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- NO -->
                    <td class="p-4">
                        1
                    </td>

                    <!-- POSTER -->
                    <td class="p-4">
                        <img 
                            src="{{ asset('assets/concert.png') }}" 
                            class="w-16 rounded-lg object-cover"
                        >
                    </td>

                    <!-- EVENT -->
                    <td class="p-4">

                        <p class="font-bold">
                            Jazz Night 2024
                        </p>

                        <p class="text-sm text-gray-500">
                            Musik • 16 Nov 2024
                        </p>

                    </td>

                    <!-- HARGA -->
                    <td class="p-4">

                        <p class="text-indigo-600 font-bold">
                            Rp 150.000
                        </p>

                        <p class="text-sm text-gray-500">
                            Stok: 42/100
                        </p>

                    </td>

                    <!-- AKSI -->
                    <td class="p-4">

                        <!-- EDIT -->
                        <a 
                            href="#"
                            class="text-blue-500"
                        >
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form 
                            action="#" 
                            method="POST"
                            class="inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit"
                                class="text-red-500 ml-2"
                                onclick="return confirm('Yakin ingin menghapus event ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                <!-- EVENT 2 -->
                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- NO -->
                    <td class="p-4">
                        2
                    </td>

                    <!-- POSTER -->
                    <td class="p-4">
                        <img 
                            src="{{ asset('assets/workshop.png') }}" 
                            class="w-16 rounded-lg object-cover"
                        >
                    </td>

                    <!-- EVENT -->
                    <td class="p-4">

                        <p class="font-bold">
                            AI & Future Workshop
                        </p>

                        <p class="text-sm text-gray-500">
                            Tech • 26 Oct 2024
                        </p>

                    </td>

                    <!-- HARGA -->
                    <td class="p-4">

                        <p class="text-indigo-600 font-bold">
                            Rp 50.000
                        </p>

                        <p class="text-sm text-gray-500">
                            Stok: 12/50
                        </p>

                    </td>

                    <!-- AKSI -->
                    <td class="p-4">

                        <!-- EDIT -->
                        <a 
                            href="#"
                            class="text-blue-500"
                        >
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form 
                            action="#" 
                            method="POST"
                            class="inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit"
                                class="text-red-500 ml-2"
                                onclick="return confirm('Yakin ingin menghapus event ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection
