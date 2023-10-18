<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categorie\CreateCategorieRequest;
use App\Http\Requests\Admin\Categorie\UpdateCategorieRequest;
use App\Models\Categorie;
use App\Models\Image;
use App\Services\ImagesServices;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $categories = Categorie::latest()->paginate(10);
        return view('admin.content.categories.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategorieRequest $request)
    {
        $picture = $request->image;

        $image = $this->imagesservices->uploadImage($picture, "categories");

        $categorie = Categorie::create([
            "name" => $request->name,
            "image" => $image
        ]);
        $new_image = new Image(["url" => $image]);

        $categorie->Image()->save($new_image);

        return redirect()->route("admin.categories.index")->with([
            "success" => "categorie added successfly"
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
        $categorie = Categorie::findOrFail($id);
        return view('admin.content.categories.edit', compact("categorie"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieRequest $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
        ]);
        if ($request->hasFile('image')) {
            // Delete the old image
            try {
                $this->imagesservices->deleteImageFromDirectory($categorie->Image->url, 'categories');
            } catch (\Exception $e) {
            }
            $newImage = $this->imagesservices->uploadImage($request->file('image'), 'categories');
            $categorie->image->update(['url' => $newImage]);
        }
        $categorie->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.categories.index')->with([
            'success' => 'Category updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $image = $categorie->Image;
        $image = $this->imagesservices->DeleteImageFromDirectory($image->url, "categories");
        $categorie->delete();
        return redirect()->route('admin.categories.index')->with([
            "success" => "categorie deleted successfly"
        ]);
    }
}
