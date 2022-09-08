<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('/auth/login');
    }

    public function authenticate(Request $request){
        $validated_request = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        if (Auth::attempt($validated_request)) {
            return('Login Berhasil');
            // $request->session()->regenerate();
            
            // return redirect()->intended('dashboard');
        }
        
    }
}
