<?php

namespace App\Http\Livewire\Admin\Content;

use App\Models\Product;
use Livewire\Component;

class ProductsIndex extends Component
{
    public $products;
    public function render()
    {
        return view('livewire.admin.content.products-index');
    }
    public function index()
    {
        $this->products = Product::latest()->get();
    }
    public function mount()
    {
        $this->index();
    }
    public function activeToogle($id)
    {
        $product = Product::find($id);
        $product->active = !$product->active;
        $product->save();
        $this->index();
    }
    public function preniumToogle($id)
    {
        $product = Product::find($id);
        $product->prenium = !$product->prenium;
        $product->save();
        $this->index();
    }
}
