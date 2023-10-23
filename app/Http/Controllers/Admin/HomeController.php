<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\SubCategorie;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function Categories()
    {
        $categories = Categorie::latest()->paginate(10);
        return view('admin.content.categories', compact("categories"));
    }

    public function SubCategories()
    {
        $subcategories = SubCategorie::latest()->paginate(10);
        return view('admin.content.subcategories', compact("subcategories"));
    }
    public function Products()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.content.products', compact("products"));
    }

    public function SwitchActiveModeForTimeSlot($id)
    {
        $timeSlot = TimeSlot::find($id);
        $timeSlot->active = !$timeSlot->active;
        $timeSlot->save();
        return redirect()->back()->with([
            "success" => "time slot updated sucessfly"
        ]);
    }

    public function getSubCategories(Request $request)
    {
        $categorie = $request->categorie;
        $subcategories = SubCategorie::where('categorie_id', $categorie)->get();
        return response()->json($subcategories);
    }
    public function SetProfile(ProfileRequest $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->back()->with([
            "success" => "profile update with success"
        ]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return back()->with('error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}
