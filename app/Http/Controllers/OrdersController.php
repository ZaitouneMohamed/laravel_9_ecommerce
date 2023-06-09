<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function OrdersList()
    {
        $orders = Orders::latest();
        return view('admin.content.orders',compact('orders'));
    }
    public function add_new_order(Request $request)
    {
        $cartItems = \Cart::getContent();
        $order_number = DB::table('orders')->latest()->first();
        if ($order_number) {
            $order_number = $order_number->order_number + 1;
        } else {
            $order_number = 10000;
        }
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            $subcategorie = $product->SubCategorie;
            $categorie = $subcategorie->categorie->name;
            Orders::create([
                "order_number" => $order_number,
                "customar_name" => auth()->user()->name,
                "customar_number" => "070022555458",
                "customar_email" => auth()->user()->email,
                "delivery_date" => $request->delivery_date,
                "delivery_time" => $request->delivery_time,
                "branch" => $request->branch,
                "payement_methode" => $request->payement_methode,
                "adresse" => $request->adresse,
                "product" => $product->title,
                "sub_categorie" => $subcategorie->name,
                "category" => $categorie,
                "qty" => $item->quantity
            ]);
        }
        \Cart::clear();
        return redirect('/')->with([
            "success" => "order have been confirmed"
        ]);
    }
}
