<?php

namespace App\Http\Controllers;

use App\Models\Embed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EmbedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $embeds = Embed::select(['link','id'])->latest()->get();
        return view('embeds.embeds', compact('embeds'));
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
        return redirect('/embeds')->with('success', 'Embed created successfully!!');
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
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $embed =  Embed::select(['id','link'])->find($id);
        return view('embeds.edit', compact('embed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'link' => 'required'
        ]);
        $id = Crypt::decryptString($id);
        $table = Embed::find($id);
        $table->link = $request->link;
        $table->update();
        return redirect('/embeds')->with('success', 'Embed updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $embed = Embed::find($id);
        $embed->delete();
        return redirect()->back()->with('success', 'Embed updated successfully!!');
    }
}
