<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()->get();

        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        Organization::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()
            ->route('admin.organizations.index')
            ->with('success', 'Organization berhasil ditambahkan.');
    }

    public function edit(Organization $organization)
    {
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $organization->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()
            ->route('admin.organizations.index')
            ->with('success', 'Organization berhasil diperbarui.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()
            ->route('admin.organizations.index')
            ->with('success', 'Organization berhasil dihapus.');
    }

    public function approve(Organization $organization)
{
    $organization->update([
        'status'=>'approved'
    ]);

    return back()->with('success','Organizer berhasil disetujui.');
}

public function reject(Organization $organization)
{
    $organization->update([
        'status'=>'rejected'
    ]);

    return back()->with('success','Organizer berhasil ditolak.');
}
}