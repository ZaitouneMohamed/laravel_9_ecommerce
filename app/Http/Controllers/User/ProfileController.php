<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\CreateNewAdresse;
use App\Http\Requests\User\UpdateProfileInfoRequest;
use App\Models\Adresse;
use App\Models\Image;
use App\Models\User;
use App\Notifications\UpdateProfileEmail;
use App\Services\ImagesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $imagesservices;

    public function __construct(ImagesServices $ImagesServices)
    {
        $this->imagesservices = $ImagesServices;
    }
    public function index()
    {
        return view('home.user.profile');
    }

    public function UpdateProfile(UpdateProfileInfoRequest $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile("image")) {
            $picture = $request->image;
            $image = $this->imagesservices->uploadImage($picture, "profiles");
            if (Auth::user()->image) {
                Auth::user()->image->delete();
                $new_image = new Image(["url" => $image]);
                $user->Image()->save($new_image);
                $this->imagesservices->DeleteImageFromDirectory(Auth::user()->image, "profiles");
            }

            $new_image = new Image(["url" => $image]);
            $user->Image()->save($new_image);
        }
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

    public function AddNewAdresse(CreateNewAdresse $request)
    {
        $adresse = Adresse::create([
            'type' => $request->type,
            'name' => $request->name,
            'phone_number' => $request->phone,
            'postel_code' => "02202",
            'city' => $request->city,
            'adresse' => $request->adresse,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back()->with([
            "success" => "adresse added successfly"
        ]);
    }
}
