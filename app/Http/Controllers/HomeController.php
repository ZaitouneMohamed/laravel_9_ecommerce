<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $categories = Categorie::latest()->take(3)->get();
        $latest_products = Product::latest()->take(4)->get();
        $prenium_products = Product::latest()->Prenium()->take(4)->get();
        return view('electro.index', compact("latest_products", "categories", "prenium_products"));
    }

    public function checkout()
    {
        return view('electro.checkout');
    }
}
