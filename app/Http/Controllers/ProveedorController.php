<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
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
            $proveedores = Proveedor::orderBy('id','Desc')->get();
             return view('proveedor.index', compact('proveedores'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en proveedor '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $proveedores = Proveedor::all()->pluck('id','nombre');
          return view('proveedor.create');
  
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
             Proveedor::create(request()->all());
             return  redirect()->route('proveedor.index')->with('success_msg',' Exito ');
            } catch (\Throwable $th) {
             return back()->with('warning_msg','unsuccessfully saved'. $th->getMessage());
         }
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\Proveedor  $Proveedor
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
         try {
             $proveedores =   Proveedor::findOrFail($id);
             $servicios = $Proveedor->servicios;
             return  view('proveedor.show')->with(compact(['proveedores','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en proveedor '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Proveedor  $Proveedor
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
         try {
             $proveedores =   Proveedor::findOrFail($id);
             return  view('proveedor.edit',compact('proveedores'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en proveedor '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Proveedor  $Proveedor
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
         try {
             $Proveedor = Proveedor::findOrFail($id);
          $Proveedor -> update(request()->all());
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en proveedor '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Proveedor  $Proveedor
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         try {
             $Proveedor = Proveedor::findOrFail($id);
             $Proveedor->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en proveedor '. $th->getMessage());
         }
 
      }
}
