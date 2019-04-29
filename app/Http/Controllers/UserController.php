<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cargo;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $users = User::orderBy('id','Desc')->get();
         // $selects = User::list();
         return view('user.index', compact('users'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        $cargos = Cargo::orderBy('id','Desc')->get();
         return view('forms/user.create', compact('cargos'));
 
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
            // User::create(request()->all());
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'cargo_id' => $request['cargo_id'],
                'password' => bcrypt($request['password']),
            ]);
            return back()->with('success_msg','successfully saved');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('warning_msg','unsuccessfully saved'. $e->getMessage());
        }
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function show(User $user)
     {
         $cargos = Cargo::orderBy('id','Desc')->get();
         $user =   User::findOrFail($user->id);
        return  view('forms/user.edit')->with(compact(['user', 'cargos']));
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
         return redirect()->back();
     }
}
