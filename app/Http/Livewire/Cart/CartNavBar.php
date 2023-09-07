<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class CartNavBar extends Component
{
    public $prix, $cartcount;

    public function render()
    {
        return view('livewire.cart.cart-nav-bar');
    }

    public function mount()
    {
        if (session('cart')) {
            foreach (session('cart') as $item) {
                $this->prix += $item['price'] * $item['quantity'];
                $this->cartcount++;
            };
        } else {
            $this->prix = 0;
            $this->cartcount = 0;
        }
    }
}
