<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\eti_Departamentos;
use App\Models\eti_Perfiles;
use App\Models\eti_Puestos;
use App\Models\User;
use App\Traits\PermisosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class UsuariosController extends Controller
{
    use PermisosTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->permisos();
        if (session('AccesoUsuarios') == 1) {
            $departamentos = DB::table('eti_Departamentos')->get();
            $puestos = DB::table('eti_Puestos')->get();
            $perfiles = DB::table('eti_Perfiles')->get();
            return view('usuarios.index', compact('departamentos', 'puestos', 'perfiles'));
        } else {
            return redirect()->route('home');
        }

    }

    public function apiUsuarios()
    {
        $usuarios = User::all();

        return DataTables::of($usuarios)
        ->addColumn('AccesoUsuarios', function () {
            $AccesoUsuarios = trim(session('AccesoUsuarios'));
            return $AccesoUsuarios;
        })
        ->addColumn('EditarUsuarios', function () {
            $EditarUsuarios = trim(session('EditarUsuarios'));
            return $EditarUsuarios;
        })
        ->addColumn('EliminarUsuarios', function () {
            $EliminarUsuarios = trim(session('EliminarUsuarios'));
            return $EliminarUsuarios;
        })
        ->make(true);
    }

    protected function crearUsuario(Request $request)
    {
        // $password = base64_encode($request->password);

        User::create([
            'name' => $request['nombre'],
            'username' => $request['usuario'],
            'email' => $request['email'],
            'idDepartamento' => $request['idDepartamento'],
            'idPuesto' => $request['idPuesto'],
            'idPerfil' => $request['idPerfil'],
            // 'password' => $password,
            'password' => Hash::make($request['password']),
        ]);

        $usuario = User::where('email', $request['email'])->first();
        $modulos = DB::table('eti_Modulos')->get();

        foreach ($modulos as $modulo) {
            DB::statement('exec sp_InsertarPermisos ?,?', [
                $usuario->id,
                $modulo->id,
            ]);
        }

        Mail::to($request['email'])->cc(['jesuscabrerag@yahoo.com.mx', 'jesuscabrerag@yahoo.com.mx'])->send(new SendMail($request['usuario'], $request['nombre'], $request['password'], 'Password Acceso AppEticom', 'Bienvenido a la Plataforma AppEticom', $request['email']));
    }

    public function obtenerEmail(Request $request)
    {
        $usuario = User::select('email')->where('email', $request->email)->first();
        return $usuario;
    }

    public function obtenerUsuario(Request $request)
    {
        $usuario = User::where('id', $request->id)->first();
        return $usuario;
    }

    protected function actualizarUsuario(Request $request)
    {
        $usuario = User::where('id', $request->id)->first();
        $usuario->update($request->all());

        return $usuario;
    }

    public function apiModulosPermisos(Request $request)
    {
        $permisos = DB::table('v_eti_ModulosPermisos')->where('idUsuario', $request->id)->get();
        return DataTables::of($permisos)
            ->make(true);
    }

    public function apiDepartamentos()
    {
        $departamentos = eti_Departamentos::all();

        return DataTables::of($departamentos)
            ->make(true);
    }

    protected function crearDepartamento(Request $request)
    {
        return eti_Departamentos::create([
            'nombre' => $request['nombre'],
        ]);
    }

    public function obtenerDepartamento(Request $request)
    {
        $departamento = eti_Departamentos::where('id', $request->id)->first();
        return $departamento;
    }

    protected function actualizarDepartamento(Request $request)
    {
        $departamento = eti_Departamentos::where('id', $request->id)->first();
        $departamento->update($request->all());

        return $departamento;
    }

    public function apiPuestos()
    {
        $puestos = eti_Puestos::all();

        return DataTables::of($puestos)
            ->make(true);
    }

    protected function crearPuesto(Request $request)
    {
        return eti_Puestos::create([
            'nombre' => $request['nombre'],
        ]);
    }

    public function obtenerPuesto(Request $request)
    {
        $puesto = eti_Puestos::where('id', $request->id)->first();
        return $puesto;
    }

    protected function actualizarPuesto(Request $request)
    {
        $puesto = eti_Puestos::where('id', $request->id)->first();
        $puesto->update($request->all());

        return $puesto;
    }

    public function apiPerfiles()
    {
        $perfiles = eti_Perfiles::all();

        return DataTables::of($perfiles)
            ->make(true);
    }

    protected function crearPerfil(Request $request)
    {
        return eti_Perfiles::create([
            'nombre' => $request['nombre'],
        ]);
    }

    public function obtenerPerfil(Request $request)
    {
        $perfil = eti_Perfiles::where('id', $request->id)->first();
        return $perfil;
    }

    protected function actualizarPerfil(Request $request)
    {
        $perfil = eti_Perfiles::where('id', $request->id)->first();
        $perfil->update($request->all());

        return $perfil;
    }

    public function permisoAcceso(Request $request)
    {
        DB::statement('exec sp_etiPermisoAcceso ?,?', [
            $request->check,
            $request->id,
        ]);
    }

    public function permisoCrear(Request $request)
    {
        DB::statement('exec sp_etiPermisoCrear ?,?', [
            $request->check,
            $request->id,
        ]);
    }

    public function permisoEditar(Request $request)
    {
        DB::statement('exec sp_etiPermisoEditar ?,?', [
            $request->check,
            $request->id,
        ]);
    }

    public function permisoEliminar(Request $request)
    {
        DB::statement('exec sp_etiPermisoEliminar ?,?', [
            $request->check,
            $request->id,
        ]);
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
