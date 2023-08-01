<?php

namespace App\Services;

use App\Models\Product;

class GetProducts
{
    public function GetProductsList(array $info)
    {
        $type = $info['type'];
        $id = $info['id'];
        if ($type == "subcategorie") {
            $products = Product::where('sub_categorie_id', $id)->paginate(1);
            return $products;
        } else {
            $products = Product::where('categorie_id', $id)->paginate(1);
            return $products;
        }
    }
}
