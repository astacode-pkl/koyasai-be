<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Laravolt\Avatar\Avatar;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::all();
        if ($contact->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ]);
        } try {
            return response()->json([
                'status' => 200,
                'contact' => $contact,
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
        
        // Validasi request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);
    
        // Jika validasi gagal, kembalikan response 422
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            // Simpan data ke database
            $contact = Contact::create($request->only(['name', 'email', 'subject', 'message']));

            //laravolt avatar
            $created_at = now()->format('YmdHis'); 
            $fileName = $created_at . '.png'; 
                    
            $avatar = new Avatar();
            $avatar->create(strtoupper($contact->name)) 
                   ->save(public_path('images/contact/') . $fileName, 100); 
                    
            $contact->avatar = $fileName;
            $contact->save();

        
            // Jika berhasil, kembalikan response 201 Created
            return response()->json([
                'status' => 201,
                'message' => 'Message has been sent successfully',
                'contact' => $contact
            ], 201);
        } catch (Exception $e) {
            // Jika ada error di server, kembalikan response 500
            return response()->json([
                'status' => 500,
                'error' => 'Server Error',
                'details' => $e->getMessage() // Bisa dihapus untuk produksi
            ], 500);
        }
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
