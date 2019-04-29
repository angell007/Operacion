<?php

namespace App\Http\Controllers;

use App\TipooServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipooServicioController extends Controller
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
            $tipos = TipooServicio::orderBy('id','Desc')->get();
             return view('tipo.index', compact('tipos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en tipos  '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $tipos = TipooServicio::all()->pluck('id','nombre');
          return view('tipo.create');
  
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
           
            'nombre' => 'required|unique:reazon_pendientes',
            'descripcion' => 'required'

        ]);
 
        if ($validator->fails()) {
                        return back()
                        ->withErrors($validator)
                        ->withInput();
        }          
        TipooServicio::create(request()->all());
        return  redirect()->route('tipo.index')->with('success_msg',' Exito ');
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\TipooServicio  $TipooServicio
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
         try {
             $tipos =   TipooServicio::findOrFail($id);
             $servicios = $TipooServicio->servicios;
             return  view('tipo.show')->with(compact(['tipos','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en tipos  '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\TipooServicio  $TipooServicio
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
         try {
             $tipos =   TipooServicio::findOrFail($id);
             return  view('tipo.edit',compact('tipos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en tipos  '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\TipooServicio  $TipooServicio
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
         try {
             $TipooServicio = TipooServicio::findOrFail($id);
          $TipooServicio -> update(request()->all());
          return redirect()->route('tipo.index');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en tipos  '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\TipooServicio  $TipooServicio
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         try {
             $TipooServicio = TipooServicio::findOrFail($id);
             $TipooServicio->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en tipos  '. $th->getMessage());
         }
 
      }
}
