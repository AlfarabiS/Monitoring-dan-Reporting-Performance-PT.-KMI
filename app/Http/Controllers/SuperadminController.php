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
            'Edit' => 0,
            'Name'=>'',
            'Email'=>'',
            'NIK'=>'',
            'Gudang'=>'',
            'Password'=>'',
            'Role' => 0
        ]);
    }

    
    
    public function editUser(Request $request){
        
        $identity = User::find($request->id_user);
        // $identity = $identity_raw->toArray();

        // dd($identity->is_admin);
        return view('/superadmin/crud_user',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit User',
            'Edit' => 1,
            'Name'=>$identity->name,
            'Email'=>$identity->email,
            'NIK'=>$identity->NIK,
            'Gudang'=>$identity->gudang_id,
            'Role' => $identity->is_admin
        ]);
    }

    public function userPost(Request $request){

        $User = User::where('NIK',$request->NIK)->first();
        
        // dd($request->password);

        if (is_null($request->password)) {
            User::UpdateOrCreate([
                'NIK'=>$request->NIK],[
                'name'=>strtoupper($request->name),
                'email'=>$request->email,
                'gudang_id'=>$request->gudang,
                'is_admin'=>$request->role
            ]);
        } else {
            User::UpdateOrCreate([
                'NIK'=>$request->NIK],[
                'name'=>strtoupper($request->name),
                'email'=>$request->email,
                'gudang_id'=>$request->gudang,
                'password'=>bcrypt($request->password),
                'is_admin'=>$request->role
            ]);
        }
        
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
        $Satuan = Satuan::get();
        $standard = Standard::where('process_id',$request->id_proses)->first();
        if (!is_null($standard)) {
            $standard_qty = $standard->qty;
            $standard_time = $standard->time;
        }else{ 
            $standard_qty = 0;
            $standard_time = 0;
        }
        // $identity = $identity_raw->toArray();

        // dd($process_identity);
        return view('/superadmin/crud_proses',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit Proses',
            'ProcessId'=>$request->id_proses,
            'ProcessName'=>$process->process_name,
            'Qty'=>$standard_qty,
            'Time'=>$standard_time

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
                'time'=>$request->time,
                'satuan'=>$request->satuan                
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

    // Satuan
    public function satuan(){
        $Satuans = Satuan::sortable()->get();
        return view('Superadmin/satuan',[
            'judul' => 'Halaman Satuan',
            'ActiveUser' => Auth::user()->name,
        ])->with('Satuans',$Satuans);
    }

    public function addSatuan(){

        return view('/superadmin/crud_satuan',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Tambah Satuan',
            'Satuan'=>'',
            'Id' => ''
            ]);
        }

    public function editSatuan(Request $request){
        $Satuan = Satuan::find($request->id);

        return view('/superadmin/crud_satuan',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit Satuan',
            'Satuan'=> $Satuan->satuan,
            'Id' => $Satuan->id
            ]);
    }

    public function satuanPost(Request $request){

        Satuan::UpdateOrCreate([
            'id' => $request->id],[
                'satuan' => $request->satuan
            ]); 

        return redirect('/administrator/satuan');
    }
}
