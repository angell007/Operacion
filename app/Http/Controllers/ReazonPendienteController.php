<?php

namespace App\Http\Controllers;

use App\ReazonPendiente;
use Illuminate\Http\Request;

class ReazonPendienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ReazonPendiente::create(request()->all());
            return back()->with('success_msg','Cargo registrado correctamente ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Cargo no fue registrado '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReazonPendiente  $reazonPendiente
     * @return \Illuminate\Http\Response
     */
    public function show(ReazonPendiente $reazonPendiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReazonPendiente  $reazonPendiente
     * @return \Illuminate\Http\Response
     */
    public function edit(ReazonPendiente $reazonPendiente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReazonPendiente  $reazonPendiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReazonPendiente $reazonPendiente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReazonPendiente  $reazonPendiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReazonPendiente $reazonPendiente)
    {
        //
    }
}
