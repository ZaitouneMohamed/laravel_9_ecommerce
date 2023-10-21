<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    public function SwitchStatueOfTimeSlot($id)
    {
        $time = TimeSlot::findOrFail($id);
        $time->active = !$time->active;
        $time->save();
        return redirect()->back()->with([
            "success" => "time update with success"
        ]);
    }
    function SwitchPreniumModeForProduct($id)
    {
        $product = Product::find($id);
        $product->prenium = !$product->prenium;
        $product->save();
        return redirect()->back()->with([
            "success" => "product Prenium Mode Update sucessfly"
        ]);
    }
    function SwitchActiveModeForProduct($id)
    {
        $product = Product::find($id);
        $product->active = !$product->active;
        $product->save();
        return redirect()->back()->with([
            "success" => "product Active Mode Update sucessfly"
        ]);
    }
}
