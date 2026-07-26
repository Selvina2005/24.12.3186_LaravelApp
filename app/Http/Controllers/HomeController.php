<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Review;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Kategori
        $categories = Category::all();

        $query = Event::with([
            'category',
            'partner'
        ])
        ->withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->where('date', '>=', now())
        ->orderBy('date', 'asc');

        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $events = $query->get();

        // Partner
        $partners = Partner::all();

        // Review
        $reviews = Review::with([
            'user',
            'event.partner'
        ])
        ->latest()
        ->get()
        ->groupBy('event_id');

        return view(
            'welcome',
            compact(
                'events',
                'categories',
                'partners',
                'reviews'
            )
        );
    }
}