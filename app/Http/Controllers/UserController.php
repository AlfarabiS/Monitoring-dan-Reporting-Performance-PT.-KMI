<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use App\Models\OnGoing;
use App\Models\Process;
use App\Models\Standard;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        
        Session::put('process_id',$request->process_id);

        OnGoing::UpdateOrCreate([
            'NIK' => Auth::user()->NIK],[
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'time_end' => '00:00:00',
            'active'=> 1,
            'keterangan'=>$request->details
        ]);        
        
        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'details' => $request->details,
            'hold_start' => '00:00:00',
            'hold_end' => '00:00:00',
        ]);
    }
    
    public function checkoutIndex(){

        // dd($test);
        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            // 'process_id' => '5',
            // 'gudang_id' => Auth::user()->gudang_id,
            // 'test' => $test->process_id,
            // 'Processes' => Process::where('process_id','$request->process_id')->get()
        ]);
        
    }

    public function checkout(Request $request){

        Session::forget('process_id');
        // Standar untuk perbandingan 
        $std = Standard::where('process_id',$request->process_id)->select('qty','time')->first();
        $std_qty = $std->qty;
        $std_time = (strtotime($std->time) - strtotime('00:00:00'));

        $time_start_raw = $request->time_start;
        $time_end_raw = date("h:i:s");
        $time_start = strtotime($time_start_raw);
        $time_end = strtotime($time_end_raw);

        $hold_start = strtotime($request->hold_start);
        $hold_end = strtotime($request->hold_end);
        $hold_time = ($hold_end - $hold_start);
    
        $total_time = ($time_end - $time_start) - $hold_time;
        $qty = $request->qty;
        $dt = new DateTime("@$total_time");

        // dd($dt->format('H:i:s'));
         
        

            $performance = ($qty / $total_time) / ($std_qty / $std_time) * 100;

            
        OnGoing::where('NIK', Auth::user()->NIK,)
            ->update([
                'process_id'=>'Idle',
                'time_end'=>date("h:i:s"),
                'active'=>0,
                'keterangan'=>''
            ]);
        
        
        Report::Create([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'reports_time' => date('Y-m-d H:i:s'),
            'performance' => $performance,
            'keterangan' => $request->details,
            'qty' => $qty,
            'work_time' => $dt->format('H:i:s')
        ]);


        return redirect('/user');
        // return view('/user/checkin');

       
    }

    public function hold(Request $request){

        // dd(Session::get('process_id'));

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


        DB::table('on_goings')
            ->where('NIK',Auth::user()->NIK)
            ->update([
                'process_id'=>'Hold',
                'keterangan' => 'Hold ('.$request->keterangan.')'
            ]);

        return view('/user/hold_finish',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'hold_start' => date("h:i:s"),
            'details' => $request->details,
            'keterangan' => $request->keterangan
        ]);
    }
    
    public function holdFinish(Request $request){

          
        DB::table('on_goings')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'process_id'=>$request->process_id,
            'keterangan' => $request->details.' HOLD ( '. $request->keterangan. ' )'
        ]);

        return view('/user/checkout',[
            'ActiveUser' => Auth::user()->name,
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => $request->time_start,
            'details' => $request->details,
            'hold_start' => $request->hold_start,
            'hold_end' => date("h:i:s"),
        ]);
    }
}
