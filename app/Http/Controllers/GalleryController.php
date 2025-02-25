<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('galleries.galleries',compact('galleries'));
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
        $image = $this->uploadImage('images/galleries/',$request->file('image'));
        Gallery::create(['title' => $validated['title'],'image' => $image]);
        return redirect('/galleries')->with('success','Gallery created successfully!!');
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
    public function edit(Gallery $gallery)
    {
        $gallery = Gallery::find($gallery->id);
        return view('galleries.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $table = Gallery::find($gallery->id);
        $image = $this->updateImage('images/galleries/',$table->image,$request->file('image'));
        $table->update(['title' => $validated['title'],'image' => $image]);
        return redirect('/galleries')->with('success','Gallery created successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $this->destroyImage('images/galleries/',$gallery->image);
        $gallery->delete();
        return redirect('/galleries')->with('success','Gallery deleted successfully!!');
    }
}
