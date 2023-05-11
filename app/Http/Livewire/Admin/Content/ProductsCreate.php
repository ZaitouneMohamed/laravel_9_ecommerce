<?php

namespace App\Http\Livewire\Admin\Content;

use App\Models\Categorie;
use App\Models\SubCategorie;
use Livewire\Component;

class ProductsCreate extends Component
{
    public $categorie, $subcategories , $categories;


    public function render()
    {
        return view('livewire.admin.content.products-create');
    }
    public function mount()
    {
        $this->categories = Categorie::all();
    }
    public function updateSubCategoriesOptions()
    {
        $this->subcategories = SubCategorie::where('categorie_id', $this->categorie)->get();
    }
}
