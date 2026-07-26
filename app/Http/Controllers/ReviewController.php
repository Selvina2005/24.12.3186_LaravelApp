<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Event;
use App\Models\Transaction;

class ReviewController extends Controller
{

    public function create(Event $event)
    {
        return view('review.create', compact('event'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'event_id' => 'required',
            'rating' => 'required|min:1|max:5',
            'review' => 'required'
        ]);


        $event = Event::findOrFail($request->event_id);


        // cek user pernah membeli tiket
        $hasTicket = Transaction::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->where('status', 'success')
            ->exists();


        if (!$hasTicket) {

            return back()->with('error',
                'Kamu belum membeli tiket event ini.'
            );

        }


        // cek event sudah selesai
        if (now()->lessThan($event->date)) {

            return back()->with('error',
                'Review hanya dapat diberikan setelah event selesai.'
            );

        }


        // cegah review dua kali
        $alreadyReview = Review::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->exists();


        if ($alreadyReview) {

            return back()->with('error',
                'Kamu sudah memberikan review untuk event ini.'
            );

        }


        Review::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'review' => $request->review
        ]);


        return redirect()->route('ticket')
            ->with('success','Review berhasil dikirim');

    }



    // Halaman semua review berdasarkan event
    public function index(Event $event)
    {

        $event->load([
            'partner'
        ]);


        $reviews = Review::with('user')
            ->where('event_id', $event->id)
            ->latest()
            ->get();


        return view(
        'review.index',
        compact(
            'event',
            'reviews'
        )
    );

    }

}