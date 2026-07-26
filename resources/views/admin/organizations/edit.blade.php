@extends('layouts.admin')

@section('content')

<div class="p-6">

<h2 class="text-2xl font-bold mb-6">

Edit Organization

</h2>

<form
action="{{ route('admin.organizations.update',$organization->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label>Nama Organization</label>

<input
type="text"
name="name"
value="{{ $organization->name }}"
class="border rounded w-full p-3">

</div>

<div class="mb-4">

<label>Deskripsi</label>

<textarea
name="description"
class="border rounded w-full p-3">{{ $organization->description }}</textarea>

</div>

<button
class="bg-indigo-600 text-white px-5 py-2 rounded">

Update

</button>

</form>

</div>

@endsection