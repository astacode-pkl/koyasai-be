<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::select(['id', 'name', 'description', 'price', 'image'])->latest()->get();
        return view('catalogs.catalogs', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id', 'title'])->get();
        return view('catalogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
        ]);
        $image = $this->uploadImage('images/catalogs/', $request->file('image'));
        Catalog::create(
            [
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'image' => $image,
                'category_id' => $validated['category_id'],
            ]
        );
        return redirect('/catalogs')->with('success', 'Catalog created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $catalog = Catalog::find($id);
        $categories = Category::all();
        return view('catalogs.edit', compact('catalog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
        ]);
        $id = Crypt::decryptString($id);
        $table = Catalog::find($id);
        if(empty($request->file('image'))){
            $image = $table->image;
        }else{
        $image = $this->updateImage('images/catalogs/', $table->image, $request->file('image'));
        }
        $table->update([
            'name' => $validated['name'],
            'image' => $image,
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
        ]);
        return redirect('/catalogs')->with('success', 'Catalog updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $catalog = Catalog::find($id);
        $this->destroyImage('images/catalogs/', $catalog->image);
        $catalog->delete();
        return redirect('/galleries')->with('success', 'Catalog deleted successfully!!');
    }
}
