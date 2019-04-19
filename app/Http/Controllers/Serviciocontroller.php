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

     public function __construct()
     {
         $this->middleware('auth');
 
     }

     
    public function index()
    {
        $servicios = Servicio::All();
        return view ('servicio.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::All()->pluck('identificacion');
        // $cliente = Cliente::All();
        $articulos = Articulo::All()->pluck('serie');
        $productos = Producto::All()->pluck('referencia');
        $pendientes = ReazonPendiente::All()->pluck('nombre');
        $modos = ModoServicio::All();
        $tipos = TipooServicio::All();
        // $servicios = Servicio::All();

        return view ('servicio.create', compact('tipos','productos','modos','usuarios','articulos','pendientes'));
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

    public function registro($id)
    {   
        $usuarios = User::All()->pluck('identificacion');
        $productos = Producto::All()->pluck('referencia');
        $articulos = Articulo::All()->pluck('serie');
        $pendientes = ReazonPendiente::All()->pluck('nombre');
        $modos = ModoServicio::All();
        $tipos = TipooServicio::All();
        $cliente = Cliente::where("identificacion" , decrypt($id))->firstOrFail();
        return view('servicio.create', compact('tipos','modos', 'cliente', 'usuarios','articulos','productos','pendientes'));
        
        // dd($cliente->identificacion);
        // decrypt(101)
        // $cliente = Cliente::where("identificacion", 101)->first();
        // dd( $cliente->identificacion);
        // foreach ($cliente as $key => $value) {
        //     echo "'$value[1]'";
        // }
        // if(!$cliente) abort(404);

    }
}
