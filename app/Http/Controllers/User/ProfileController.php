<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileInfoRequest;
use App\Models\User;
use App\Notifications\UpdateProfileEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('home.user.profile');
    }

    public function UpdateProfile(UpdateProfileInfoRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
        ]);
        $user->notify(new UpdateProfileEmail());
        return redirect()->back()->with([
            'success' => 'profile updated successfly',
        ]);
    }
}
