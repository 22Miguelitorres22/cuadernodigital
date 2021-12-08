<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComunicadoController;
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


/// Autenticación y sesión
Route::get('/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/registro', [RegisterController::class, 'register']);

Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'login']);

Route::post('/cerrar-sesion', [LogoutController::class, 'logout'])->name('logout');


/// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


/// Usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/usuarios/lista', [UserController::class, 'list'])->name('usuarios.list');

Route::get('/usuarios/registro', [UserController::class, 'adminRegister'])->name('usuarios-registro');
Route::post('/usuarios/registro', [UserController::class, 'register']);

Route::get('/usuarios/{id}/editar', [UserController::class, 'adminRegister'])->name('usuarios.edit');
Route::put('/usuarios/{id}/editar', [UserController::class, 'edit']);

Route::get('/usuarios/{id}', [UserController::class, 'view'])->name('usuarios-detalle');

/// Comunicados
Route::get('/comunicados', [ComunicadoController::class, 'index'])->name('comunicados');


/// Ruta por defecto
Route::get('/', function () {
    return redirect()->route('login');
})->name('index');
