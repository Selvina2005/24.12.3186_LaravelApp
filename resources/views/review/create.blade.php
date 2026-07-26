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

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-xl mx-auto">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <div class="mb-8">

                <h1 class="text-3xl font-black text-slate-800">
                    ⭐ Rating & Review
                </h1>

                <p class="text-slate-500 mt-2">
                    Bagikan pengalamanmu setelah mengikuti event
                </p>

                <div class="mt-4 p-4 bg-indigo-50 rounded-2xl">

                    <p class="text-sm text-slate-500">
                        Event
                    </p>

                    <h2 class="font-bold text-xl text-indigo-600">
                        {{ $event->title }}
                    </h2>

                </div>

            </div>


            {{-- Error --}}
            @if($errors->any())

                <div class="mb-5 bg-red-100 border border-red-300 text-red-700 rounded-xl p-4">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>• {{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="mb-6 bg-green-50 border border-green-200 rounded-2xl p-4 text-green-700">

                🎉 Terima kasih telah mengikuti event ini.
                Bagikan pengalamanmu agar peserta lain mendapatkan informasi yang bermanfaat.

            </div>


            <form action="{{ route('review.store') }}" method="POST">

                @csrf

                <input
                    type="hidden"
                    name="event_id"
                    value="{{ $event->id }}"
                >


                {{-- Rating --}}
                <div class="mb-8">

                    <label class="block font-bold text-slate-700 mb-3">
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
                <div class="mb-8">

                    <label class="block font-bold text-slate-700 mb-3">
                        Tulis Review
                    </label>

                    <textarea
                        name="review"
                        rows="5"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-indigo-300"
                        placeholder="Ceritakan pengalamanmu mengikuti event ini..."
                    >{{ old('review') }}</textarea>

                </div>


                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-2xl font-bold transition">

                    Kirim Review

                </button>


                <a
                    href="{{ route('ticket') }}"
                    class="block text-center mt-5 text-indigo-600 font-semibold hover:underline">

                    ← Kembali ke Tiket Saya

                </a>

            </form>

        </div>

    </div>

</div>

@endsection