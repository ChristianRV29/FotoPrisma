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
    return view('auth/login');
});

/*Definicion de rutas que no requieren autenticacion de usuario*/
Route::group(['middleware' => 'web'], function () {
	Auth::routes();
	Route::get('/', function () {
		return redirect()->guest('login');
	});
});

/*Route::resource('inventario/categoria','CategoriaController');
Route::resource('inventario/servicio','ServicioController');
Route::resource('inventario/estudio','EstudioController');
Route::resource('inventario/producto','ProductoController');

Route::resource('usuarios/rol','RolController');
Route::resource('usuarios/cliente','ClienteController');
//Route::resource('usuarios/administrador','AdministradorController');
Route::resource('usuarios/usuario','UsuarioController');*/

//Route::resource('solicitudes/solicitud','SolicitudController');


//Route::auth();


Route::get('/home', 'HomeController@index')->name('home');

/*Rutas con middlewares de autenticacion*/
Route::group(['prefix' => 'admin',
 	'middleware' => ['web', 'auth', 'admin']], function () {
	Route::get('/', [
		'uses' => 'AdministradorController@index',
		'as' => 'admin.administrador'
	]);
	//Route::get('categoria/agregar','CategoriaController@create');
	Route::resource('inventario/categoria','CategoriaController');
	Route::resource('inventario/servicio','ServicioController');
	Route::resource('inventario/estudio','EstudioController');
	Route::resource('inventario/producto','ProductoController');
	Route::resource('usuarios/rol','RolController');
	Route::resource('usuarios/usuario','UsuarioController');
	Route::resource('usuarios/administrador','AdministradorController');
	Route::resource('usuarios/cliente','ClienteController');
		
});

Route::group(['prefix' => 'cliente', 
	'middleware' => ['web', 'auth', 'cliente']], function () {
	Route::get('/', [
		'uses' => 'SolicitudController@index',
		'as' => 'cliente.solicitud'
	]);
	Route::resource('solicitud','SolicitudController');
});
