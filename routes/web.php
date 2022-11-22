<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListadoCasasController;
use \App\Http\Controllers\DueñoController;

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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/listadocasas', [\App\Http\Controllers\ListadoCasasController::class, 'index'])->name('listadoCasas');

Route::get('/casas',[\App\Http\Controllers\DueñoController::class, 'index'])->name('casas');
Route::resource('casas',DueñoController::class);Auth::routes();