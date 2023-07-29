<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getProductOfCategorie(Request $request, $id)
    {
        return view('user.shop');
    }
}
