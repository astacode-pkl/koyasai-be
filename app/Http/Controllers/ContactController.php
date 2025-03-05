<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\LogHistory;
use Illuminate\Support\Facades\Crypt;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all()->sortByDesc('created_at')->sortByDesc('status');
        return view(
            'contact',
            [
                'contacts' => $contacts
            ]
        );
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
    $id = Crypt::decryptString($id);

    // Cari pesan berdasarkan ID dan update statusnya jadi "read"
    $contactById = Contact::findOrFail($id);
    $contactById->update(['status' => 'read']);

    // Ambil semua pesan, diurutkan berdasarkan status & created_at
    $contacts = Contact::orderByDesc('status')
        ->orderByDesc('created_at')
        ->get();

    // Hitung jumlah pesan yang masih "unread"
    $countUnread = Contact::where('status', 'unread')->count();
    session(['countUnread' => $countUnread]);

    return view('contact', compact('contactById', 'contacts'));
}


    /**
     * Display the searche resource.
     */
    public function search(Request $request)
    {
        $keyword = $request->search;
        $contacts = Contact::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('phone_number', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('message', 'like', '%' . $keyword . '%')
            ->get();
        $contacts = $contacts->sortByDesc('created_at')->sortByDesc('status');
        return view('contact', ['contacts' => $contacts]);
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
        $table = Contact::find($id);
        $table->status = 'read';
        $table->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);
        $table = Contact::find($id);
        $oldData = Contact::where('id',$id)->get();
        $table->delete();

        //avatar deleted logic
        $path = public_path('storage/'.$table->avatar);
        if (file_exists($path)) {
            unlink($path);
        }
        
        
        return redirect('inbox')->with('success', 'Data deleted successfully!!');
    }
}
