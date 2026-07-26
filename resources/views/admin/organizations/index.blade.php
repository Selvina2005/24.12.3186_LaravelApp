@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-6">

        <h2 class="text-2xl font-bold">
            Data Organization
        </h2>

        <a href="{{ route('admin.organizations.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded">

            Tambah Organization

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 p-4 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    <table class="w-full border bg-white">

        <thead>

            <tr class="bg-gray-100">

                <th class="p-3">No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @foreach($organizations as $organization)

            <tr class="border-b">

                <td class="p-3">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $organization->name }}
                </td>

                <td>
                    {{ $organization->description }}
                </td>

                <td>

                <td>

    @if($organization->status == 'approved')

        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
            Approved
        </span>

    @elseif($organization->status == 'pending')

        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
            Pending
        </span>

    @else

        <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
            Rejected
        </span>

    @endif

</td>

                    <a
                        href="{{ route('admin.organizations.edit',$organization->id) }}"
                        class="text-blue-600">
                        Edit
                    </a>

                    |

                    <form
                        action="{{ route('admin.organizations.destroy',$organization->id) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>
                        
                     </form>

    @if($organization->status == 'pending')

        <form
            action="{{ route('organizations.approve',$organization) }}"
            method="POST"
            class="mt-2">

            @csrf
            @method('PATCH')

            <button
                class="bg-green-600 text-white px-3 py-1 rounded">
                Approve
            </button>

        </form>

        <form
            action="{{ route('organizations.reject',$organization) }}"
            method="POST"
            class="mt-2">

            @csrf
            @method('PATCH')

            <button
                class="bg-red-600 text-white px-3 py-1 rounded">
                Reject
            </button>

        </form>

    @endif
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection