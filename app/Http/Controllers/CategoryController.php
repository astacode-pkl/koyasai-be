<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    protected $guarded = ['id'];
    public function index()
    {
        $categories = Category::select(['title', 'id'])->get();
        return view('categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|string|max:50|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            ]
        );

        // Ubah seluruh string menjadi huruf kecil, lalu ubah huruf pertama menjadi huruf besar
        $validated['title'] = ucwords(strtolower($validated['title']));

        Category::create($validated);

        return redirect('/categories')->with('success', 'Category created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'title' => 'required|string|max:30|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            ]
        );
        $id = Crypt::decryptString($id);
        $category = Category::find($id);
        $category->title = $validated['title'];
        $category->update();
        return redirect('/categories')->with('success', 'Category updated successfully!!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $category = Category::find($id);

        //when you delete category so images will be deleted in folder ----->
        $catalogs = Catalog::get()->where('category_id', $id);
        $destinationPath = 'images/catalogs/';
        foreach ($catalogs as $catalog) {
            if ($catalog->image && file_exists(
                public_path($destinationPath . $catalog->image)
            )) {

                unlink(public_path($destinationPath . $catalog->image));
            }
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!!');
    }
}
