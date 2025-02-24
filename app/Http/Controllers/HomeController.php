<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index(){
        dd(Activity::all());
        return view('home');
    }
}
