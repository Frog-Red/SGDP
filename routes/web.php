<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiaconoController;
use App\Http\Controllers\HijosController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\VicariaZonalController;
use App\Http\Controllers\Vicaria_ambientalController;
use App\Http\Controllers\rol_pastoralController;
use App\Http\Controllers\tipo_eventoController;
use App\Http\Controllers\historial_diaconoController;
use App\Http\Controllers\rol_diaconoController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\UserController;

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
    return Auth::check() ? redirect('/home') : view('auth.login');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('diaconos/carga-masiva', [DiaconoController::class, 'showCargaMasivaForm'])->name('diaconos.cargaMasiva')->middleware('roles:2');
    Route::post('diaconos/import', [DiaconoController::class, 'import'])->name('diaconos.import')->middleware('roles:2');
    Route::get('diaconos/download-template', [DiaconoController::class, 'downloadTemplate'])->name('diaconos.downloadTemplate')->middleware('roles:2');
    Route::get('/consultas', [DiaconoController::class, 'consultas'])->name('consultas')->middleware('roles:3');
    Route::resource('diaconos', DiaconoController::class)->middleware('roles:2');
    Route::resource('hijos', HijosController::class)->middleware('roles:2');
    Route::resource('parroquia', ParroquiaController::class)->middleware('roles:1');
    Route::resource('vicaria_zonal', VicariaZonalController::class)->middleware('roles:1');
    Route::resource('vicaria_ambiental', Vicaria_ambientalController::class)->middleware('roles:1');
    Route::resource('rol_pastoral', rol_pastoralController::class)->middleware('roles:1');
    Route::resource('tipo_evento', tipo_eventoController::class)->middleware('roles:1');
    Route::resource('historial_diacono', historial_diaconoController::class)->middleware('roles:2');
    Route::resource('rol_diacono', rol_diaconoController::class)->middleware('roles:2');
    Route::resource('users', UserController::class)->middleware('roles:1');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contrasena', 'App\Http\Controllers\UserController@showChangePasswordForm')->name('contrasena');
    Route::post('/contrasena', 'App\Http\Controllers\UserController@changePassword')->name('contrasena.post');
    Route::post('/diaconos/delete-selected', 'DiaconoController@deleteSelected')->name('diaconos.deleteSelected');
    Route::delete('/selected-diacono',[DiaconoController::class, 'deleteAll'])->name('diacono.delete');
});

Auth::routes();


