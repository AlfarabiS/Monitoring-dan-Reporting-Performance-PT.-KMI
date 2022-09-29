<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OnGoing;
use App\Models\Process;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOnGoingRequest;
use App\Http\Requests\UpdateOnGoingRequest;

class OnGoingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index(){
        return view('/admin/index',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Selamat Datang',
        ]);
    }

    public function fg()
    {
        $Users = OnGoing::Sortable('name')->where('users.gudang_id','FG')->paginate(10);

        return view('/admin/tracking',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),

            'Processes' => Process::where('gudang_id', 'FG')
                ->orWhere('process_id', 'Idle ')
                ->orWhere('process_id', 'Hold ')
                ->get()
        ])->with('Users',$Users);
    }

    public function rm()
    {
        $Users = OnGoing::Sortable('name')->where('users.gudang_id','RM')->paginate(10);

        return view('/admin/tracking',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),

            'Processes' => Process::where('gudang_id', 'RM')
            ->orWhere('process_id', 'Idle ')
            ->orWhere('process_id', 'Hold ')                
            ->get()
        ])->with('Users',$Users);
    }

    public function pm()
    {
        $Users = OnGoing::Sortable('name')->where('users.gudang_id','PM')->paginate(10);

        return view('/admin/tracking',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Processes' => Process::where('gudang_id', 'PM')
                ->orWhere('process_id', 'Idle ')
                ->orWhere('process_id', 'Hold ')
                ->get()
        ])->with('Users',$Users);;
    }

    public function tracking(){

        $Users = OnGoing::Sortable('name')->paginate(10);
        
        return view('/admin/tracking1',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            ])->with('Users',$Users);
            // ->join('on_goings','users.NIK','=','on_goings.NIK')
    }


}
