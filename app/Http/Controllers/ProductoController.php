<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $proveedores = Proveedor::All()->pluck('id');
        return view ('producto.create', compact('proveedores'));
  
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
            
            'factura_id' => 'required',
            'proveedor_id' => 'required',
            'referencia' => 'required|unique:productos',
            'descripcion' => 'required',
            'costo_entrada' => 'required',
            'cantidad'
        ]);
 
        if ($validator->fails()) {
                        return back()
                        ->withErrors($validator)
                        ->withInput();
        }          
        Producto::create(request()->all());
          return back()->with('success_msg','Exito'); 
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
