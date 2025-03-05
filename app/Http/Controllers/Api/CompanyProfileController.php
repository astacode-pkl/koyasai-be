<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyProfile = CompanyProfile::all();
        if ($companyProfile->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ]);
        } try {
            $companyProfile = $companyProfile->map(function ($profile) {
                $profile->logo = url('https://guiding-gentle-yak.ngrok-free.app/images/companyprofile/' . $profile->logo);
                $profile->logo_type = url('https://guiding-gentle-yak.ngrok-free.app/images/companyprofile/' . $profile->logo_type);
                $profile->logo_mark = url('https://guiding-gentle-yak.ngrok-free.app/images/companyprofile/' . $profile->logo_mark);
                return $profile;
            });
            return response()->json([
                'status' => 200,
                'companyprofile' => $companyProfile,
            ]);    
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Server Error',
                'details' => $e->getMessage()
            ]);
        }

        
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
