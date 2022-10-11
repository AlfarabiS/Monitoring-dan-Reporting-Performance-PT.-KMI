<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use App\Models\Satuan;
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
        
       
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (!empty($session)) {
             if ($session->hold_status==1) {
                return redirect('/user/hold/running');
            }
            return redirect('/user/checkout');
        }

        return view('/user/choose',[
            'ActiveUser' => Auth::user()->name
        ]);
    }

    public function fg(){
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (Auth::user()->gudang_id=='FG') {
            if (!empty($session)) {
                if ($session->hold_status==1) {
                    return redirect('/user/hold/running');
                }
                return redirect('/user/checkout');
              }
            # code...
            return view('user/checkin',[

            'ActiveUser' => Auth::user()->name,
            'Processes' => Process::where('gudang_id', 'FG')->orwhere('process_id','LL')->get() 
            
        ]);
        }
        return back();
    }
    public function rm(){
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (Auth::user()->gudang_id=='RM') {
            if (!empty($session)) {
                if ($session->hold_status==1) {
                    return redirect('/user/hold/running');
                }
                return redirect('/user/checkout');
              }
            # code...
            return view('user/checkin',[
                'ActiveUser' => Auth::user()->name,    
                'Processes' => Process::where('gudang_id', 'RM')->orwhere('process_id','LL')->get() 
            ]);
        }
        return back();
    }
    public function pm(){
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (Auth::user()->gudang_id=='PM') {
            if (!empty($session)) {
                if ($session->hold_status==1) {
                    return redirect('/user/hold/running');
                }
                return redirect('/user/checkout');
              }
            # code...
            return view('user/checkin',[
                'ActiveUser' => Auth::user()->name, 
                'Processes' => Process::where('gudang_id', 'PM')->orwhere('process_id','LL')->get() 
            ]);
        }
        return back();
    }

    public function checkin(Request $request){
        
        SessionTable::UpdateOrCreate([
            'NIK' => Auth::user()->NIK],[
            'process_id' => $request->process_id,
            'gudang_id' => $request->gudang_id,
            'time_start' => date("h:i:s"),
            'keterangan' => $request->detail_proses,
            'time_end' => null,
            'hold_start' => null,
            'hold_end' => null,
            'hold_time' => null,
            'hold_status' => 0,
            'hold_count' => 0
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

        return redirect('/user/checkout');

    }

    public function checkoutIndex(){

        $session = SessionTable::join('processes','session_tables.process_id','=','processes.process_id')
            ->where('NIK', Auth::user()->NIK)->first();
        $standard = Standard::where('process_id',$session->process_id)->first();
        $satuan = Satuan::get();

        if (!empty($session->process_id)) {
            if ($session->hold_status==1) {
                return redirect('/user/hold/running');
            }
            return view('/user/checkout',[
                'ActiveUser' => Auth::user()->name,
                'NIK' => Auth::user()->NIK,
            ])->with('Standard',$standard)->with('Satuan',$satuan)->with('Session',$session);
        }
        return redirect('/user');

    }
    
    public function invalidIndex(Request $request){

        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (!empty($session->process_id)) {
            if ($session->hold_status==1) {
                return redirect('/user/hold/running');
            }
            return view('/user/invalid',[
                'ActiveUser' => Auth::user()->name,
                'Satuan' => $request->satuan
            ]);
        }
        return redirect('/user');
    }

    public function invalid(Request $request){
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();
        
        OnGoing::where('NIK', Auth::user()->NIK,)
        ->update([
            'process_id'=>'Idle',
            'time_end'=>date("h:i:s"),
            'active'=>0,
            'keterangan'=>''
        ]);
        
        Report::Create([
            'NIK' => Auth::user()->NIK,
            'process_id'=> $session->process_id,
            'gudang_id' => $session->gudang_id,
            'reports_time' => date('Y-m-d h:i:s'),
            'qty' => 0,
            'satuan' => $request->satuan,
            'work_time' => '00:00:00',
            'hold_time' => '00:00:00',
            'performance' => 0,
            'keterangan' => 'Invalid ( '.$request->detail_invalid.' )',
            'hold_count' => 0
        ]);

        return redirect('/user/forget');
    }

    public function checkout(Request $request){


        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if (empty($session)) {
            // echo "<script>";
            // echo "alert('hello');";
            // echo "</script>";
            $message = 'Sesi Telah Berakhir';
            return redirect('/user')->with('alert', 'Sesi Telah Berakhir');
        }
        
        //time dari input
        $time_start_raw = $session->time_start;
        $time_end_raw = date("h:i:s");
        $time_start = strtotime($time_start_raw);
        $time_end = strtotime($time_end_raw);

        //waktu hold
        if  ($session->holdtime!=null) {
            $hold_time = strtotime($session->holdtime) - strtotime('00:00:00');
            $hold_time_report = $session->holdtime;
        }else {
            $hold_start_raw = '00:00:00';
            $hold_end_raw = '00:00:00';
            $hold_start = strtotime($hold_start_raw);
            $hold_end = strtotime($hold_end_raw);
            $hold_time = ($hold_end - $hold_start);
            $hold_time_raw = new DateTime("@$hold_time");
            $hold_time_report = @$hold_time_raw->format('H:i:s');
        }
    
        //Pekerjaan User
        $total_time = (($time_end - $time_start) - $hold_time)/60;
        $total_time_report = ($time_end - $time_start) - $hold_time;
        $qty = $request->qty;
        $worktime = new DateTime("@$total_time_report");

        //standar pekerjaan
        $std = Standard::where('process_id',$session->process_id)->select('qty','time')->first();
        if (!is_null($std)) {
            $std_qty = $std->qty;
            $std_time = $std->time;
        }else{
            $std_qty = $request->qty;
            $std_time = $total_time;
        }

        // Rumus Performance
        $performance = ($qty / $total_time) / ($std_qty / $std_time) * 100;
        // dd($qty,$performance,$total_time,$std_time);
        
        OnGoing::where('NIK', Auth::user()->NIK,)
            ->update([
                'process_id'=>'Idle',
                'time_end'=>date("h:i:s"),
                'active'=>0,
                'keterangan'=>''
            ]);
        
        
        Report::Create([
            'NIK' => Auth::user()->NIK,
            'process_id'=> $session->process_id,
            'gudang_id' => $session->gudang_id,
            'reports_time' => date('Y-m-d h:i:s'),
            'qty' => $qty,
            'satuan' => $request->satuan,
            'work_time' => $worktime->format('H:i:s'),
            'hold_time' =>$hold_time_report,
            'performance' => $performance,
            'keterangan' => $session->keterangan,
            'hold_count' => $session->hold_count
        ]);

        return redirect('/user/forget');

    }

    public function hold(){

        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if ($session->hold_status==1) {
            return back();
        }
        
        return view('/user/hold',[
            'ActiveUser' => Auth::user()->name,
        ]); 
    }

    public function holdStart(Request $request){
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        DB::table('session_tables')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'hold_start' => date("h:i:s"),
            'keterangan' => $session->keterangan.', Hold ('.$request->detail_hold.')',
            'hold_status' => 1,
            'hold_count' => $session->hold_count + 1
        ]);

        DB::table('on_goings')
            ->where('NIK',Auth::user()->NIK)
            ->update([
                'process_id'=>'Hold',
                'keterangan' => $session->keterangan.', Hold ('.$request->detail_hold.')'
            ]);
    
        return redirect('/user/hold/running');
    }

    public function holdRunning(){
        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();

        if ($session->hold_status==1) {
            # code...
            return view('/user/hold_finish',[
                'ActiveUser' => Auth::user()->name,
            ]);
        }
        return back();
    }
    
    public function holdFinish(Request $request){

        $session = SessionTable::where('NIK', Auth::user()->NIK)->first();
        if(!empty($session)){
            if($session->hold_status==0){
                return redirect('/user');
            }
        }

        $hold_start_raw = $session->hold_start;
        $hold_end_raw = date("h:i:s");
        $hold_start = strtotime($hold_start_raw);
        $hold_end = strtotime($hold_end_raw);
        $hold_time_baru = ($hold_end - $hold_start);

        if ($session->holdtime==null) {
            $hold_time = new DateTime("@$hold_time_baru");
        }else{
            $hold_time_asal = strtotime($session->holdtime) - strtotime('00:00:00');
            $hold_time_raw = $hold_time_asal + $hold_time_baru;
            $hold_time = new DateTime("@$hold_time_raw");
        }
        // dd($hold_time_baru , $hold_time_asal);
        DB::table('session_tables')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'hold_status' => 0,
            'hold_end' => date("h:i:s"),
            'holdtime' => $hold_time->format('H:i:s')
        ]);
          
        DB::table('on_goings')
        ->where('NIK',Auth::user()->NIK)
        ->update([
            'process_id' =>$session->process_id,
        ]);

        return redirect('/user/checkout');

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
        DB::table('session_tables')->where('NIK',Auth::user()->NIK)->delete();
        return redirect('/user');

    }

}
