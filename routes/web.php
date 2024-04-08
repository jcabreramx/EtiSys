<?php

use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ClientesNETController;
use App\Http\Controllers\CxCController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('crearUsuario', [UsuariosController::class, 'crearUsuario'])->name('crearUsuario');
Route::get('apiModulosPermisos', [UsuariosController::class, 'apiModulosPermisos'])->name('apiModulosPermisos');
Route::get('obtenerEmail', [UsuariosController::class, 'obtenerEmail'])->name('obtenerEmail');
Route::get('obtenerUsuario', [UsuariosController::class, 'obtenerUsuario'])->name('obtenerUsuario');
Route::get('actualizarUsuario', [UsuariosController::class, 'actualizarUsuario'])->name('actualizarUsuario');

Route::get('apiDepartamentos', [UsuariosController::class, 'apiDepartamentos'])->name('apiDepartamentos');
Route::get('crearDepartamento', [UsuariosController::class, 'crearDepartamento'])->name('crearDepartamento');
Route::get('obtenerDepartamento', [UsuariosController::class, 'obtenerDepartamento'])->name('obtenerDepartamento');
Route::get('actualizarDepartamento', [UsuariosController::class, 'actualizarDepartamento'])->name('actualizarDepartamento');

Route::get('apiPuestos', [UsuariosController::class, 'apiPuestos'])->name('apiPuestos');
Route::get('crearPuesto', [UsuariosController::class, 'crearPuesto'])->name('crearPuesto');
Route::get('obtenerPuesto', [UsuariosController::class, 'obtenerPuesto'])->name('obtenerPuesto');
Route::get('actualizarPuesto', [UsuariosController::class, 'actualizarPuesto'])->name('actualizarPuesto');

Route::get('apiPerfiles', [UsuariosController::class, 'apiPerfiles'])->name('apiPerfiles');
Route::get('crearPerfil', [UsuariosController::class, 'crearPerfil'])->name('crearPerfil');
Route::get('obtenerPerfil', [UsuariosController::class, 'obtenerPerfil'])->name('obtenerPerfil');
Route::get('actualizarPerfil', [UsuariosController::class, 'actualizarPerfil'])->name('actualizarPerfil');

Route::get('permisoAcceso', [UsuariosController::class, 'permisoAcceso'])->name('permisoAcceso');
Route::get('permisoCrear', [UsuariosController::class, 'permisoCrear'])->name('permisoCrear');
Route::get('permisoEditar', [UsuariosController::class, 'permisoEditar'])->name('permisoEditar');
Route::get('permisoEliminar', [UsuariosController::class, 'permisoEliminar'])->name('permisoEliminar');

// =============================== Clientes ====================================
Route::get('clientes', [ClientesController::class, 'index'])->name('Clientes');
Route::get('apiClientes', [ClientesController::class, 'apiClientes'])->name('apiClientes');
Route::get('getCliente', [ClientesController::class, 'getCliente'])->name('getCliente');
Route::post('guardarCliente', [ClientesController::class, 'guardarCliente'])->name('guardarCliente');

// =============================== Catálogos ====================================
Route::get('catalogos', [CatalogosController::class, 'index'])->name('Catalogos');
Route::get('apiAgentes', [CatalogosController::class, 'apiAgentes'])->name('apiAgentes');
Route::get('obtenerAgente', [CatalogosController::class, 'obtenerAgente'])->name('obtenerAgente');
Route::get('insertarAgente', [CatalogosController::class, 'insertarAgente'])->name('insertarAgente');
Route::get('actualizarAgente', [CatalogosController::class, 'actualizarAgente'])->name('actualizarAgente');

// =============================== CxC ====================================
Route::get('cxc', [CxCController::class, 'index'])->name('CxC');

// =============================== ClientesNET ====================================
Route::get('clientesNET', [ClientesNETController::class, 'index'])->name('ClientesNET');
Route::get('apiClientesNET', [ClientesNETController::class, 'apiClientesNET'])->name('apiClientesNET');
Route::get('apiContactosAll', [ClientesNETController::class, 'apiContactosAll'])->name('apiContactosAll');
Route::get('apiContactos', [ClientesNETController::class, 'apiContactos'])->name('apiContactos');
Route::get('apiContactosTel', [ClientesNETController::class, 'apiContactosTel'])->name('apiContactosTel');
Route::get('getClienteNET', [ClientesNETController::class, 'getClienteNET'])->name('getClienteNET');
Route::post('guardarClienteNET', [ClientesNETController::class, 'guardarClienteNET'])->name('guardarClienteNET');


Route::get('/logout', function () {
    Session::flush();
})->name('Logout');

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
