<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            $user = User::create([
                'first_name' => $googleUser->user['given_name'] ?? $googleUser->name,
                'last_name' => $googleUser->user['family_name'] ?? '',
                'email' => $googleUser->email,
                'password' => \Hash::make(rand(100000, 999999)),
            ]);
            // $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => \Hash::make(rand(100000, 999999))]);
        }
        Auth::login($user);
        return redirect()->intended('/')->with([
            "success" => __("You are logged in successfully")
        ]);
    }
}
