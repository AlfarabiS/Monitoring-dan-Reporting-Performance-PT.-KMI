<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
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
    
    public function user(){
        return view('/superadmin/user',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit User',
            'Users'=> User::all(),
        ]);
    }
    public function proses(){
        return view('/superadmin/proses',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit User',
            'Processes'=> Process::orderby('gudang_id')->get(),
        ]);
    }

    public function editUser(){
        return view('/superadmin/crud_user',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Halaman Edit User',
        ]);
    }
}
