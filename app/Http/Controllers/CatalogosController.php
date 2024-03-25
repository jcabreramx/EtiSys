<?php

namespace App\Http\Controllers;

use App\Traits\PermisosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CatalogosController extends Controller
{
    use PermisosTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->permisos();
        if (session('AccesoCatalogos') == 1) {
            $combo_tipo = DB::select('exec sp_cat_CP_TiposCliente_SelectAll');
            $combo_grupo = DB::select('exec sp_cat_CP_Grupos_SelectAll');
            $combo_origen = DB::select('exec sp_cat_CP_TiposContacto_SelectAll');
            $combo_agente = DB::select('exec sp_mst_CP_Usuarios_SelectAll');
            $combo_sectores = DB::select('exec sp_cat_CP_Sectores_SelectAll');
            $combo_estados = DB::select('exec sp_cat_CP_Estados_SelectAll');
            // $contactos = det_CP_ContactosEmpresas::paginate(100);
            // $contactos = DB::table('det_CP_ContactosEmpresas')->paginate(100);

            return view('catalogos.index', compact('combo_tipo', 'combo_grupo', 'combo_origen', 'combo_agente', 'combo_sectores', 'combo_estados'));
        } else {
            return redirect()->route('home');
        }
    }

    public function apiAgentes()
    {
        $agentes = DB::table('v_etiAgentes');
        return DataTables::of($agentes)
            ->addColumn('AccesoCatalogos', function () {
                $AccesoCatalogos = trim(session('AccesoCatalogos'));
                return $AccesoCatalogos;
            })
            ->addColumn('EditarCatalogos', function () {
                $EditarCatalogos = trim(session('EditarCatalogos'));
                return $EditarCatalogos;
            })
            ->addColumn('EliminarCatalogos', function () {
                $EliminarCatalogos = trim(session('EliminarCatalogos'));
                return $EliminarCatalogos;
            })
            ->make(true);
    }

    public function obtenerAgente(Request $request)
    {
        $agente = DB::table('v_etiAgentes')->where('Agente', $request->Agente)->get();
        return $agente;
    }

    public function insertarAgente(Request $request)
    {
        DB::statement('exec sp_etiInsertarAgente ?,?,?,?', [
            strtoupper($request->Agente),
            strtoupper($request->NombreAgente),
            $request->Consecutivo,
            $request->Comision,
        ]);

        $agente = DB::table('v_etiAgentes')->where('Agente', $request->Agente)->get();
        return $agente;
    }

    public function actualizarAgente(Request $request)
    {
        DB::statement('exec sp_etiActualizarAgente ?,?,?,?,?', [
            strtoupper($request->Agente),
            strtoupper($request->NombreAgente),
            $request->Consecutivo,
            $request->Comision,
            $request->ClaveAgente,
        ]);

        $agente = DB::table('v_etiAgentes')->where('Agente', $request->Agente)->get();
        return $agente;
    }
}
