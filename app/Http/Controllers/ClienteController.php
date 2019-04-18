<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id','Desc')->get();
        return view('cliente.index', compact('clientes'));
    }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        //  return view('forms/user.create', compact('cargos'));
 
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
            Cliente::create(request()->all());
            return back()->with('success_msg','successfully saved');
        } catch (QueryException $e) {
            return back()->with('warning_msg','unsuccessfully saved'. $e->getMessage());
        }

    }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function show(Cliente $cliente)
     {
        //  $cargos = Cargo::orderBy('id','Desc')->get();
         $cliente =   Cliente::findOrFail($cliente->id);
         $servicios = $cliente->servicios;
         return  view('cliente.show')->with(compact(['cliente','servicios']));

        // return  view('cliente.show')->with(compact(['user', 'cargos']));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function edit(User $user)
     {
        
         $user =   User::findOrFail($user->id);
         return  view('forms/user.edit',compact('cargos'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, User $user)
     {
         $user = User::findOrFail($user->id);
         $user -> update(request()->all());
         flash()->success('Operacion Sistemica', 'User successfully update.');     
         return redirect()->action('UserController@index');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function destroy(User $user)
     {
         $user = User::findOrFail($user->id);
         $user->delete();
         flash()->success('Operacion Sistemica', 'User successfully delete.');     
         return redirect()->back();
     }


     public function buscar(Request $request)
     {
        try {
        $cc = request()->id;
         if(empty($cc)){
            $clientes = Cliente::all();
            return view('cliente.index', compact('clientes'));
            //   return back()->with('warning_msg','Nothing');
        }
         else {
            $clientes = Cliente::where('identificacion','like','%'.$cc.'%')->get();
            return view('cliente.index', compact('clientes'));
             }             
        } catch (QueryException $e) {
            return back()->with('warning_msg',' some wrong'. $e->getMessage());
        }
       
     }
  
}
