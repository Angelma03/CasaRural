<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListadoCasasController;
use \App\Http\Controllers\DueñoController;
use \App\Http\Controllers\ReservasController;
use \App\Http\Controllers\UserController;
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
})->name('inicio');


Auth::routes();
Route::get('/register', [\App\Http\Controllers\UserController::class, 'index'])->name('register');


Route::get('/listadocasas', [\App\Http\Controllers\ListadoCasasController::class, 'index'])->name('listadoCasas');

Route::get('/listadocasas/{id}', [\App\Http\Controllers\ListadoCasasController::class, 'show'])->name('show');

Route::get('/casas',[\App\Http\Controllers\DueñoController::class, 'index'])->name('casas');
Route::resource('casas',DueñoController::class)->middleware('can:casas');

Route::get('/reservas',[\App\Http\Controllers\ReservasController::class, 'index'])->name('reservas');
Route::get('/reservas/create/{id}',[\App\Http\Controllers\ReservasController::class, 'create'])->name('reservascreate');
Route::resource('reservas',ReservasController::class);

