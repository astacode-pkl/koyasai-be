<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::all();
        if ($hero->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ]);
        } try {
            return response()->json([
                'status' => 200,
                'hero' => $hero
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
