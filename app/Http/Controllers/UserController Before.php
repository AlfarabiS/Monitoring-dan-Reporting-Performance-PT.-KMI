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
use App\Models\SessionTable;
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
        
       
        $last_activity = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (!empty($last_activity)) {
             if ($last_activity->hold_status==1) {
                Session::put('hold',[
                    'detail_hold' => $last_activity->keterangan,
                    'hold_start' => $last_activity->hold_start,
                ]);  
                Session::put('hold_end',[
                    'hold_end' => $last_activity->hold_end,
                ]);         
                Session::put('process',[
                    'process_id'=>$last_activity->process_id,
                    'gudang_id' => $last_activity->gudang_id,
                    'time_start' => $last_activity->time_start,
                    'detail_proses' => $last_activity->keterangan,
                    'hold_start' => '00:00:00',
                    'hold_end' => '00:00:00',
                ]);
            }
           
            Session::put('process',[
                'process_id'=>$last_activity->process_id,
                'gudang_id' => $last_activity->gudang_id,
                'time_start' => $last_activity->time_start,
                'detail_proses' => $last_activity->keterangan,
                'hold_start' => '00:00:00',
                'hold_end' => '00:00:00',
            ]);
            
        }
        // dd(Session::get('user'));
        
        if (Session::has('process')) {
            if (Session::has('hold')) { 
                return redirect('/user/hold/running');
            }
            return redirect('/user/checkout');
          }
        return view('/user/choose',[
            'ActiveUser' => Auth::user()->name
        ]);
    }

    public function fg(){
        if (Auth::user()->gudang_id=='FG') {
            if (Session::has('process')) {
                if (Session::has('hold')) {
                    return redirect('/user/hold/running');
                }
                return redirect('/user/checkout');
              }
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
            if (Session::has('process')) {
                if (Session::has('hold')) {
                    return redirect('/user/hold/running');
                }
                return redirect('/user/checkout');
              }
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
            if (Session::has('process')) {
                if (Session::has('hold')) {
                    return redirect('/user/hold/running');
                }
                return redirect('/user/checkout');
              }
            # code...
            return view('user/checkin',[
                'ActiveUser' => Auth::user()->name, 
                'Processes' => Process::where('gudang_id', 'PM')->get() 
            ]);
        }
        return back();
    }

    public function checkin(Request $request){
        
        Session::put('process',[
            'process_id'=>$request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'detail_proses' => $request->detail_proses,
            'hold_start' => '00:00:00',
            'hold_end' => '00:00:00',
        ]);

        SessionTable::create([
            'NIK' => Auth::user()->NIK,
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'keterangan' => $request->detail_proses,
            'time_end' => '00:00:00',
            'hold_start' => '00:00:00',
            'hold_end' => '00:00:00',
            'hold_status' => 0
            ]);

        OnGoing::UpdateOrCreate([
            'NIK' => Auth::user()->NIK],[
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'time_end' => '00:00:00',
            'active'=> 1,
            'keterangan'=>$request->detail_proses
        ]);        

        // dd(Session::all());
        return redirect('/user/checkout');
        

    }

    public function checkoutIndex(){

        if (session::has('process')) {
            return view('/user/checkout',[
                'ActiveUser' => Auth::user()->name,
                'NIK' => Auth::user()->NIK,
            ]);
        }
        return back();

    }
    


    public function checkout(Request $request){

        // Session::forget('hold');
        // Session::forget('hold_end');
        
        // Standar untuk perbandingan
        $check_session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (empty($check_session)) {
            echo "<script>
			alert('Sesi telah Berakhir');
		  </script>";
            return redirect('/user/forget');
        }
        
        $std = Standard::where('process_id',Session::get('process')['process_id'])->select('qty','time')->first();
        $std_qty = $std->qty;
        $std_time = (strtotime($std->time) - strtotime('00:00:00'));

        //time dari input
        $time_start_raw = Session::get('process')['time_start'];
        $time_end_raw = date("h:i:s");
        $time_start = strtotime($time_start_raw);
        $time_end = strtotime($time_end_raw);

        //waktu hold
        if  (Session::has('hold')) {
            $hold_start_raw = Session::get('hold')['hold_start'];
            $hold_end_raw = Session::get('hold_end');
            // dd($hold_end_raw);
        }else {
            $hold_start_raw = Session::get('process')['hold_start'];
            $hold_end_raw = Session::get('process')['hold_end'];
        }
        $hold_start = strtotime($hold_start_raw);
        $hold_end = strtotime($hold_end_raw);
        $hold_time = ($hold_end - $hold_start);
        $hold_time_report = new DateTime("@$hold_time");
    
        //Pekerjaan User
        $total_time = ($time_end - $time_start) - $hold_time;
        $qty = $request->qty;
        $worktime = new DateTime("@$total_time");

        // Rumus Performance
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
            'process_id'=> Session::get('process')['process_id'],
            'gudang_id' => Session::get('process')['gudang_id'],
            'reports_time' => date('Y-m-d H:i:s'),
            'qty' => $qty,
            'work_time' => $worktime->format('H:i:s'),
            'hold_time' =>$hold_time_report->format('H:i:s'),
            'performance' => $performance,
            'keterangan' => Session::get('process')['detail_proses'],
            'hold_count' => 0
        ]);

        // Session::forget('process');
        return redirect('/user/forget');
        // return view('/user/checkin');

       
    }

    public function hold(){

        // dd(Session::get('process_id'));
        
        return view('/user/hold',[
            'ActiveUser' => Auth::user()->name,
            // 'NIK' => Auth::user()->NIK,
            // 'process_id' => $request->process_id,
            // 'gudang_id' => $request->gudang_id,
            // 'time_start' => $request->time_start,
            // 'details' => $request->details,
        ]); 
    }

    public function holdStart(Request $request){

        Session::put('hold',[
            'hold_start' => date("h:i:s"),
            'detail_hold' => $request->detail_hold,
        ]);

        DB::table('session_tables')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'hold_start' => date("h:i:s"),
            'keterangan' => Session::get('process')['detail_proses'].' Hold ('.$request->detail_hold.')',
            'hold_status' => 1
        ]);

        DB::table('on_goings')
            ->where('NIK',Auth::user()->NIK)
            ->update([
                'process_id'=>'Hold',
                'keterangan' => 'Hold ('.$request->detail_hold.')'
            ]);
    
        return redirect('/user/hold/running');
    }

    public function holdRunning(){
        if (Session::has('hold')) {
            # code...
            return view('/user/hold_finish',[
                'ActiveUser' => Auth::user()->name,
                // 'NIK' => Auth::user()->NIK,
                // 'process_id' => $request->process_id,
                // 'gudang_id' => $request->gudang_id,
                // 'time_start' => $request->time_start,
                // 'hold_start' => date("h:i:s"),
                // 'details' => $request->details,
                // 'keterangan' => $request->keterangan
            ]);
        }
        return back();
    }
    
    public function holdFinish(Request $request){
        
        Session::put('hold_end',date("h:i:s"));

        DB::table('session_tables')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'hold_status' => 0,
            'hold_end' => date("h:i:s"),
        ]);
          
        DB::table('on_goings')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'process_id' =>Session::get('process')['process_id'],
            'keterangan' => Session::get('process')['detail_proses'].' HOLD ( '. Session::get('hold')['detail_hold']. ' )'
        ]);

        return redirect('/user/checkout');

        // return view('/user/checkout',[
        //     'ActiveUser' => Auth::user()->name,
        //     'NIK' => Auth::user()->NIK,
        //     'process_id' => $request->process_id,
        //     'gudang_id' => $request->gudang_id,
        //     'time_start' => $request->time_start,
        //     'details' => $request->details,
        //     'hold_start' => $request->hold_start,
        //     'hold_end' => date("h:i:s"),
        // ]);
    }

    public function account(Request $request){
        $identity = User::where('NIK','=',Auth::user()->NIK)->first();

        return view('/user/account',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit User',
            'Name'=>$identity->name,
            'Email'=>$identity->email,
            'NIK'=>$identity->NIK,
            'Gudang'=>$identity->gudang_id,
            'Password'=>$identity->password
        ]);
    }

    public function accountPost(Request $request){

        // dd($request);       

        User::where('NIK',$request->NIK)
            ->Update([
                'NIK'=>$request->NIK,
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
        ]);
        
        return redirect('/user');

    }

    public function forget(){
        Session::forget('process', 'hold', 'hold_end');
        DB::table('session_tables')->where('NIK',Auth::user()->NIK)->delete();
        return redirect('/user');

    }

}
