<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;

use App\Cargo;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function __construct()
     {
        $this->middleware(['auth']);
     }

    public function index()
    {
        try {
           $cargos = Cargo::orderBy('id','Desc')->get();
            return view('cargo.index', compact('cargos'));
        } catch (\Throwable $th) {
            return back()->with('warning_msg','error en cargos '.$th->getMessage());
        }
    }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        // $cargos = Cargo::all()->pluck('id','nombre');
         return view('cargo.create');
 
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
            Cargo::create(request()->all());
            return back()->with('success_msg','successfully saved');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','unsuccessfully saved'. $th->getMessage());
        }

    }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Cargo  $Cargo
      * @return \Illuminate\Http\Response
      */
     public function show(Cargo $Cargo)
     {
        try {
            $cargos =   Cargo::findOrFail($Cargo->id);
            $servicios = $Cargo->servicios;
            return  view('Cargo.show')->with(compact(['cargos','servicios']));
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en Cargos '. $th->getMessage());
        }

     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Cargo  $Cargo
      * @return \Illuminate\Http\Response
      */
     public function edit(Cargo $Cargo)
     {
        try {
            $cargos =   Cargo::findOrFail($Cargo->id);
            return  view('cargo.edit',compact('cargos'));
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en Cargos '. $th->getMessage());
        }
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Cargo  $Cargo
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Cargo $Cargo)
     {
        try {
            $cargo = Cargo::findOrFail($Cargo->id);
         $cargo -> update(request()->all());
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en Cargos '. $th->getMessage());
        }
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Cargo  $Cargo
      * @return \Illuminate\Http\Response
      */
     public function destroy(Cargo $Cargo)
     {
        try {
            $cargo = Cargo::findOrFail($Cargo->id);
            $cargo->delete();
            return back()->with('success_msg',' Exito ');
        } catch (\Throwable $th) {
            return back()->with('warning_msg','Error en Cargos '. $th->getMessage());
        }

     }


    //  public function buscar(Request $request)
    //  {
    //     try {
    //     $cc = request()->id;
    //      if(empty($cc)){
    //        $cargos = Cargo::all();
    //         return view('Cargo.index', compact('Cargos'));
    //     }
    //      else {
    //        $cargos = Cargo::where('identificacion','like','%'.$cc.'%')->get();
    //         return view('Cargo.index', compact('Cargos'));
    //          }             
    //     } catch (\Throwable $th) {
    //         return back()->with('warning_msg',' some wrong'. $th->getMessage());
    //     }
       
    //  }
  
}