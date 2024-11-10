<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckRole;


// Web para el Usuario

Route::get('/', [FrontController::class, 'index'])
        ->name('home');
Route::get('cursos', [FrontController::class, 'cursos'])
        ->name('cursos');
Route::get('novedades', [FrontController::class, 'novedades'])
        ->name('novedades');
Route::get('novedad/{id}', [FrontController::class, 'getNovedad'])
        ->name('detalles.novedad');
Route::get('curso/{id}', [FrontController::class, 'getCurso'])
        ->name('detalles.curso');
Route::post('curso/{id}', [ServiciosController::class, 'AgregarCarritoCurso'])
        ->name('comprar.curso')
        ->middleware(AuthMiddleware::class);
    

// Panel de Administrador
Route::get('admin/iniciar-sesion', [AdminController::class, 'login'])
        ->name('admin.login');
Route::post('admin/iniciar-sesion', [AdminController::class, 'authenticate'])
        ->name('admin.auth');
Route::get('admin', [AdminController::class, 'index'])
        ->name('admin-index')
        ->middleware(CheckRole::class);
Route::resource('admin/servicios', ServiciosController::class )
        ->middleware(CheckRole::class);
Route::resource('admin/usuarios', UsersController::class )
        ->middleware(CheckRole::class);   
Route::resource('admin/novedades', NovedadesController::class )
        ->middleware(CheckRole::class);  

// Autenticacion de usuario

Route::get('iniciar-sesion', [AuthController::class, 'login'])
        ->name('auth.login');

Route::get('registro', [AuthController::class, 'register'])
        ->name('auth.register');

Route::post('registro', [AuthController::class, 'newAccount'])
        ->name('auth.newAccount');

Route::post('iniciar-sesion', [AuthController::class, 'authenticate'])
        ->name('auth.authenticate');


Route::post('cerrar-sesion', [AuthController::class, 'logout'])
        ->name('auth.logout');

Route::post('admin/cerrar-sesion', [AdminController::class, 'logout'])
->name('admin-logout');
