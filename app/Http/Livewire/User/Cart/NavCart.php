<?php

namespace App\Http\Livewire\User\Cart;

use Livewire\Component;

class NavCart extends Component
{
    public function render()
    {
        return view('livewire.user.cart.nav-cart');
    }
    public function DeleteItem($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
    }
}
