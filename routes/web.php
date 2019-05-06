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


//RUTAS DE MODELO CLIENTES
Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::post('/clientes/create', 'ClientesController@store')->name('new-client');
Route::get('/list-clientes', 'ClientesController@list')->name('listClientes');

//RUTAS DEL MODELO DOMICILIO
//
Route::get('api/estados', 'EstadosController@index')->name('estados');
Route::post('api/municipios', 'MunicipioController@index')->name('municipios');
Route::post('api/localidades', 'LocalidadController@index')->name('localidades');






Route::get('/create_localidad', 'HomeController@createFile')->name('createfile');
