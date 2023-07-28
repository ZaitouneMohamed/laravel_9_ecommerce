<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Notifications\WelcomeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ])->assignRole('user');
        Auth::login($user);
        $user->notify(new WelcomeEmail());
        return redirect()->intended('/');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->HasRole('admin')) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
