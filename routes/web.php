<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController; //Mandar a llamar el controlador para poder usarlo.
use App\Http\Controllers\LoginController; //Mandar a llamar el controlador para poder usarlo

//Estructura de una ruta:
//Route::get('nombre_que_tendra_la_ruta(url)',[Nombre_de_Controlador::class, 'Nombre_de_funcion(ubicada_en_controlador)'])->name('alias(puede_ser_igual_a_url)');
// el ->name se utiliza para que al momento de usar una ruta en la vista, laravel nos la detecte.
Route::get('mensaje', [EmpleadosController::class,'message']);
Route::get('controlpago',[EmpleadosController::class, 'payment']);
Route::get('nomina/{diast}/{pago}',[EmpleadosController::class, 'payroll']);


Route::get('muestrasaludo/{nombre}/{dias}',[EmpleadosController::class, 'greeting']);
Route::get('salir',[EmpleadosController::class, 'getout'])->name('salir');


Route::get('vb',[EmpleadosController::class, 'boostrapview'])->name('vb');

Route::get('altaempleado',[EmpleadosController::class, 'highemployee'])->name('altaempleado');
Route::post('guardarempleado',[EmpleadosController::class, 'saveemployee'])->name('guardarempleado');


Route::get('eloquent',[EmpleadosController::class, 'eloquent'])->name('eloquent');

Route::get('vista2',[EmpleadosController::class, 'viewtwo'])->name('vista2');
//Route::get('mensaje',[EmpleadosController::class, 'mensaje'])->name('mensaje');

Route::get('registros',[EmpleadosController::class, 'records'])->name('registros');

Route::get('desactivarempleado/{ide}',[EmpleadosController::class, 'defuseemployee'])->name('desactivarempleado');
Route::get('activarempleado/{ide}',[EmpleadosController::class, 'activateemployee'])->name('activarempleado');
Route::get('borrarempleado/{ide}',[EmpleadosController::class, 'deleteemployee'])->name('borrarempleado');

Route::get('editarempleado/{ide}',[EmpleadosController::class, 'editemployee'])->name('editarempleado');
Route::post('guardaredicion',[EmpleadosController::class, 'saveedit'])->name('guardaredicion');

Route::get('iniciosesion', [LoginController::class, 'login'])->name('iniciosesion');
Route::post('validacionlogin', [LoginController::class, 'validatelogin'])->name('validacionlogin');
Route::get('index', [LoginController::class, 'viewindex'])->name('index');
Route::get('cerrarsesion', [LoginController::class, 'logout'])->name('cerrarsesion');

//FUT
Route::get('tablaPosiciones', [EmpleadosController::class, 'posiciones'])->name('tablaPosiciones');







Route::get('/', function () {
    return view('welcome');
});
