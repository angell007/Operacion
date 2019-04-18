<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/servicio','ServicioController');
Route::resource('/cliente','ClienteController');
Route::resource('/user','UserController');
Route::resource('/articulo','ArticuloController');
Route::resource('/cargo','CargoController');
Route::resource('/tipo','TipooServicioController');
Route::resource('/razon','ReazonPendienteController');
Route::resource('/modo','ModoServicioController');
Route::resource('/estado','EstadoPedidoController');
Route::resource('/proveedor','ProveedorController');
Route::resource('/factura','FacturaController');
Route::resource('/producto','ProductoController');


Route::post('/search','ClienteController@buscar')->name('search');
