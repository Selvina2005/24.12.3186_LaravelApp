@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <h2 class="text-2xl font-bold mb-6">
        Edit User
    </h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama</label>

            <input
                type="text"
                name="name"
                class="w-full border rounded p-3"
                value="{{ old('name', $user->name) }}"
                required>
        </div>

        <div class="mb-4">
            <label>Email</label>

            <input
                type="email"
                name="email"
                class="w-full border rounded p-3"
                value="{{ old('email', $user->email) }}"
                required>
        </div>

        <div class="mb-4">
            <label>Role</label>

            <select
                name="role"
                class="w-full border rounded p-3">

                <option value="superadmin"
                    {{ $user->role == 'superadmin' ? 'selected' : '' }}>
                    Super Admin
                </option>

                <option value="organizer"
                    {{ $user->role == 'organizer' ? 'selected' : '' }}>
                    Organizer
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label>Organization</label>

            <select
                name="organization_id"
                class="w-full border rounded p-3">

                <option value="">-- Pilih Organization --</option>

                @foreach($organizations as $organization)

                    <option
                        value="{{ $organization->id }}"
                        {{ $user->organization_id == $organization->id ? 'selected' : '' }}>

                        {{ $organization->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <button
            class="bg-indigo-600 text-white px-6 py-3 rounded">

            Update

        </button>

    </form>

</div>

@endsection