<?php

namespace App\Http\Livewire\User\Products;

use App\Models\Product;
use Livewire\Component;

class Latest extends Component
{
    public $product_id;
    public function render()
    {
        return view('livewire.user.products.latest');
    }
    public function getProductsProperty()
    {
        return Product::latest()->take(6)->get();
    }
    public function AddToCard($id)
    {
        $product = Product::find($id);
        \Cart::add([
            'id' => $id,
            'name' => $product->title,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1
        ]);
        session()->flash('message', 'Post successfully updated.');
    }
}
