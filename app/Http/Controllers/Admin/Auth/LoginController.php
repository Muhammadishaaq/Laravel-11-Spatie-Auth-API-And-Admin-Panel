<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('admin.dashboard')->with('success', 'Already LoggedIn');
        }
       return view('admin.layouts.login');
    }

    

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Invalid login credentials.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginPage')->with('success','Logout successfully');
    }
}
