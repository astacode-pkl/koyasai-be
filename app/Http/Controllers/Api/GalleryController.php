<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();
        if ($gallery->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ]);
        } try {
            $gallery = $gallery->map(function ($image) {
                $image->logo = url('images/gallery/' . $image->logo);
                return $image;
            });
            return response()->json([
                'status' => 200,
                'gallery' => $gallery
            ]);
        }catch (\Exception $e) {
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
