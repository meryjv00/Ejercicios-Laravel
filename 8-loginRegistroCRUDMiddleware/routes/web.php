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
    return view('login');
});

Route::get('login', function () {
    return view('login');
});

Route::get('registro', function () {
    return view('registro');
});
Route::get('registroAdmin', function () {
    return view('registroAdmin');
});
Route::get('registroCoche', function () {
    return view('registroCoche');
});

//MI CONTROLADOR: QUERY BUILDER
Route::post('entrar', 'miControlador@login');
Route::post('registro', 'miControlador@registro');
Route::post('perfil', 'miControlador@perfil');
Route::post('editarPerfil', 'miControlador@editarPerfil');
Route::post('cargarCRUD', 'miControlador@cargarCRUD');
Route::post('irInicio', 'miControlador@irInicio');
Route::post('irCRUD', 'miControlador@irCRUD');
Route::post('cerrarSesion', 'miControlador@cerrarSesion');
Route::post('gestionarUsuarios', 'miControlador@gestionarUsuarios');
Route::post('crearUsuario', 'miControlador@crearUsuario');
Route::post('generarUsuarios', 'miControlador@generarUsuarios');
Route::post('cambiarPass', 'miControlador@cambiarPass');
Route::post('cargarAlquileres', 'miControlador@cargarAlquileres');
Route::post('gestionarDevoluciones', 'miControlador@gestionarDevoluciones');
Route::post('gestionarAlquileres', 'miControlador@gestionarAlquileres');
Route::post('cargarCRUDcoches', 'miControlador@cargarCRUDcoches');
Route::post('gestionarCoches', 'miControlador@gestionarCoches');
Route::post('crearCoche', 'miControlador@crearCoche');



//MI CONTROLADOR2: SIN QUERY BUILDER
//Route::post('entrar','miControlador2@login');
//Route::post('registro','miControlador2@registro');
//Route::post('perfil','miControlador2@perfil');
//Route::post('editarPerfil','miControlador2@editarPerfil');
//Route::post('cargarCRUD','miControlador2@cargarCRUD');
//Route::post('irInicio','miControlador2@irInicio');
//Route::post('irCRUD','miControlador2@irCRUD');
//Route::post('cerrarSesion','miControlador2@cerrarSesion');
//Route::post('gestionarUsuarios','miControlador2@gestionarUsuarios');
//Route::post('crearUsuario','miControlador2@crearUsuario');
//Route::post('generarUsuarios','miControlador2@generarUsuarios');
//Route::post('cambiarPass','miControlador2@cambiarPass');
//Route::post('cargarAlquileres','miControlador2@cargarAlquileres');
//Route::post('gestionarDevoluciones','miControlador2@gestionarDevoluciones');
//Route::post('gestionarAlquileres','miControlador2@gestionarAlquileres');
//Route::post('cargarCRUDcoches','miControlador2@cargarCRUDcoches');
//Route::post('gestionarCoches','miControlador2@gestionarCoches');
//Route::post('crearCoche','miControlador2@crearCoche');


//GESTIÓN DE RUTAS: MIDDLEWARE
//COMUNES
Route::get('perfil', [App\Http\Controllers\miControlador::class, 'perfil'])->middleware('haIniciadoSesion');

//USUARIO ESTÁNDAR
Route::group(['prefix' => 'usu', 'middleware' => ['haIniciadoSesion', 'esUsuario']], function() {
    Route::get('verAlquileres', [App\Http\Controllers\miControlador::class, 'cargarAlquileres'])->name('verAlquileres');
});

//ADMINISTRADOR
Route::group(['prefix' => 'admin', 'middleware' => ['haIniciadoSesion', 'esAdministrador']], function() {
    Route::get('crudUsuarios', [App\Http\Controllers\miControlador::class, 'cargarCRUD'])->name('crudUsuarios');
    Route::get('crudCoches', [App\Http\Controllers\miControlador::class, 'cargarCRUDcoches'])->name('crudCoches');
});
