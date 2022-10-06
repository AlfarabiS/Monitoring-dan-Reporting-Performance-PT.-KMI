<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Satuan;
use App\Models\Process;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    
    public function index(){
        return view('/superadmin/index',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Selamat Datang',
        ]);
    }
   
    // Administrasi User
    public function user(){
        return view('/superadmin/user',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman User',
            'Users'=> User::Sortable()->get(),
        ]);
    }

    public function addUser(){
        return view('/superadmin/crud_user',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Tambah User',
            'Name'=>'',
            'Email'=>'',
            'NIK'=>'',
            'Gudang'=>'',
            'Password'=>''
        ]);
    }

    
    
    public function editUser(Request $request){
        
        $identity = User::find($request->id_user);
        // $identity = $identity_raw->toArray();

        // dd($identity_raw);
        return view('/superadmin/crud_user',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit User',
            'Name'=>$identity->name,
            'Email'=>$identity->email,
            'NIK'=>$identity->NIK,
            'Gudang'=>$identity->gudang_id,
        ]);
    }

    public function userPost(Request $request){

        // dd($request);       

        User::UpdateOrCreate([
            'NIK'=>$request->NIK],[
            'name'=>$request->name,
            'email'=>$request->email,
            'gudang_id'=>$request->gudang,
            'password'=>bcrypt($request->password),
            'is_admin'=>$request->role
        ]);
        
        return redirect('/administrator/user/');

    }

    public function userDelete(Request $request){
        
        // dd($request);
        if ($request) {
            # code...
        }
        User::where('id','=',$request->id_user)->delete();

        return back();

    }
    

    // Administrasi Proses
    public function proses(){
        return view('/superadmin/proses',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Proses',
            'Processes'=> Process::Sortable()->paginate(10),
        ]);
    }
    
    public function addProses(){
        $Satuan = Satuan::all();


        return view('/superadmin/crud_proses',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Tambah Proses',
            'ProcessId'=>'',
            'ProcessName'=>'',
            'Qty'=>'',
            'Time'=>''
            ])->with('Satuan',$Satuan);
        }
    public function editProses(Request $request){
        $process = Process::where('process_id',$request->id_proses)->first();
        $standard = Standard::where('process_id',$request->id_proses)->first();
        $Satuan = Satuan::get();
        // $identity = $identity_raw->toArray();

        // dd($process_identity);
        return view('/superadmin/crud_proses',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit Proses',
            'ProcessId'=>$request->id_proses,
            'ProcessName'=>$process->process_name,
            'Qty'=>$standard->qty,
            'Time'=>$standard->time

        ])->with('Satuan',$Satuan);

    }

    public function prosesPost(Request $request){

        // dd($request);       

        Process::UpdateOrCreate([
            'process_id'=>$request->process_id],[
            'process_id'=>$request->process_id,
            'process_name'=>$request->process_name,
            'gudang_id'=>$request->gudang_id,
        ]);
        if ($request->qty) {
            # code...
            Standard::UpdateOrCreate([
                'process_id'=>$request->process_id],[
                'qty'=>$request->qty,
                'time'=>$request->time                
            ]);
        }
        
        return redirect('/administrator/proses/');

    }

    public function prosesDelete(Request $request){
        
        // dd($request);
        if ($request) {
            # code...
        }
        Process::where('process_id','=',$request->id_proses)->delete();
        
        return back();
    }
}
