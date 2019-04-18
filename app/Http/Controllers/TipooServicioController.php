<?php

namespace App\Http\Controllers;

use App\TipooServicio;
use Illuminate\Http\Request;

class TipooServicioController extends Controller
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
            TipooServicio::create(request()->all());
            return back()->with('success_msg','Cargo registrado correctamente ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Cargo no fue registrado '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipooServicio  $tipooServicio
     * @return \Illuminate\Http\Response
     */
    public function show(TipooServicio $tipooServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipooServicio  $tipooServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(TipooServicio $tipooServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipooServicio  $tipooServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipooServicio $tipooServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipooServicio  $tipooServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipooServicio $tipooServicio)
    {
        //
    }
}
