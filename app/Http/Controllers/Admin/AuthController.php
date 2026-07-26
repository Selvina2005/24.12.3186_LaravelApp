<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Super Admin dan Organizer masuk ke dashboard yang sama
            if (
                auth()->user()->role == 'superadmin' ||
                auth()->user()->role == 'organizer'
            ) {
                return redirect()->route('admin.dashboard');
            }

            // User biasa
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak terdaftar.',
        ])->onlyInput('email');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}