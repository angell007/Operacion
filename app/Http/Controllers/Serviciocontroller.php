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

use Illuminate\Support\Facades\Validator;

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
        $servicios = Servicio::with('cliente','razonPendiente','customer')->get();
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
        $clientes = Cliente::All()->pluck('identificacion');
        $articulos = Articulo::All()->pluck('serie');
        $productos = Producto::All()->pluck('referencia');
        $pendientes = ReazonPendiente::All()->pluck('nombre');
        $modos = ModoServicio::select('nombre','id')->get();
        // dd($modos);
        $tipos = TipooServicio::select('nombre','id')->get();

        return view ('servicio.create', compact('tipos','clientes','productos','modos','usuarios','articulos','pendientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'cliente_id' => 'required',
                'customer_id' => 'required',
                'fecha_inicio' => 'required',
                'tipo_servicio_id' => 'required',
                'modo_servicio_id' => 'required',
            ]);
     
            if ($validator->fails()) {
                            return back()
                            ->withErrors($validator)
                            ->withInput();
            }          
            Servicio::create(request()->all());
            return  redirect()->route('servicio.index')->with('success_msg',' Exito ');

            // return back()->with('success_msg','successfully saved');
           
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
    public function edit($id)
    {
        $servicio = Servicio::where('id', decrypt($id))->with('cliente',
        'razonPendiente',
        'customer',
        'articulos',
        // 'productos',
        'modoServicio',
        'tipoServicio'
        )
        ->get();

        $usuarios = User::All()->pluck('identificacion');
        $articulos = Articulo::All()->pluck('serie');
        $productos = Producto::All()->pluck('referencia');
        $pendientes = ReazonPendiente::All()->pluck('nombre');
        $modos = ModoServicio::All()->pluck('nombre');
        $tipos = TipooServicio::All()->pluck('nombre');
        return view ('servicio.edit', compact('servicio', 'tipos','productos','modos','usuarios','articulos','pendientes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $servicio = Servicio::findOrfail($id);
            $servicio-> update(request()->all());          
            return  redirect()->route('servicio.index')->with('success_msg',' Exito ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en Servicios '. $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Servicio = Servicio::findOrFail($id);
            $Servicio->delete();
            return back()->with('success_msg',' Exito ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en Servicios '. $th->getMessage());
        }

     
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
