<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::get('cursos', [App\Http\Controllers\FrontController::class, 'cursos'])->name('cursos');
Route::get('novedades', [App\Http\Controllers\FrontController::class, 'novedades'])->name('novedades');
Route::get('novedad', [App\Http\Controllers\FrontController::class, 'getNovedad'])->name('novedad');
Route::get('curso', [App\Http\Controllers\FrontController::class, 'getCurso'])->name('curso');


Route::resource('admin/servicios', ServiciosController::class );

Route::get('iniciar-sesion', [App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');

Route::get('registro', [App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');

Route::post('registro', [App\Http\Controllers\AuthController::class, 'newAccount'])->name('auth.newAccount');

Route::post('iniciar-sesion', [App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth.authenticate');


Route::post('cerrar-sesion', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
