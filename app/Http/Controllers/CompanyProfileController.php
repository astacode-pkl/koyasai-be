<?php

namespace App\Http\Controllers;

use App\Models\LogHistory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyprofile = CompanyProfile::first()->get();
        $companyprofile = $companyprofile[0];
        return view('companyprofile', compact('companyprofile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'logo' => 'image|mimes:jpeg,png,jpg',
                'logo_type' => 'image|mimes:jpeg,png,jpg',
                'logo_mark' => 'image|mimes:jpeg,png,jpg',
                'advertisement' => 'image|mimes:jpeg,png,jpg',
            ]
        );
        $id = Crypt::decryptString($id);
        $table = CompanyProfile::find($id);
        $table->name = $request->name;
        $table->phone = $request->phone;
        $table->email = $request->email;
        $table->youtube = $request->youtube;
        $table->facebook = $request->facebook;
        $table->instagram = $request->instagram;
        $table->whatsapp = $request->whatsapp;
        $table->history = $request->history;
        $table->simple_history = $request->simple_history;
        $table->address = $request->address;

        function get_string_between($string, $start, $end)
        {
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }
        if(Str::contains($request->map, 'src="')){
            $table->map = get_string_between( $request->map, 'src="', '"');
        }else{
            $table->map = $request->map;
        }
        $logoType = $table->logo_type;
        $logoMark = $table->logo_mark;
        if ($request->file('logo_type') !== null){

            $logoType = $this->updateImage('images/companyprofile/',$table->logo_type,$request->file('logo_type'));
        }
        if ($request->file('logo_mark') !== null) {
            # code...
            $logoMark = $this->updateImage('images/companyprofile/',$table->logo_mark,$request->file('logo_mark'));
        }
        
        $table->update(['logo_type' => $logoType,'logo_mark' => $logoMark]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
