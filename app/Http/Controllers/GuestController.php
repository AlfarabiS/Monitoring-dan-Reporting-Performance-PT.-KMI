<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OnGoing;
use App\Models\Process;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function __construct(){
        
    }
    public function index(){
        $Users = OnGoing::Sortable('name')->get();
        
        return view('/guest/tracking1',[
            'ActiveUser' => '',
            'judul'=> 'Tracking',
            ])->with('Users',$Users);
            // ->join('on_goings','users.NIK','=','on_goings.NIK')
    }
    
    public function fg()
    {
        $Users = OnGoing::Sortable('name')->where('users.gudang_id','FG')->paginate(10);

        return view('/guest/tracking',[
            'ActiveUser' => '',
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),

            'Processes' => Process::where('gudang_id', 'FG')
                ->orWhere('process_id', 'Idle ')
                ->orWhere('process_id', 'Hold ')
                ->orWhere('process_id', 'LL')
                ->get()
        ])->with('Users',$Users);
    }

    public function rm()
    {
        $Users = OnGoing::Sortable('name')->where('users.gudang_id','RM')->paginate(10);

        return view('/guest/tracking',[
            'ActiveUser' => '',
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),

            'Processes' => Process::where('gudang_id', 'RM')
            ->orWhere('process_id', 'Idle ')
            ->orWhere('process_id', 'Hold ')                
            ->orWhere('process_id', 'LL')
            ->get()
        ])->with('Users',$Users);
    }

    public function pm()
    {
        $Users = OnGoing::Sortable('name')->where('users.gudang_id','PM')->paginate(10);

        return view('/guest/tracking',[
            'ActiveUser' => '',
            'judul'=> 'Tracking',
            'Processes' => Process::where('gudang_id', 'PM')
                ->orWhere('process_id', 'Idle ')
                ->orWhere('process_id', 'Hold ')
                ->orWhere('process_id', 'LL')
                ->get()
        ])->with('Users',$Users);;
    }

    public function tracking(){

        $Users = OnGoing::Sortable('name')->get();
        
        return view('/guest/tracking1',[
            'ActiveUser' =>'',
            'judul'=> 'Tracking',
            ])->with('Users',$Users);
            // ->join('on_goings','users.NIK','=','on_goings.NIK')
    }
}
