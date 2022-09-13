<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('/user/choose',[
        ]);
    }

    public function fg(){
        return view('user/checkin',[

            'Processes' => Process::where('gudang_id', 'FG')->get() 
        ]);
    }
    public function rm(){
        return view('user/checkin',[

            'Processes' => Process::where('gudang_id', 'RM')->get() 
        ]);
    }
    public function pm(){
        return view('user/checkin',[

            'Processes' => Process::where('gudang_id', 'PM')->get() 
        ]);
    }

    public function checkin(Request $request){
        
        DB::table('on_goings')->insert([
            'NIK' =>  Auth::user()->NIK,
            'process_id' => $request->proses,
            'gudang_id' => $request->gudang_id,
            'total_time' => fake()->time()
        ]);

        return view('/user/checkout',[
            'proses' => $request->proses
        ]);    
    }
}
