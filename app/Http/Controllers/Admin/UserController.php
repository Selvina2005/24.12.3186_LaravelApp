<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('organization')->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $organizations = Organization::all();

        return view('admin.users.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role'=>'required',
            'organization_id'=>'nullable'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'organization_id'=>$request->organization_id
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success','User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $organizations = Organization::all();

        return view('admin.users.edit', compact(
            'user',
            'organizations'
        ));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required',
            'organization_id'=>'nullable'
        ]);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'organization_id'=>$request->organization_id
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success','User berhasil diubah.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success','User berhasil dihapus.');
    }
}