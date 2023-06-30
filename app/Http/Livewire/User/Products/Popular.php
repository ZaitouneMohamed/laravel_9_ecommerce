<?php

namespace App\Http\Livewire\User\Products;

use App\Models\Product;
use Livewire\Component;

class Popular extends Component
{
    public function render()
    {
        return view('livewire.user.products.popular');
    }
    public function getProductsProperty()
    {
        return Product::latest()->take(6)->get();
    }
}
