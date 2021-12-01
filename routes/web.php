<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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


Route::get('/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/registro', [RegisterController::class, 'register']);


Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'login']);


Route::post('/cerrar-sesion', [LogoutController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::get('/usuarios/lista', [UserController::class, 'tableUsers'])->name('usuarios-lista');
Route::get('/usuarios/registro', [UserController::class, 'adminRegister'])->name('usuarios-registro');
Route::post('/usuarios/registro', [UserController::class, 'register']);
Route::get('/usuarios/{id}', [UserController::class, 'view'])->name('usuarios-detalle');

Route::get('/', function () {
    return redirect()->route('login');
})->name('index');
