<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::select('id', 'image', 'title', 'description')->latest()->get();
        return view('news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $this->uploadImage('images/news/', $request->file('image'));
        News::create(['title' => $validated['title'], 'image' => $image, 'description' => $validated['description']]);
        return redirect('/news')->with('success', 'News created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $news = News::select('id', 'image', 'title', 'description')->find($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $id = Crypt::decryptString($id);
        $table = News::find($id);
        $image = $this->updateImage('images/news/', $table->image, $request->file('image'));
        $table->update(['title' => $validated['title'], 'image' => $image, 'description' => $validated['description']]);
        return redirect('/news')->with('success', 'News updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $news = News::find($id);
        $this->destroyImage('images/news/', $news->image);
        $news->delete();
        return redirect('/news')->with('success', 'News deleted successfully!!');
    }
}
