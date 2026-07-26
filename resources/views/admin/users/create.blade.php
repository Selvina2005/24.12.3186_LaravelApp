@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto p-6">

<h2 class="text-2xl font-bold mb-6">

Tambah User

</h2>

<form
action="{{ route('admin.users.store') }}"
method="POST">

@csrf

<div class="mb-4">

<label>Nama</label>

<input
type="text"
name="name"
class="w-full border rounded p-3"
required>

</div>

<div class="mb-4">

<label>Email</label>

<input
type="email"
name="email"
class="w-full border rounded p-3"
required>

</div>

<div class="mb-4">

<label>Password</label>

<input
type="password"
name="password"
class="w-full border rounded p-3"
required>

</div>

<div class="mb-4">

<label>Role</label>

<select
name="role"
class="w-full border rounded p-3">

<option value="superadmin">

Super Admin

</option>

<option value="organizer">

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

<option value="{{ $organization->id }}">

{{ $organization->name }}

</option>

@endforeach

</select>

</div>

<button
class="bg-indigo-600 text-white px-6 py-3 rounded">

Simpan

</button>

</form>

</div>

@endsection