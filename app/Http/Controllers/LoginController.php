<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
    }
    
    public function index(){
        return view('/auth/login',[
            'judul'=>'Warehouse | KAMI'
        ]);
    }

    public function authenticate(Request $request){
        $validated_request = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        if (Auth::attempt($validated_request)) {
            // return('Login Berhasil');
            $request->session()->regenerate();
            
             return redirect()->intended('dashboard');
        }
        return back();        
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
