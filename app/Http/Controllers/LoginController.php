<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OnGoing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'NIK'=>['required'],
            'password'=>['required']
        ]);

        if (Auth::attempt($validated_request)) {
            User::where('NIK',$request->NIK)->update([
                'logged_in' => 1
            ]);
            $request->session()->regenerate();
            
             return redirect()->intended('dashboard');
        }

        // Auth::logoutOtherDevices();

        return back();        
    }

    // protected function authenticated(Request $request, $user) 
    // {   
    // Auth::logoutOtherDevices($request('password'));

    // return redirect()->intended();
    // }

    public function logout(Request $request){
        User::where('NIK',Auth::user()->NIK)->update([
            'logged_in' => 0
        ]);
        
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
