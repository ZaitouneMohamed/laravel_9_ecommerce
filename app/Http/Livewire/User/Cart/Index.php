<?php

namespace App\Http\Livewire\User\Cart;

use Darryldecode\Cart\Cart;
use Livewire\Component;

class Index extends Component
{
    public $quantity;
    public function render()
    {
        return view('livewire.user.cart.index');
    }
    public function getCardsProperty()
    {
        return \Cart::getContent();
    }
    public function DeleteItem($id)
    {
        \Cart::remove($id);
        $this->getCardsProperty();
    }
    public function increaseQantity($id)
    {
        \Cart::update($id, array(
            'quantity' => 1,
        ));
        $this->getCardsProperty();
    }
    public function decreaseQantity($id)
    {
        \Cart::update($id, array(
            'quantity' => -1,
        ));
        $this->getCardsProperty();
        $this->getCardsProperty();
    }
    public function UpdateCart()
    {
        \Cart::update();
        $this->getCardsProperty();
    }
}
