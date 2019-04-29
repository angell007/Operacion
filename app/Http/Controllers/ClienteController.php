<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

use App\Cliente;
use App\Cargo;

use Illuminate\Http\Request;

class ClienteController extends Controller
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
        try {
            $clientes = Cliente::orderBy('id','Desc')->get();
            return view('cliente.index', compact('clientes'));
        } catch (\Throwable $th) {
            return back()->with('warning_msg','error en clientes '.$th->getMessage());
        }
    }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        //  $cargos = Cargo::all()->pluck('id','nombre');
         return view('cliente.create');
 
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
            'nombre' => 'required', 
            'apellido' => 'required',
            'sexo' => 'required', 
            'email' => 'required', 
            'tipo_identificacion' => 'required', 
            'identificacion' => 'required',
            'tipo_casa' => 'required',
            'ciudad' => 'required',
            'barrio' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'departamento' => 'required',  
    ]);
 
        if ($validator->fails()) {
                        return back()
                        ->withErrors($validator)
                        ->withInput();
        }          
        Cliente::create(request()->all());
        return  redirect()->route('cliente.index')->with('success_msg',' Exito ');

    }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Cliente  $Cliente
      * @return \Illuminate\Http\Response
      */
     public function show(Cliente $cliente)
     {
        try {
            $cliente =   Cliente::findOrFail($cliente->id);
            $servicios = $cliente->servicios;
            return  view('cliente.show')->with(compact(['cliente','servicios']));
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en clientes '. $e->getMessage());
        }

     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Cliente  $Cliente
      * @return \Illuminate\Http\Response
      */
     public function edit(Cliente $Cliente)
     {
        try {
            $Cliente =   Cliente::findOrFail($Cliente->id);
            return  view('forms/Cliente.edit',compact('cargos'));
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en clientes '. $e->getMessage());
        }
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Cliente  $Cliente
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         try {
             $Cliente = Cliente::findOrFail($id);
            $Cliente -> update(request()->all());
            return redirect()->route('cliente.show', $id );
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en clientes '. $e->getMessage());
        }
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Cliente  $Cliente
      * @return \Illuminate\Http\Response
      */
     public function destroy(Cliente $Cliente)
     {
        try {
            $Cliente = Cliente::findOrFail($Cliente->id);
            $Cliente->delete();
            return back()->with('success_msg',' Exito ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en clientes '. $e->getMessage());
        }

     }

    //  Route::get('pruebasPastel', function(){
    //     $pasteles = Pastel::sabor('vainilla')->get();
    //     dd($pasteles);
    // });

     public function buscar(Request $request)
     {
         $clientes = "";
         switch ($request->filtro) {
             case 'Identificacion':
             $clientes = Cliente::identificacion($request->id)->get();
             break;
             case 'Nombre':
             $clientes = Cliente::Nombre($request->id)->get();
             break;
             case 'Apellido':
             $clientes = Cliente::Apellido($request->id)->get();
             break;
             default:
                 # code...
            break;
        }
        return view('cliente.index', compact('clientes'));
        

        // try {
        // $cc = request()->id;
        //  if(empty($cc)){
        //     $clientes = Cliente::all();
        // }
        //  else {
        //     $clientes = Cliente::where('identificacion','like','%'.$cc.'%')->get();
        //     return view('cliente.index', compact('clientes'));
        //      }             
        // } catch (\Throwable $th) {
        //     return back()->with('warning_msg',' some wrong'. $e->getMessage());
        // }
       
     }

    
  
}
