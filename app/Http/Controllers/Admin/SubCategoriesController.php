<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategorie::latest()->paginate(10);
        return view('admin.content.subcategories.index',compact("subcategories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.content.subcategories.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required"
        ]);
        SubCategorie::create([
            "name" => $request->name,
            "categorie_id" => $request->categorie
        ]);
        return redirect()->route('admin.SubCategories.index');
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
        $Scategorie = SubCategorie::findOrFail($id);
        $categories = Categorie::all();
        return view('admin.content.subcategories.edit',compact('Scategorie','categories'));
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
        $Scategorie = SubCategorie::findOrFail($id);
        $this->validate($request,[
            "name" => "required"
        ]);
        if ($Scategorie) {
            $Scategorie->update([
                "name" => $request->name,
                "categorie_id" => $request->categorie
            ]);
        }
        return redirect()->route('admin.SubCategories.index')->with([
            "success" => "sub categorie update with success"
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
        $Scategorie = SubCategorie::findOrFail($id)->delete();
        return redirect()->route('admin.SubCategories.index')->with([
            "success" => "sub categorie update with success"
        ]);
    }
}
