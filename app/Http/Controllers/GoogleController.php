<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect(Request $request)
{
    if ($request->has('event')) {

        session([
            'checkout_event' => $request->event
        ]);

    }

    return Socialite::driver('google')->redirect();
}

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {

            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'password' => bcrypt('password'),
            ]);

        } else {

            $user->update([
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
            ]);

        }

       Auth::login($user);

if(session()->has('checkout_event')){

    $event = session('checkout_event');

    session()->forget('checkout_event');

    return redirect()->route('checkout.create',$event);

}

return redirect()->route('home');
    }
}