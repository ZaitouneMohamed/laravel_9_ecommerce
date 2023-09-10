<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class CartContent extends Component
{
    public function render()
    {
        $cart_content = session("cart");
        return view('livewire.cart.cart-content',[
            "cart" => $cart_content
        ]);
    }
}
