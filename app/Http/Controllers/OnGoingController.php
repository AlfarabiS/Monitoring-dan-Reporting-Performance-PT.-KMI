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

    public function index(){
        return view('/admin/index',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Selamat Datang',
        ]);
    }

    public function fg()
    {
        return view('/admin/tracking',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),
            'OnGoing' => OnGoing::join('users','on_goings.NIK','=','users.NIK')
            ->join('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
            ->join('processes','on_goings.process_id','=','processes.process_id')
            ->get(),
            'Processes' => Process::where('gudang_id', 'FG')->get()
        ]);
    }

    public function rm()
    {
        return view('/admin/tracking',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),
            'OnGoing' => OnGoing::join('users','on_goings.NIK','=','users.NIK')
            ->join('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
            ->join('processes','on_goings.process_id','=','processes.process_id')
            ->get(),
            'Processes' => Process::where('gudang_id', 'RM')->get()
        ]);
    }

    public function pm()
    {
        return view('/admin/tracking',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')->get(),
            'OnGoing' => OnGoing::join('users','on_goings.NIK','=','users.NIK')
            ->join('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
            ->join('processes','on_goings.process_id','=','processes.process_id')
            ->get(),
            'Processes' => Process::where('gudang_id', 'PM')->get()
        ]);
    }

    public function tracking(){
        
        return view('/admin/tracking1',[
            'ActiveUser' => Auth::user()->name,
            'judul'=> 'Tracking',
            'Users'=> User::where('is_admin','false')
            ->join('warehouses','users.gudang_id','=','warehouses.gudang_id')
            ->get(),
            'OnGoing' => OnGoing::all(),
            'Processes' => Process::where('gudang_id', 'PM')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOnGoingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOnGoingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnGoing  $onGoing
     * @return \Illuminate\Http\Response
     */
    public function show(OnGoing $onGoing)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnGoing  $onGoing
     * @return \Illuminate\Http\Response
     */
    public function edit(OnGoing $onGoing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOnGoingRequest  $request
     * @param  \App\Models\OnGoing  $onGoing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOnGoingRequest $request, OnGoing $onGoing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnGoing  $onGoing
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnGoing $onGoing)
    {
        //
    }
}
