<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        dd($products);
    }
    public function getProductOfSubCategorie($id)
    {
        $data = [
            "id" => $id,
            "type" => "subcategorie"
        ];
        $products = $this->productsListService->GetProductsList($data);
        dd($products);
    }
}
