<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\GetProducts;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productsListService;

    public function __construct(GetProducts $productsList)
    {
        $this->productsListService = $productsList;
    }
    public function getProductOfCategorie($id)
    {
        $data = [
            "id" => $id,
            "type" => "categorie"
        ];
        $products = $this->productsListService->GetProductsList($data);
        return view('electro.AllProducts', compact('products'));
    }
    public function getProductOfSubCategorie($id)
    {
        $data = [
            "id" => $id,
            "type" => "subcategorie"
        ];
        $products = $this->productsListService->GetProductsList($data);
        return view('electro.AllProducts', compact('products'));
        // dd($products);
    }
    public function AllProduct(Request $request)
    {
        $query = Product::query();

        if ($request->min) {
            $query->where('price', '>=', $request->min);
        }

        if ($request->max) {
            $query->where('price', '<=', $request->max);
        }

        $products = $query->with("SubCategorie")->paginate(15);

        return view('electro.AllProducts', compact("products"));
    }
}
