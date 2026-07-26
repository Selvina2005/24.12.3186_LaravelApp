@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">
            Data Organization
        </h2>

        <a href="{{ route('admin.organizations.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
            Tambah Organization
        </a>
    </div>


    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <div class="overflow-x-auto bg-white rounded shadow">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-center">No</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Deskripsi</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>

            </thead>


            <tbody>

            @forelse($organizations as $organization)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3 text-center">
                        {{ $loop->iteration }}
                    </td>


                    <td class="p-3">
                        {{ $organization->name }}
                    </td>


                    <td class="p-3">
                        {{ $organization->description }}
                    </td>


                    <td class="p-3 text-center">

                        @if($organization->status == 'approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Approved
                            </span>

                        @elseif($organization->status == 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                Pending
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Rejected
                            </span>

                        @endif

                    </td>


                    <td class="p-3">

                        <div class="flex items-center justify-center gap-2 flex-nowrap">


                            <a href="{{ route('admin.organizations.edit', $organization->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                Edit
                            </a>



                            <form action="{{ route('admin.organizations.destroy', $organization->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">

                                    Hapus

                                </button>

                            </form>



                            @if($organization->status == 'pending')


                                <form action="{{ route('admin.organizations.approve', $organization->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">

                                        Approve

                                    </button>

                                </form>



                                <form action="{{ route('admin.organizations.reject', $organization->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="bg-orange-600 hover:bg-orange-700 text-white px-3 py-1 rounded">

                                        Reject

                                    </button>

                                </form>


                            @endif


                        </div>

                    </td>


                </tr>


            @empty

                <tr>

                    <td colspan="5" class="text-center py-6 text-gray-500">
                        Belum ada data organization.
                    </td>

                </tr>

            @endforelse


            </tbody>


        </table>


    </div>


</div>

@endsection