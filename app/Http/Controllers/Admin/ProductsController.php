<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.content.products.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "image" => "required",
            "old_price" => "required",
            "sub_categorie" => "required"
        ]);
        if ($request->has('image')) {
            $file = $request ->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'),$image_name);
        }
        Product::create([
            "title" => $request->title,
            "description" => $request->description,
            "slug" => Str::slug($request->title),
            "price" => $request->price,
            "old_price" => $request->old_price,
            "image" => $image_name,
            "sub_categorie_id" => $request->sub_categorie
        ]);
        return redirect()->route('admin.products.index')->with([
            "success" => "produc added successfly"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
