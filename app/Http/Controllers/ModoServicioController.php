<?php

namespace App\Http\Controllers;

use App\ModoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModoServicioController extends Controller
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
            $modos = ModoServicio::orderBy('id','Desc')->get();
             return view('modo.index', compact('modos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','error en modos '.$th->getMessage());
         }
     }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
         // $modos = ModoServicio::all()->pluck('id','nombre');
          return view('modo.create');
  
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
        ModoServicio::create(request()->all());
        return back()->with('success_msg','successfully saved');
 
        
 
     }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\ModoServicio  $ModoServicio
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
         try {
             $modos =   ModoServicio::findOrFail($id);
             $servicios = $ModoServicio->servicios;
             return  view('modo.show')->with(compact(['modos','servicios']));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en modos '. $th->getMessage());
         }
 
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\ModoServicio  $ModoServicio
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
         try {
             $modos =   ModoServicio::findOrFail($id);
             return  view('modo.edit',compact('modos'));
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en modos '. $th->getMessage());
         }
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\ModoServicio  $ModoServicio
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
         try {
             $ModoServicio = ModoServicio::findOrFail($id);
          $ModoServicio -> update(request()->all());
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en modos '. $th->getMessage());
         }
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\ModoServicio  $ModoServicio
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         try {
             $ModoServicio = ModoServicio::findOrFail($id);
             $ModoServicio->delete();
             return back()->with('success_msg',' Exito ');
         } catch (\Throwable $th) {
             return back()->with('warning_msg','Error en modos '. $th->getMessage());
         }
 
      }
}
