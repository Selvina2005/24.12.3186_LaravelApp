@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50/50 py-10 sm:py-16">

    <div class="max-w-4xl mx-auto px-4 sm:px-6">


        {{-- HEADER EVENT --}}
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 mb-8 shadow-sm relative overflow-hidden">

            <!-- Accent Background Layer -->
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600"></div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight leading-snug">
                {{ $event->title }}
            </h1>


            <p class="text-indigo-600 font-bold text-sm sm:text-base mt-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h5m-5 0V11m0 0h5m-5 0H7"></path>
                </svg>
                <span>{{ $event->partner->name ?? 'Penyelenggara' }}</span>
            </p>


            <div class="flex items-center gap-3 mt-6 pt-5 border-t border-slate-100">


                <span class="text-amber-500 font-black text-xl sm:text-2xl flex items-center gap-1.5">

                    ⭐ {{ number_format($reviews->avg('rating') ?? 0, 1) }}

                </span>


                <span class="text-slate-500 font-medium text-sm sm:text-base">

                    ({{ $reviews->count() }} Review)

                </span>


            </div>


        </div>



        {{-- LIST REVIEW --}}
        <div class="space-y-5">


            @forelse($reviews as $review)


            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7 shadow-sm hover:shadow-md transition duration-200">


                <div class="flex justify-between items-start mb-4 gap-4">


                    <div class="flex items-center gap-3.5">


                        <div class="w-11 h-11 rounded-2xl bg-indigo-50 border border-indigo-100/80 flex items-center justify-center font-bold text-indigo-600 text-base shadow-sm shrink-0">

                            {{ strtoupper(substr($review->user->name,0,1)) }}

                        </div>


                        <div>

                            <p class="font-bold text-slate-900 text-base leading-tight">

                                {{ $review->user->name }}

                            </p>


                            <p class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full inline-block mt-1">

                                Peserta Event

                            </p>

                        </div>


                    </div>



                    <div class="text-amber-400 text-lg tracking-widest shrink-0 font-medium bg-amber-50/80 px-3 py-1 rounded-xl border border-amber-100/80">

                        {{ str_repeat('★',$review->rating) }}

                        {{ str_repeat('☆',5-$review->rating) }}

                    </div>


                </div>



                <p class="text-slate-600 italic text-sm sm:text-base leading-relaxed bg-slate-50/80 p-4 rounded-2xl border border-slate-100">

                    "{{ $review->review }}"

                </p>



            </div>


            @empty


            <div class="bg-white rounded-3xl border border-slate-200/80 p-12 text-center shadow-sm">

                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>

                <p class="text-slate-500 font-medium text-sm sm:text-base">

                    Belum ada review untuk event ini.

                </p>

            </div>


            @endforelse


        </div>

    </div>

</div>

@endsection