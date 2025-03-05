<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('clients.client',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $this->uploadImage('images/client/',$request->file('image'));
        Client::create(['image' => $image]);
        return redirect('/clients')->with('success','Client created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $clients = Client::find($id);
        return view('clients.edit',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $table = Client::find($client->id);
        $image = $this->updateImage('images/client/',$table->image,$request->file('image'));
        $table->update(['image' => $image]);
        return redirect('/clients')->with('success','Client created successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $id = Crypt::decryptString($id);
        $client = Client::find($id);
        $this->destroyImage('images/clients/',$client->image);
        $client->delete();
        return redirect('/clients')->with('success','Client deleted successfully!!');
    }
}
