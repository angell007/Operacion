<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
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
            $productos = Producto::orderBy('id','Desc')->get();
             return view('producto.index', compact('productos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en productos '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $productos = Producto::all()->pluck('id','nombre');
          return view('producto.create');
  
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
             Producto::create(request()->all());
             return back()->with('success_msg','successfully saved');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','unsuccessfully saved'. $th->getMessage());
         }
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\Producto  $Producto
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
         try {
             $productos =   Producto::findOrFail($id);
             $servicios = $Producto->servicios;
             return  view('producto.show')->with(compact(['productos','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en productos '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Producto  $Producto
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
         try {
             $productos =   Producto::findOrFail($id);
             return  view('producto.edit',compact('productos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en productos '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Producto  $Producto
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
         try {
             $Producto = Producto::findOrFail($id);
          $Producto -> update(request()->all());
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en productos '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Producto  $Producto
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         try {
             $Producto = Producto::findOrFail($id);
             $Producto->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en productos '. $th->getMessage());
         }
 
      }
}
