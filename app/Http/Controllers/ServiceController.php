<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::select(['id', 'icon', 'title', 'description'])->latest()->get();
        return view('services.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => ['required', function ($attribute, $value, $fail) {
                libxml_use_internal_errors(true); // Hindari error PHP jika XML tidak valid
                $xml = simplexml_load_string($value);
                if ($xml === false || $xml->getName() !== 'svg') {
                    $fail('The ' . $attribute . ' must be a valid SVG XML.');
                }
            }]
        ]);
        $table = new Service;
        $table->title = $request->title;
        $table->icon = $request->icon;
        $table->description = $request->description;
        $table->save();
        return redirect('/services')->with('success', 'Service created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);
        $service = Service::select(['id', 'icon', 'title', 'description'])->find($id);
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => ['required', function ($attribute, $value, $fail) {
                libxml_use_internal_errors(true); // Hindari error PHP jika XML tidak valid
                $xml = simplexml_load_string($value);
                if ($xml === false || $xml->getName() !== 'svg') {
                    $fail('The ' . $attribute . ' must be a valid SVG XML.');
                }
            }]
        ]);
        $id = Crypt::decryptString($id);
        $table = Service::find($id);
        $table->title = $request->title;
        $table->icon = $request->icon;
        $table->description = $request->description;
        $table->update();
        return redirect('/services')->with('success', 'Service updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $table = Service::find($id);
        $table->delete();
        return redirect('/services')->with('success', 'Service deleted successfully!!');
    }
}
