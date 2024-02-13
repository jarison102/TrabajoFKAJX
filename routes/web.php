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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('Usuario', App\Http\Controllers\UsuarioController::class)->middleware('auth');
Route::resource('Pais', App\Http\Controllers\PaiseController::class)->middleware('auth');
Route::resource('Departamento', App\Http\Controllers\DepartamentoController::class)->middleware('auth');
Route::resource('Ciudad', App\Http\Controllers\CiudadeController::class)->middleware('auth');
