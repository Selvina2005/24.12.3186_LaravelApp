@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
    <div class="flex-1 space-y-8">
        <h1 class="text-5xl font-bold">
            Temukan & Pesan Tiket Event Impianmu
        </h1>
        <p class="text-slate-500">
            Dari konser hingga workshop, semua ada di sini.
        </p>
    </div>

    <div class="flex-1">
        <img src="{{ asset('assets/concert.png') }}" class="rounded-2xl">
    </div>
</section>

<!-- Events -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <h2 class="text-3xl font-bold mb-8">Event Terdekat</h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('assets/concert.png') }}">
            <h3 class="font-bold mt-2">Jazz Night</h3>
            <a href="/event/1" class="text-indigo-600">Detail</a>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('assets/workshop.png') }}">
            <h3 class="font-bold mt-2">Workshop AI</h3>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('assets/hackathon.png') }}">
            <h3 class="font-bold mt-2">Hackathon</h3>
        </div>

    </div>
</section>

@endsection