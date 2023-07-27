<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed"
        ]);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" =>Hash::make($request->password)
        ])->assignRole('user');
        Auth::login($user);
        $user->notify(new WelcomeEmail());
        return redirect()->intended('/');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->HasRole('admin')) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }

        }else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
