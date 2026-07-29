@extends('layouts.app')

@section('content')

<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.rating input {
    display: none;
}

.rating label {
    font-size: 2.5rem;
    color: #d1d5db;
    cursor: pointer;
    transition: .2s;
}

.rating label:hover,
.rating label:hover ~ label {
    color: #facc15;
}

.rating input:checked ~ label {
    color: #facc15;
}
</style>

<div class="min-h-screen bg-slate-50/50 py-10 sm:py-16">

    <div class="max-w-xl mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 relative overflow-hidden">

            <!-- Decorative Accent Line -->
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-amber-400 via-indigo-500 to-indigo-600"></div>

            <div class="mb-8">

                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                    ⭐ Rating & Review
                </h1>

                <p class="text-slate-500 text-sm sm:text-base mt-2">
                    Bagikan pengalamanmu setelah mengikuti event
                </p>

                <div class="mt-4 p-4 bg-indigo-50/80 border border-indigo-100 rounded-2xl">

                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                        Event
                    </p>

                    <h2 class="font-bold text-lg sm:text-xl text-indigo-600 mt-0.5">
                        {{ $event->title }}
                    </h2>

                </div>

            </div>


            {{-- Error --}}
            @if($errors->any())

                <div class="mb-5 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl p-4 text-sm font-medium">

                    <ul class="space-y-1">

                        @foreach($errors->all() as $error)

                            <li class="flex items-start gap-2">
                                <span class="text-rose-500">•</span>
                                <span>{{ $error }}</span>
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="mb-6 bg-emerald-50/80 border border-emerald-200/80 rounded-2xl p-4 text-emerald-800 text-xs sm:text-sm font-medium leading-relaxed flex items-start gap-3">

                <span class="text-lg leading-none shrink-0">🎉</span>
                <div>
                    Terima kasih telah mengikuti event ini.
                    Bagikan pengalamanmu agar peserta lain mendapatkan informasi yang bermanfaat.
                </div>

            </div>


            <form action="{{ route('review.store') }}" method="POST" class="space-y-6">

                @csrf

                <input
                    type="hidden"
                    name="event_id"
                    value="{{ $event->id }}"
                >


                {{-- Rating --}}
                <div>

                    <label class="block font-bold text-slate-800 text-sm sm:text-base mb-2">
                        Berikan Rating
                    </label>

                    <div class="rating">

                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5">★</label>

                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4">★</label>

                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3">★</label>

                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2">★</label>

                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1">★</label>

                    </div>

                </div>


                {{-- Review --}}
                <div>

                    <label class="block font-bold text-slate-800 text-sm sm:text-base mb-2">
                        Tulis Review
                    </label>

                    <textarea
                        name="review"
                        rows="5"
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-2xl p-4 text-sm sm:text-base text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition duration-150"
                        placeholder="Ceritakan pengalamanmu mengikuti event ini..."
                    >{{ old('review') }}</textarea>

                </div>


                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white py-3.5 rounded-2xl font-bold text-base shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 transition duration-200">

                        Kirim Review

                    </button>
                </div>


                <a
                    href="{{ route('ticket') }}"
                    class="block text-center mt-5 text-indigo-600 font-bold text-sm hover:text-indigo-700 transition duration-150">

                    ← Kembali ke Tiket Saya

                </a>

            </form>

        </div>

    </div>

</div>

@endsection