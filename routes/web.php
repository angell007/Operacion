<?php
// Route::get('registro', function () {
// try {
//     $razon = new  App\User;
//     $razon->nombre ="Angell";
//     $razon->email ="Angell@gmail.com";
//     $razon->password =bcrypt("123");
//     $razon->cargo_id ="Admin";
//     $razon->saveOrFail();
//     return back()->with('success_msg',' Exito ');
// } catch (\Throwable $th) {
//     return back()->with('warning_msg','Error en razones ');
// }
// });

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
// Route::resource('/estado','EstadoController');
Route::resource('/proveedor','ProveedorController');
Route::resource('/factura','FacturaController');
Route::resource('/producto','ProductoController');
Route::get('/{id?}','ServicioController@registro')->name('registro');
Route::post('/search','ClienteController@buscar')->name('search');
