<?php

namespace App\Http\Controllers;

use App\Models\Embed;
use Illuminate\Http\Request;

class EmbedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $embeds = Embed::latest()->get();
        return view('embeds.embeds',compact('embeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('embeds.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'link' => 'required'
        ]);
        $table = new Embed;
        $table->link = $request->link;
        $table->save();
        return redirect('/embeds')->with('success','Embed created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Embed $embed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Embed $embed)
    {
        
        $embed =  Embed::find($embed->id);
        return view('embeds.edit',compact('embed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Embed $embed)
    {
        $validated = $request->validate([
            'link' => 'required'
        ]);
        $table = Embed::find($embed->id);
        $table->link = $request->link;
        $table->update();
        return redirect('/embeds')->with('success','Embed updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Embed $embed)
    {
        
        $embed =  Embed::find($embed->id);
        $embed->delete();
        return redirect()->back()->with('success','Embed updated successfully!!');
    }
}
