<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'event_id' => 'required',
        'rating' => 'required|min:1|max:5',
        'review' => 'required'
    ]);

    Review::create([
        'event_id' => $request->event_id,
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'review' => $request->review
    ]);

    return back()->with('success','Review berhasil dikirim');
}
}
