<?php

use Illuminate\Support\Facades\Route;

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
//--------------------------------------------------------------------------------
Route::get('verUsuarios', [App\Http\Controllers\miControlador::class,'verUsuarios']);
//--------------------------------------------------------------------------------
Route::get('buscadorUsuarios', function () {
    return view('formularioBuscarPersona');
});
Route::post('buscarUsuario', [App\Http\Controllers\miControlador::class, 'buscarUsuario']);
//--------------------------------------------------------------------------------
Route::get('registroUsuario', function () {
    return view('formularioInsertarPersona');
});
Route::post('insertarUsuario', [App\Http\Controllers\miControlador::class,'insertarUsuario']);
//--------------------------------------------------------------------------------
Route::get('verPedidos', [App\Http\Controllers\miControlador::class,'verPedidos']);
//--------------------------------------------------------------------------------
Route::get('verArticulos', [App\Http\Controllers\miControlador::class,'verArticulos']);
//--------------------------------------------------------------------------------
Route::get('buscadorPedidosUsuario', function () {
    return view('formularioBuscarPedidosUsuario');
});
Route::post('verPedidosUsuario', [App\Http\Controllers\miControlador::class, 'verPedidosUsuario']);
//--------------------------------------------------------------------------------
Route::get('verUsuariosConPedidos', [App\Http\Controllers\miControlador::class, 'verUsuariosConPedidos']);
//--------------------------------------------------------------------------------
Route::get('verArticulosPedidos', [App\Http\Controllers\miControlador::class, 'verArticulosPedidos']);
//--------------------------------------------------------------------------------
Route::get('probarBelong', [App\Http\Controllers\miControlador::class, 'probarBelong']);



Route::get('volver', function () {
    return view('welcome');
});

