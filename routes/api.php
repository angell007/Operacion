<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Agregamos nuestra ruta 
Route::get('test', function () {
try {
                $razon = new  App\ReazonPendiente;
                $razon->nombre ="Aceptado";
                $razon->descripcion ="El servicio ha sido Aceptado ";
                $razon->saveOrFail();
                return back()->with('success_msg',' Exito ');
            } catch (\Throwable $th) {
                return back()->with('warning_msg','Error en razones ');
            }

            try {
                $razon = new  App\User;
                $razon->nombre ="Angell";
                $razon->email ="Angell@gmail.com";
                $razon->password =bcrypt("123");
                $razon->cargo_id ="Admin";
                $razon->saveOrFail();
                return back()->with('success_msg',' Exito ');
            } catch (\Throwable $th) {
                return back()->with('warning_msg','Error en razones ');
            }

});