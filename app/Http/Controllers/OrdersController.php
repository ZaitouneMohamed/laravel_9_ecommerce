<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Order\StoreOrderRequest;
use App\Models\Categorie;
use App\Models\Orders;
use App\Models\Product;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function OrdersList()
    {
        $orders = Orders::latest()->get()->unique('order_number');
        return view('admin.content.orders', compact('orders'));
    }
    public function add_new_order(StoreOrderRequest $request)
    {
        // $cartItems = \Cart::getContent();
        $cartItems = session("cart");
        $order_number = DB::table('orders')->latest()->first();
        if ($order_number) {
            $order_number = $order_number->order_number + 1;
        } else {
            $order_number = 10000;
        }
        foreach ($cartItems as $item) {
            $product = Product::find($item['id']);
            $categorie_id = $product->categorie_id;
            $categorie = Categorie::find($categorie_id)->name;
            $subcategorie_id = $product->sub_categorie_id;
            $subcategorie = SubCategorie::find($subcategorie_id)->name;
            Orders::create([
                "order_number" => $order_number,
                "user_id" => auth()->user()->id,
                "delivery_date" => $request->delivery_date,
                "delivery_time" => $request->delivery_time,
                "branch" => $request->branch,
                "payement_methode" => $request->payement_methode,
                "adresse" => $request->adresse,
                "product" => $product->title,
                "product_price" => $product->price,
                "sub_categorie" => $subcategorie,
                "category" => $categorie,
                "qty" => $item['quantity'],
                "total" => $item['quantity'] * $product->price,
                "statue" => 1
            ]);
        }
        // dd($product);
        session()->forget('cart');
        return redirect('/')->with([
            "success" => "order have been confirmed"
        ]);
    }

    public function MyOrdersList()
    {
        return view('home.content.orders');
    }
}
