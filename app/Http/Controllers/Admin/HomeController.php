<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\SubCategorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Categories()
    {
        $categories = Categorie::latest()->paginate(10);
        return view('admin.content.categories',compact("categories"));
    }
    
    public function SubCategories()
    {
        $subcategories = SubCategorie::latest()->paginate(10);
        return view('admin.content.subcategories',compact("subcategories"));
    }
    public function Products()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.content.products',compact("products"));
    }

}
