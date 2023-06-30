<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeCotroller extends Controller
{
    public function ProductList() {
        $products = Product::paginate(15);
        return view('home.content.products',compact('products'));
    }
}
