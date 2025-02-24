<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LogHistory;
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
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            activity()
                ->event('login')
                ->createdAt(now())
                ->tap(function(Activity $activity){
                    $activity->causer_name = Auth::user()->name;
                })
                ->log('The user has logged in.');
            return redirect()->intended('/');
        }
        return back()->with('error', 'Log in is failed');
    }
    public function logout()
    {
        activity()
            ->event('logout')
            ->createdAt(now())
            ->tap(function (Activity $activity) {
                $activity->causer_name = Auth::user()->name;
            })
            ->log('The user has logged out.');
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
