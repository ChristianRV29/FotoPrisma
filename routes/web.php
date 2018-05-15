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

Route::resource('inventario/categoria','CategoriaController');
Route::resource('inventario/servicio','ServicioController');
Route::resource('inventario/estudio','EstudioController');
Route::resource('inventario/producto','ProductoController');

Route::resource('usuarios/rol','RolController');
Route::resource('usuarios/cliente','ClienteController');
Route::resource('usuarios/administrador','AdministradorController');
Route::resource('usuarios/usuario','UsuarioController');
