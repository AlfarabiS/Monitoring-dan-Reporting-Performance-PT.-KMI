<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use App\Models\Warehouse;
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
        
        
        
        // $dataOnGoing = $request->all();

        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            // 'test' => $test->process_id,
            // 'Processes' => Process::where('process_id','$request->process_id')->get()
        ]);
    }
    
    public function checkoutIndex(){

        // dd($test);
        return view('/user/checkout',[
            // 'ActiveUser' => Auth::user()->name,
            // 'process_id' => '5',
            // 'gudang_id' => Auth::user()->gudang_id,
            // 'test' => $test->process_id,
            // 'Processes' => Process::where('process_id','$request->process_id')->get()
        ]);
        
    }

    public function checkout(Request $request){
        
        // dd($request);
        
        DB::table('on_goings')->insert([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
        ]);
                    
        
        $time_start = strtotime($request->time_start);
        $time_end = strtotime($request->time_end);

        $total_time = ($time_end - $time_start);
        $qty = $request->qty;

        $performance = $qty / $total_time;

        // dd($total_time);
        // dd($performance);
        
        DB::table('reports')->insert([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'performance' => $performance
        ]);


        // return view('/user/checkin');
        return redirect('/user');
    }



}
