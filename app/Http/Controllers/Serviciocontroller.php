<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\User;
use App\ModoServicio;
use App\TipooServicio;
use App\Cliente;
use App\ReazonPendiente;
use App\Articulo;
use App\Producto;


use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::All();
        // return view ('tablas.servicios',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::All();
        $clientes = Cliente::All();
        $articulos = Articulo::All();
        $productos = Producto::All();
        $pendientes = ReazonPendiente::All();
        $modos = ModoServicio::All();
        $tipos = TipooServicio::All();
        // $servicios = Servicio::All();

        return view ('servicio.create', compact('tipos','modos','clientes','usuarios','articulos','productos','pendientes'));
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
            Servicio::create(request()->all());
            return back()->with('success_msg','successfully saved');
        } catch (QueryException $e) {
            return back()->with('warning_msg','unsuccessfully saved'. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
