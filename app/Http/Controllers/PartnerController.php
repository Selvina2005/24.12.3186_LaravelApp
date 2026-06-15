<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'logo_url' => $logoPath,
        ]);

        return redirect('/admin/partners')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

   public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $partner = Partner::findOrFail($id);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('logo')) {
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect('/admin/partners')
            ->with('success', 'Partner berhasil diupdate');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect('/admin/partners')->with('success', 'Partner berhasil dihapus');
    }
}