<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use App\Models\OnGoing;
use App\Models\Process;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller

{
    public function __construct(){
        date_default_timezone_set("Asia/Jakarta");
    }

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
        

        OnGoing::UpdateOrCreate([
            'NIK' => Auth::user()->NIK],[
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'time_end' => '00:00:00',
            'active'=> 1,
            'keterangan'=>$request->details
        ]);        
        
        // $dataOnGoing = $request->all();

        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'details' => $request->details
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

        date_default_timezone_set("Asia/Jakarta");

        $time_start_raw = $request->time_start;
        $time_start = strtotime($time_start_raw);
        $time_end = strtotime($request->time_end);
    
        $total_time = ($time_end - $time_start);
        $qty = $request->qty;
        $std = 
    
        $performance = $qty / $total_time;
        // @if
    
        // @endif
    
        
        DB::table('on_goings')
            ->where('time_start',$time_start_raw)
            ->update([
                'process_id'=>'Idle',
                'time_end'=>$request->time_end,
                'active'=>0,
                'keterangan'=>''
            ]);
        
        Report::Create([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'reports_time' => date('Y-m-d H:i:s'),
            'performance' => $performance,
            'keterangan' => $request->details
        ]);


        // return view('/user/checkin');
        return redirect('/user');

        // $time_start_raw = $request->time_start;
        // $time_start = strtotime($request->time_start);
        // $time_end = strtotime($request->time_end);
        // $hold_start = strtotime($request->hold_start);
        // $hold_end = strtotime($request->hold_end);
    
        // $total_time = ($time_end - $time_start) - ($hold_start - $hold_end);
        // $qty = $request->qty;
    
        // $performance = $qty / $total_time;

        // DB::table('on_goings')
        // ->where('time_start',$time_start_raw)
        // ->update([
        //     'time_end'=>$request->time_end,
        //     'active'=>0
        // ]);

        // DB::table('reports')->insert([
        //     'NIK' => Auth::user()->NIK,
        //     'process_id' => $request->process_id,
        //     'gudang_id' => $request->gudang_id,
        //     'performance' => $performance
        // ]);
    }

    public function hold(Request $request){

        return view('/user/hold',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'details' => $request->details,

        ]); 
    }

    public function holdStart(Request $request){

        $time_start_raw = $request->time_start;

        DB::table('on_goings')
            ->where('NIK',Auth::user()->NIK)
            ->update([
                'process_id'=>'Hold',
                'keterangan' => $request->keterangan
            ]);

        return view('/user/hold_finish',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'hold_start' => $request->hold_start,
            'details' => $request->details,
            'keterangan' => $request->keterangan
        ]);

    }
    
    public function holdFinish(Request $request){

          
        // $dataOnGoing = $request->all();

        DB::table('on_goings')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'process_id'=>$request->process_id,
            'keterangan' => $request->details.' Hold ('.$request->keterangan.')'
        ]);

        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'details' => $request->details,
            'hold_start' => $request->hold_start,
            'hold_end' => $request->hold_end,
        ]);

    }

}
