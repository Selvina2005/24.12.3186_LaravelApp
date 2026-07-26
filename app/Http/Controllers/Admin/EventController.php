<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
public function index()
{
    if (auth()->user()->role == 'superadmin') {

        $events = Event::with(['category', 'organization'])
            ->latest()
            ->paginate(10);

    } else {

        $events = Event::with(['category', 'organization'])
            ->where('organization_id', auth()->user()->organization_id)
            ->latest()
            ->paginate(10);
    }

    return view('admin.events.index', compact('events'));
}


    public function create()
    {
        $categories = Category::all();
        $partners = Partner::all();

        return view(
            'admin.events.create',
            compact('categories', 'partners')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
            'poster' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')
                ->store('posters', 'public');
        }

        $data['organization_id'] = auth()->user()->organization_id;
        Event::create($data);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Data Event berhasil ditambahkan.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

public function edit(Event $event)
{
    if (
        auth()->user()->role != 'superadmin' &&
        $event->organization_id != auth()->user()->organization_id
    ) {
        abort(403);
    }

    $categories = Category::all();
    $partners = Partner::all();

    return view(
        'admin.events.edits',
        compact('event', 'categories', 'partners')
    );
}
    public function update(Request $request, Event $event)
    {
         // Cek apakah organizer berhak mengedit event ini
    if (
        auth()->user()->role != 'superadmin' &&
        $event->organization_id != auth()->user()->organization_id
    ) {
        abort(403);
    }
    
        $data = $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
            'poster' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster')) {

            if ($event->poster_path) {
                Storage::disk('public')->delete($event->poster_path);
            }

            $data['poster_path'] = $request->file('poster')
                ->store('posters', 'public');
        }

        $event->update($data);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
{
    if (
        auth()->user()->role != 'superadmin'
        &&
        $event->organization_id != auth()->user()->organization_id
    ) {
        abort(403);
    }

    if ($event->poster_path) {
        Storage::disk('public')->delete($event->poster_path);
    }

    $event->delete();

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Data event berhasil dihapus secara permanen.');
}
}