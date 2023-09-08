<?php

namespace App\Services;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\SubCategorie;

class GetProducts
{
    public function GetProductsList(array $info)
    {
        $type = $info['type'];
        $id = $info['id'];
        if ($type == "subcategorie") {
            $products = Product::where('sub_categorie_id', $id)->paginate(20);
            return $products;
        } else {
            $products = Product::where('categorie_id', $id)->paginate(20);
            return $products;
        }
    }

    public function GetTopCategorie()
    {
        $SubCategorie = SubCategorie::withCount('products')
            ->orderByDesc('products_count')
            ->with("products")
            ->first();
        // $categoryWithMostProduct = $SubCategorie->categorie;
        return $SubCategorie;
    }
}
