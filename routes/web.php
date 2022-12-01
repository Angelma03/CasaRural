<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListadoCasasController;
use \App\Http\Controllers\DueñoController;
use \App\Http\Controllers\ReservasController;
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
    return view('inicio');
});
Auth::routes();


Route::get('/listadocasas', [\App\Http\Controllers\ListadoCasasController::class, 'index'])->name('listadoCasas');

Route::get('/listadocasas/{id}', [\App\Http\Controllers\ListadoCasasController::class, 'show'])->name('show');

Route::get('/casas',[\App\Http\Controllers\DueñoController::class, 'index'])->name('casas');
Route::resource('casas',DueñoController::class);Auth::routes();

Route::get('/reservas',[\App\Http\Controllers\ReservasController::class, 'index'])->name('reservas');
Route::resource('reservas',ReservasController::class);Auth::routes();