<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Contracts\Activity;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {


        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            activity()->event('login')->createdAt(now())->tap(function (Activity $activity) {
                $activity->causer_name = Auth::user()->name;
            })->log(auth()->user()->name . ' has logged in.');
            return redirect()->intended('/');
        }
        return back()->with('error', 'Email or Password is wrong!!!');
    }
    public function logout()
    {
        activity()
            ->event('logout')
            ->createdAt(now())
            ->tap(function (Activity $activity) {
                $activity->causer_name = Auth::user()->name;
            })
            ->log(auth()->user()->name . ' has logged out.');
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
