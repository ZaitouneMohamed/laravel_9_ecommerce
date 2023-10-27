<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Services\GetProducts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $ProductService;

    public function __construct(GetProducts $product)
    {
        $this->ProductService = $product;
    }
    public function Home()
    {
        $categories = Categorie::latest()->get();
        $latest_products = Product::latest()->Active()->take(4)->get();
        $prenium_products = Product::latest()->Active()->Prenium()->take(4)->get();
        $topcategorie = $this->ProductService->GetTopCategorie();
        return view('electro.index', compact("latest_products", "categories", "prenium_products", "topcategorie"));
    }

    public function checkout()
    {
        return view('electro.checkout');
    }

    public function GetProduct($id)
    {
        $product = Product::with('Images')->find($id);
        $latest_products = Product::latest()->Active()->take(4)->get();
        return view('electro.product', compact('product', "latest_products"));
    }
    public function Search(Request $request)
    {
        $products = Product::where('title', 'LIKE', '%' . $request->word . '%')->paginate(15);
        return view('electro.AllProducts', compact("products"));
    }
    public function about()
    {
        return view('electro.about');
    }
    public function contact()
    {
        return view('electro.contact');
    }
}
