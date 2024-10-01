<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('iniciar-sesion', [App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');

Route::get('registro', [App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');

Route::post('registro', [App\Http\Controllers\AuthController::class, 'newAccount'])->name('auth.newAccount');

Route::post('iniciar-sesion', [App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth.authenticate');


Route::post('cerrar-sesion', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logut');
