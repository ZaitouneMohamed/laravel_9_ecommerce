<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Orders;
use App\Models\Product;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function add_new_order()
    {
        $cartItems = \Cart::getContent();
        $order_number = DB::table('orders')->latest()->first();
        $number = $order_number->order_number + 1;
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            $subcategorie = $product->SubCategorie->name;
            $scid = $product->SubCategorie->id;
            $categorie = Categorie::find($scid);
            Orders::create([
                "order_number" => $number,
                "customar_name" => auth()->user()->name,
                "customar_number" => "070022555458",
                "customar_email" => auth()->user()->email,
                "product" => $product->title,
                "sub_categorie" => $subcategorie,
                "category" => "hii",
                "qty" => $item->quantity
            ]);
        }
        \Cart::clear();
        return redirect('/');
    }
}
