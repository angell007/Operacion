<?php

namespace App\Http\Controllers;

use App\ModoServicio;
use Illuminate\Http\Request;

class ModoServicioController extends Controller
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
            ModoServicio::create(request()->all());
            return back()->with('success_msg','registrado correctamente ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','no fue registrado '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModoServicio  $modoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(ModoServicio $modoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModoServicio  $modoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(ModoServicio $modoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModoServicio  $modoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModoServicio $modoServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModoServicio  $modoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModoServicio $modoServicio)
    {
        //
    }
}
