<?php

namespace App\Http\Controllers;

use App\EstadoPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoPedidoController extends Controller
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
            $estados = EstadoPedido::orderBy('id','Desc')->get();
             return view('estado.index', compact('estados'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en estados '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $estados = EstadoPedido::all()->pluck('id','nombre');
          return view('estado.create');
  
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
            'descripcion' => 'required'

        ]);
 
        if ($validator->fails()) {
                        return back()
                        ->withErrors($validator)
                        ->withInput();
                    }          
                    EstadoPedido::create(request()->all());
                    return  redirect()->route('estado.index')->with('success_msg',' Exito ');
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\EstadoPedido  $EstadoPedido
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
         try {
             $estados =   EstadoPedido::findOrFail($id);
             $servicios = $EstadoPedido->servicios;
             return  view('estado.show')->with(compact(['estados','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en estados '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\EstadoPedido  $EstadoPedido
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
         try {
             $estados =   EstadoPedido::findOrFail($id);
             return  view('estado.edit',compact('estados'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en estados '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\EstadoPedido  $EstadoPedido
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
         try {
             $EstadoPedido = EstadoPedido::findOrFail($id);
          $EstadoPedido -> update(request()->all());
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en estados '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\EstadoPedido  $EstadoPedido
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         try {
             $EstadoPedido = EstadoPedido::findOrFail($id);
             $EstadoPedido->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en estados '. $th->getMessage());
         }
 
      }
}
