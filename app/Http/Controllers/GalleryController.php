<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::select('id', 'image', 'title')->latest()->get();
        return view('galleries.galleries', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $this->uploadImage('images/galleries/', $request->file('image'));
        Gallery::create(['title' => $validated['title'], 'image' => $image]);
        return redirect('/galleries')->with('success', 'Gallery created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $gallery = Gallery::select(['id', 'image', 'title'])->find($id);
        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $id = Crypt::decryptString($id);
        $table = Gallery::find($id);
        $image = $this->updateImage('images/galleries/', $table->image, $request->file('image'));
        $table->update(['image' => $image,'title' =>  $validated['title']]);
        return redirect('/galleries')->with('success', 'Gallery updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $gallery = Gallery::find($id);
        $this->destroyImage('images/galleries/', $gallery->image);
        $gallery->delete();
        return redirect('/galleries')->with('success', 'Gallery deleted successfully!!');
    }
}
