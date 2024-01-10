<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// =============================== Usuarios ====================================
Route::get('usuarios', [UsuariosController::class, 'index'])->name('Usuarios');
Route::get('apiUsuarios', [UsuariosController::class, 'apiUsuarios'])->name('apiUsuarios');

// =============================== Clientes ====================================
Route::get('clientes', [ClientesController::class, 'index'])->name('Clientes');
Route::get('apiClientes', [ClientesController::class, 'apiClientes'])->name('apiClientes');
Route::get('apiContactosAll', [ClientesController::class, 'apiContactosAll'])->name('apiContactosAll');
Route::get('apiContactos', [ClientesController::class, 'apiContactos'])->name('apiContactos');
Route::get('apiContactosTel', [ClientesController::class, 'apiContactosTel'])->name('apiContactosTel');
Route::get('getCliente', [ClientesController::class, 'getCliente'])->name('getCliente');
Route::post('guardarCliente', [ClientesController::class, 'guardarCliente'])->name('guardarCliente');

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
