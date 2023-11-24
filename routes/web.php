<?php

use App\Http\Controllers\DiaconoController;
use App\Http\Controllers\HijosController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\VicariaZonalController;
use App\Http\Controllers\Vicaria_ambientalController;
use App\Http\Controllers\rol_pastoralController;
use App\Http\Controllers\tipo_eventoController;
use App\Http\Controllers\historial_diaconoController;
use App\Http\Controllers\rol_diaconoController;
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
Route::get('/', function () {return view('welcome');})->name('welcome');
Route::resource('diaconos', DiaconoController::class);
Route::resource('hijos', HijosController::class);
Route::resource('parroquia', ParroquiaController::class);
Route::resource('vicaria_zonal', VicariaZonalController::class);
Route::resource('vicaria_ambiental', Vicaria_ambientalController::class);
Route::resource('rol_pastoral', rol_pastoralController::class);
Route::resource('tipo_evento', tipo_eventoController::class);
Route::resource('historial_diacono', historial_diaconoController::class);
Route::resource('rol_diacono', rol_diaconoController::class);


