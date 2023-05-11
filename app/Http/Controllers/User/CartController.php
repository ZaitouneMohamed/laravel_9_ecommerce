<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartlist()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('home.content.cart', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'quantity' => $request->quantity
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->back();
    }
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function add_order()
    {
        $cartItems = \Cart::getContent();
        dd($cartItems);
    }
}
