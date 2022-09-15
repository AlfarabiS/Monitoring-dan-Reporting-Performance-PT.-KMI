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
            'ActiveUser' => Auth::user()->name
        ]);
    }

    public function fg(){
        if (Auth::user()->gudang_id=='FG') {
            # code...
            return view('user/checkin',[

            'ActiveUser' => Auth::user()->name,
            'Processes' => Process::where('gudang_id', 'FG')->get() 
            
        ]);
        }

        return back();
    }
    public function rm(){
        if (Auth::user()->gudang_id=='RM') {
            # code...
            return view('user/checkin',[
                'ActiveUser' => Auth::user()->name,    
                'Processes' => Process::where('gudang_id', 'RM')->get() 
            ]);
        }
        return back();
    }
    public function pm(){
        if (Auth::user()->gudang_id=='PM') {
            # code...
            return view('user/checkin',[
                'ActiveUser' => Auth::user()->name, 
                'Processes' => Process::where('gudang_id', 'PM')->get() 
            ]);
        }
        return back();
    }

    public function checkin(Request $request){
        
        DB::table('on_goings')->insert([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'total_time' => $request->time_start,
        ]);
        
        $dataOnGoing = $request->all();

        return redirect('/user/checkout')->with('data',$dataOnGoing);
    }

    public function checkout(Request $request){
        
        // $qty = $request->qty;
        // $time = strtotime($request->time);
        $performance = 4;
        
        DB::table('reports')->insert([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'performance' => $performance
        ]);


        return redirect('checkout', $request);
    }

    public function checkoutIndex(){

        // dd($test);
        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            // 'test' => $test->process_id,
            // 'Processes' => Process::where('process_id','$request->process_id')->get()
        ]);
        
    }

}
