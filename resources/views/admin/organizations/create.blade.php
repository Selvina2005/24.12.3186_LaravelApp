@extends('layouts.admin')

@section('content')

<div class="p-6">

<h2 class="text-2xl font-bold mb-6">
Tambah Organization
</h2>

<form
action="{{ route('admin.organizations.store') }}"
method="POST">

@csrf

<div class="mb-4">

<label>Nama Organization</label>

<input
type="text"
name="name"
class="border rounded w-full p-3">

</div>

<div class="mb-4">

<label>Deskripsi</label>

<textarea
name="description"
class="border rounded w-full p-3"></textarea>

</div>

<button
class="bg-indigo-600 text-white px-5 py-2 rounded">

Simpan

</button>

</form>

</div>

@endsection