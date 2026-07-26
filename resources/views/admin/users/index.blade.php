@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Manajemen User
        </h2>

        <a href="{{ route('admin.users.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

            Tambah User

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3">Nama</th>

                <th class="p-3">Email</th>

                <th class="p-3">Role</th>

                <th class="p-3">Organization</th>

                <th class="p-3">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

            <tr class="border-t">

                <td class="p-3">

                    {{ $user->name }}

                </td>

                <td class="p-3">

                    {{ $user->email }}

                </td>

                <td class="p-3">

                    {{ ucfirst($user->role) }}

                </td>

                <td class="p-3">

                    {{ $user->organization->name ?? '-' }}

                </td>

                <td class="p-3 flex gap-2">

                    <a href="{{ route('admin.users.edit',$user->id) }}"
                        class="bg-blue-500 text-white px-3 py-1 rounded">

                        Edit

                    </a>

                    <form action="{{ route('admin.users.destroy',$user->id) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus user?')"
                            class="bg-red-500 text-white px-3 py-1 rounded">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection