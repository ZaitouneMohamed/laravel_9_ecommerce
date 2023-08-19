<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Services\ImagesServices;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $imagesservices;

    public function __construct(ImagesServices $ImagesServices)
    {
        $this->imagesservices = $ImagesServices;
    }
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
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            "title" => $request->title,
            "description" => $request->description,
            "slug" => Str::slug($request->title),
            "price" => $request->price,
            "old_price" => $request->old_price,
            "sub_categorie_id" => $request->sub_categorie,
            "categorie_id" => $request->categorie_id
        ]);
        if ($request->has('images')) {
            foreach ($request->file('images') as $picture) {
                $image = $this->imagesservices->uploadImage($picture, "products");

                $new_image = new Image(["url" => $image]);

                $product->Images()->save($new_image);

                // $product->Images()->create([
                //     'url' => $new_image,
                // ]);
            }
        }

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
        $product = Product::findOrFail($id);
        return view('electro.product',compact('product'));
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
