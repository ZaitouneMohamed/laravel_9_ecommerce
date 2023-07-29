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
        return redirect()->intended('/')->with([
            "success" =>__("Registration successful. You can now log-in.")
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->HasRole('admin')) {
                return redirect()->intended('/admin')->with([
                    "success" => __("welcome to Admin Dashboard"),
                ]);
            } else {
                return redirect()->intended('/')->with([
                    "success" => __("You are logged in successfully")
                ]);
            }
        } else {
            return redirect()->back()->with([
                "error" => __('Invalid credentials')
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
