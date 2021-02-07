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
//get: escribir ruta nav o enlace 
//post: formulario
//---------------------RUTAS DESDE EL NAVEGADOR
Route::get('/', function () {
    return view('indice');
});

Route::get('principal',function () {
    return view('indice');
});
//----------------------RUTAS DESDE EL CONTROLADOR (GET)
Route::get('principal2','miControlador@cargarIndice');

//----------------------FORMULARIO  action:'recoger' (POST)
Route::post('recoger','miControlador@cargarDatos');
