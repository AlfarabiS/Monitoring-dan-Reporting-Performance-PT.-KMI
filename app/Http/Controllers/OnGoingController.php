<?php

namespace App\Http\Controllers;

use App\Models\OnGoing;
use App\Http\Requests\StoreOnGoingRequest;
use App\Http\Requests\UpdateOnGoingRequest;

class OnGoingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('/admin/tracking',[
            'user'=>'Alfarabi',
            'judul'=>'Tracking'
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
        //
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
