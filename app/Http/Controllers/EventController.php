<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Organization;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
        public function show(Event $event)
{
    $categories = Category::all();

    // Load review beserta user
    $event->load('reviews.user');

    // ===========================
    // DATA PENYELENGGARA
    // ===========================

    $partner = $event->partner;

    $totalEvent = 0;
    $totalReview = 0;
    $averageRating = 0;

    if ($partner) {

        $partnerEvents = Event::where('partner_id', $partner->id)->get();

        $totalEvent = $partnerEvents->count();

        foreach ($partnerEvents as $e) {

            $totalReview += $e->reviews()->count();

            $averageRating += $e->reviews()->sum('rating');

        }

        $averageRating = $totalReview > 0
            ? round($averageRating / $totalReview, 1)
            : 0;
    }

    // ===========================
    // CEK APAKAH USER BOLEH REVIEW
    // ===========================

    $canReview = false;

    if (auth()->check()) {

        $hasTicket = Transaction::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->where('status', 'success')
            ->exists();

        $eventFinished = now()->greaterThan($event->date);

        $canReview = $hasTicket && $eventFinished;
    }

    return view(
        'event-detail',
        compact(
            'event',
            'categories',
            'canReview',
            'partner',
            'totalEvent',
            'totalReview',
            'averageRating'
        )
    );
}


    public function checkout()
    {
        return view('checkout');
    }


 public function ticket()
{
    $transactions = Transaction::where('user_id', auth()->id())
        ->where('status', 'success')
        ->with(['event.reviews'])
        ->get();

    return view('ticket-detail', compact('transactions'));
}

    public function showTicket(Transaction $transaction)
    {
        if ($transaction->user_id != auth()->id()) {
            abort(403);
        }

        $transaction->load('event.reviews');

        return view('ticket', compact('transaction'));
    }

    public function create()
{
    $categories = Category::all();
    $partners = Partner::all();
    $organizations = Organization::all();

    return view(
        'admin.events.create',
        compact(
            'categories',
            'partners',
            'organizations'
        )
    );
}
   
   public function edit(Event $event)
{
    $categories = Category::all();
    $partners = Partner::all();
    $organizations = Organization::all();

    return view(
        'admin.events.edits',
        compact(
            'event',
            'categories',
            'partners',
            'organizations'
        )
    );
}
}