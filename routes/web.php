<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CursosEnOrdenController;
use App\Http\Controllers\PaymentController;

// Web para el Usuario

Route::get('/', [FrontController::class, 'index'])
        ->name('home');
Route::get('cursos', [FrontController::class, 'cursos'])
        ->name('cursos');
Route::get('novedades', [FrontController::class, 'novedades'])
        ->name('novedades');
Route::get('novedad/{id}', [FrontController::class, 'getNovedad'])
        ->name('detalles.novedad')
        ->middleware(AuthMiddleware::class);
Route::get('curso/{id}', [FrontController::class, 'getCurso'])
        ->name('detalles.curso');
Route::post('curso/{id}', [ServiciosController::class, 'AgregarCarritoCurso'])
        ->name('comprar.curso')
        ->middleware(AuthMiddleware::class);




//------------------------------
// Carrito 
Route::get('carrito', [CarritoController::class, 'obtenerCarrito'])
        ->name('carrito')
        ->middleware(AuthMiddleware::class);
Route::delete('carrito/{id}', [CarritoController::class, 'eliminarDelCarrito'])
        ->name('carrito.eliminar')
        ->middleware(AuthMiddleware::class);

Route::post('carrito', [CarritoController::class, 'pagarCarrito'])
        ->name('carrito.comprar')
        ->middleware(AuthMiddleware::class);

Route::post('/orden', [OrdenController::class, 'store'])
        ->name('orden.store')
        ->middleware(AuthMiddleware::class);
Route::post('/pago/{ordenId}', [PagoController::class, 'store'])
        ->name('pago.store')
        ->middleware(AuthMiddleware::class);
Route::post('/cursos-en-orden/{ordenId}/{cursoId}', [CursosEnOrdenController::class, 'store'])
        ->name('cursos-en-orden.store')
        ->middleware(AuthMiddleware::class);
//------------------------------


Route::get('/pago/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/pago/fallido', [PaymentController::class, 'failure'])->name('payment.failure');
Route::get('/pago/pendiente', [PaymentController::class, 'pending'])->name('payment.pending');


// Perfil -----------------

Route::get('/perfil', [UsersController::class, 'profile'])->name('perfil');
Route::get('/perfil/editar', [UsersController::class, 'updateUserView'])->name('perfil.edit.view');
Route::patch('/perfil/editar', [UsersController::class, 'updateUserAuth'])->name('perfil.edit');


// ------------------------

// Panel de Administrador
Route::get('admin', [AdminController::class, 'index'])
        ->name('admin-index')
        ->middleware(CheckRole::class);
Route::resource('admin/servicios', ServiciosController::class)
        ->middleware(CheckRole::class);
Route::resource('admin/usuarios', UsersController::class)
        ->middleware(CheckRole::class);
Route::get('admin/usuarios/{userId}/ordenes', [OrdenController::class, 'index'])
        ->middleware(CheckRole::class)
        ->name('admin.usuarios.ordenes.index');
Route::get('admin/usuarios/{userId}/ordenes/{orderId}', [OrdenController::class, 'show'])
        ->middleware(CheckRole::class)
        ->name('admin.usuarios.ordenes.show');

Route::resource('admin/novedades', NovedadesController::class)
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
