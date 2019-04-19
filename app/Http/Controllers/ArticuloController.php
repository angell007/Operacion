<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
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
            $articulos = Articulo::orderBy('id','Desc')->get();
             return view('articulo.index', compact('articulos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en Articulos '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $articulos = Articulo::all()->pluck('id','nombre');
          return view('articulo.create');
  
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
             Articulo::create(request()->all());
             return back()->with('success_msg','successfully saved');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','unsuccessfully saved'. $th->getMessage());
         }
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\Articulo  $Articulo
       * @return \Illuminate\Http\Response
       */
      public function show(Articulo $Articulo)
      {
         try {
             $articulos =   Articulo::findOrFail($Articulo->id);
             $servicios = $Articulo->servicios;
             return  view('articulo.show')->with(compact(['Articulos','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en Articulos '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Articulo  $Articulo
       * @return \Illuminate\Http\Response
       */
      public function edit(Articulo $Articulo)
      {
         try {
             $articulos =   Articulo::findOrFail($Articulo->id);
             return  view('articulo.edit',compact('articulos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en Articulos '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Articulo  $Articulo
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, Articulo $Articulo)
      {
         try {
             $Articulo = Articulo::findOrFail($Articulo->id);
          $Articulo -> update(request()->all());
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en Articulos '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Articulo  $Articulo
       * @return \Illuminate\Http\Response
       */
      public function destroy(Articulo $Articulo)
      {
         try {
             $Articulo = Articulo::findOrFail($Articulo->id);
             $Articulo->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en Articulos '. $th->getMessage());
         }
 
      }
 
}
