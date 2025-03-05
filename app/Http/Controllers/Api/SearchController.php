<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function search(Request $request) {
        $search = $request->input('q');
        $catalogs = Catalog::where('name', 'LIKE', "%{$search}%")->get();
        if ($catalogs->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ]);
        } try {
            return response()->json([
                'status' => 200,
                'result' => $catalogs,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Server Error',
                'details' => $e->getMessage()
            ]);
        }
    }
}
