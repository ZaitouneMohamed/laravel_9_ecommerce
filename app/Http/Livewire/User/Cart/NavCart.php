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
        \Cart::remove($id);
    }
}
