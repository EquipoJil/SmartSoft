<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('categoria/servicio','CategoriaServicioController');
Route::resource('categoria/empleado','CategoriaEmpleadoController');
Route::resource('cliente/cliente','ClienteController');
Route::resource('personal/empleado','EmpleadoController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('cliente/agenda','AgendaController');

//Route::resource('evento/calenadrio','ControllerEvent');

 


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/{slug?}', 'HomeController@index');

