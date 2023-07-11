<?php

namespace App\Http\Livewire\Admin\Content;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsIndex extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    // public $products;
    public function render()
    {
        return view('livewire.admin.content.products-index',[
            'products' => Product::paginate(10),
        ]);
    }
    // public function index()
    // {
    //     $this->products = Product::paginate(10);
    // }
    // public function mount()
    // {
    //     $this->index();
    // }
    public function activeToogle($id)
    {
        $product = Product::find($id);
        $product->active = !$product->active;
        $product->save();
        // $this->index();
    }
    public function preniumToogle($id)
    {
        $product = Product::find($id);
        $product->prenium = !$product->prenium;
        $product->save();
        // $this->index();
    }
}
