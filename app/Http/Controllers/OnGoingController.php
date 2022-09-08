<?php

namespace App\Http\Controllers;

use App\Models\on_going;
use App\Models\User;
use App\Http\Requests\Storeon_goingRequest;
use App\Http\Requests\Updateon_goingRequest;

class OnGoingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Http\Requests\Storeon_goingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeon_goingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\on_going  $on_going
     * @return \Illuminate\Http\Response
     */
    public function show(on_going $on_going)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\on_going  $on_going
     * @return \Illuminate\Http\Response
     */
    public function edit(on_going $on_going)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateon_goingRequest  $request
     * @param  \App\Models\on_going  $on_going
     * @return \Illuminate\Http\Response
     */
    public function update(Updateon_goingRequest $request, on_going $on_going)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\on_going  $on_going
     * @return \Illuminate\Http\Response
     */
    public function destroy(on_going $on_going)
    {
        //
    }
}
