@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto px-4">


        {{-- HEADER EVENT --}}
        <div class="bg-white rounded-3xl shadow p-8 mb-8">


            <h1 class="text-3xl font-black text-slate-800">
                {{ $event->title }}
            </h1>


            <p class="text-indigo-600 font-semibold mt-2">
                {{ $event->partner->name ?? 'Penyelenggara' }}
            </p>


            <div class="flex items-center gap-3 mt-4">


                <span class="text-yellow-500 font-bold text-xl">

                    ⭐ {{ number_format($reviews->avg('rating') ?? 0, 1) }}

                </span>


                <span class="text-slate-500">

                    ({{ $reviews->count() }} Review)

                </span>


            </div>


        </div>



        {{-- LIST REVIEW --}}
        <div class="space-y-5">


            @forelse($reviews as $review)


            <div class="bg-white rounded-3xl shadow p-6">


                <div class="flex justify-between items-start mb-4">


                    <div class="flex items-center gap-3">


                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">

                            {{ strtoupper(substr($review->user->name,0,1)) }}

                        </div>


                        <div>

                            <p class="font-bold text-slate-800">

                                {{ $review->user->name }}

                            </p>


                            <p class="text-xs text-slate-500">

                                Peserta Event

                            </p>

                        </div>


                    </div>



                    <div class="text-yellow-500">

                        {{ str_repeat('★',$review->rating) }}

                        {{ str_repeat('☆',5-$review->rating) }}

                    </div>


                </div>



                <p class="text-slate-600 italic">

                    "{{ $review->review }}"

                </p>



            </div>


            @empty


            <div class="bg-white rounded-2xl shadow p-8 text-center">

                <p class="text-slate-500">

                    Belum ada review untuk event ini.

                </p>

            </div>


            @endforelse


        </div>

    </div>

</div>

@endsection