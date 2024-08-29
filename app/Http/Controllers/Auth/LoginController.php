<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Handles user login
    function login(Request $request)
    {
        //* VALIDATE REQUEST DATA

        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        //* CHECK FOR AUTH USER
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    // Handles user logout
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
