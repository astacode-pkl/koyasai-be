<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::orderBy('position')->get();
        return view('heroes.heroes', compact('heroes'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newPosition = count(Hero::all()) + 1;
        return view('heroes.create', compact('newPosition'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'position' => 'required|max:20|numeric|unique:heroes',
                'image' => 'image|mimes:jpeg,png,jpg'
            ]
        );

        $imageName = $this->uploadImage('images/heroes/', $request->file('image'));

        Hero::create(['position' => $validated['position'], 'images' => $imageName]);
        return redirect('/heroes')->with('success', 'Hero created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $hero = Hero::find($id);
        return view('heroes.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'position' => 'required|numeric|max:20',
                'image' => 'image|mimes:jpeg,png,jpg'
            ]
        );
        $hero = Hero::find($id);
        $hero->position = $request->position;
        $imageName = $this->updateImage('images/heroes/', $hero->image, $request->file('image'));
        $hero->update(['images' => $imageName]);
        return redirect('/heroes')->with('success', 'Hero updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);

        $table = Hero::find($id);
        if ($table != null) {
            $imageName = $this->destroyImage('images/heroes/', $table->images);
            $table->delete(['images' => $imageName]);
            return redirect()->back()->with('success', 'Hero deleted successfully!!');
        }
        return redirect()->back();
    }

    public function updatePosition(Request $request)
    {
        foreach ($request->positions as $index => $id) {

            Hero::find($id)->update(['position' => $index + 1]);
        }
        return redirect()->back()->with('success', 'Position updated successfully!!');
    }
}
