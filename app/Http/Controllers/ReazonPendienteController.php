<?php

namespace App\Http\Controllers;

use App\ReazonPendiente;
use Illuminate\Http\Request;

class ReazonPendienteController extends Controller
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
            $razones = ReazonPendiente::orderBy('id','Desc')->get();
             return view('razon.index', compact('razones'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en razones '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $razones = ReazonPendiente::all()->pluck('id','nombre');
          return view('razon.create');
  
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
             ReazonPendiente::create(request()->all());
             return back()->with('success_msg','successfully saved');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','unsuccessfully saved'. $th->getMessage());
         }
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\ReazonPendiente  $ReazonPendiente
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
         try {
             $razones =   ReazonPendiente::findOrFail($id);
             $servicios = $ReazonPendiente->servicios;
             return  view('razon.show')->with(compact(['razones','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en razones '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\ReazonPendiente  $ReazonPendiente
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
         try {
             $razones =   ReazonPendiente::findOrFail($id);
             return  view('razon.edit',compact('razones'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en razones '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\ReazonPendiente  $ReazonPendiente
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
         try {
             $ReazonPendiente = ReazonPendiente::findOrFail($id);
          $ReazonPendiente -> update(request()->all());
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en razones '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\ReazonPendiente  $ReazonPendiente
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         try {
             $ReazonPendiente = ReazonPendiente::findOrFail($id);
             $ReazonPendiente->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en razones '. $th->getMessage());
         }
 
      }
}
