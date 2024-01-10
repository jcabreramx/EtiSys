<?php

namespace App\Http\Controllers;

use App\Models\det_CP_ContactosEmpresas;
use App\Models\mst_CP_Empresas;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // $page = request('page', 1);
        // $pageSize = 15;
        // $results = DB::select('SET NOCOUNT ON; EXEC sp_mst_CP_Empresas_Buscar ?, ?, ?, ?, ?, ?, ?, ?', [
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        // ]);
        // $offset = ($page * $pageSize) - $pageSize;
        // $data = array_slice($results, $offset, $pageSize, true);
        // $clientes = new LengthAwarePaginator($data, count($data), $pageSize, $page);
        // ini_set('max_execution_time', 180); //3 minutes

        // $clientes = DB::table('v_Empresas')->paginate(100);

        // return $clientes;

        // $clientes = DB::select('SET NOCOUNT ON; EXEC sp_mst_CP_Empresas_Buscar ?, ?, ?, ?, ?, ?, ?, ?', [
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        // ]);
        // $links = $clientes->links();

        $combo_tipo = DB::select('exec sp_cat_CP_TiposCliente_SelectAll');
        $combo_grupo = DB::select('exec sp_cat_CP_Grupos_SelectAll');
        $combo_origen = DB::select('exec sp_cat_CP_TiposContacto_SelectAll');
        $combo_agente = DB::select('exec sp_mst_CP_Usuarios_SelectAll');
        $combo_sectores = DB::select('exec sp_cat_CP_Sectores_SelectAll');
        $combo_estados = DB::select('exec sp_cat_CP_Estados_SelectAll');
        // $contactos = det_CP_ContactosEmpresas::paginate(100);
        // $contactos = DB::table('det_CP_ContactosEmpresas')->paginate(100);

        return view('clientes.index', compact('combo_tipo', 'combo_grupo', 'combo_origen', 'combo_agente', 'combo_sectores', 'combo_estados'));
    }

    public function apiClientes(Request $request)
    {
        // return $request;
        if ($request->nombre == null) {
            $nombre = '';
        } else {
            $nombre = $request->nombre;
        }

        if ($request->nombreCorto == null) {
            $nombreCorto = '';
        } else {
            $nombreCorto = $request->nombreCorto;
        }

        if ($request->origen == null) {
            $origen = '';
        } else {
            $origen = $request->origen;
        }

        if ($request->tipo == null) {
            $tipo = '';
        } else {
            $tipo = $request->tipo;
        }

        if ($request->grupo == null) {
            $grupo = '';
        } else {
            $grupo = $request->grupo;
        }

        if ($request->agente == null) {
            $agente = '';
        } else {
            $agente = $request->agente;
        }

        if ($request->grupoIds == null) {
            $grupoIds = '';
        } else {
            $grupoIds = $request->grupoIds;
        }

        if ($request->ultimaLetra == null) {
            $ultimaLetra = '';
        } else {
            $ultimaLetra = $request->ultimaLetra;
        }

        if ($nombre != null || $nombreCorto != null || $origen != null || $tipo != null || $grupo != null || $agente != null || $grupoIds != null || $ultimaLetra != null) {
            $clientes = DB::select('exec sp_mst_CP_Empresas_Buscar ?, ?, ?, ?, ?, ?, ?, ?', [
                $nombre,
                $nombreCorto,
                $origen,
                $tipo,
                $grupo,
                $agente,
                $grupoIds,
                $ultimaLetra,

                // $nombre,
                // $nombreCorto,
                // $origen,
                // $tipo,
                // $grupo,
                // $agente,
                // $grupoIds,
                // $ultimaLetra,
            ]);
        } else {
            // $count = count(DB::table('v_Empresas')->get());
            $clientes = DB::table('v_Empresas')->limit(1000)->get();
            // $clientes = DB::table('v_Empresas')->where('vchEmpresaID', '>', '00064426')->get();
        }


        return DataTables::of($clientes)
            ->make(true);
    }

    public function apiContactos(Request $request)
    {

        if ($request->empresaId == null) {
            $id = '';
        } else {
            $id = $request->empresaId;
        }

        $contactos = DB::select('sp_det_CP_ContactosEmpresas_SelectByEmpresaId ?', [$id]);

        return DataTables::of($contactos)
            ->make(true);
    }

    public function apiContactosAll(Request $request)
    {
        if ($request->empresaId == null) {
            $id = '';
        } else {
            $id = $request->empresaId;
        }





        // $contactos = det_CP_ContactosEmpresas::where('chContactoID', 'like', '%' . $chContactoID .  '%')
        //                 ->orWhere('Solicitante', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Maquina', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Departamento', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Mes', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Titulo', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Categoria', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Asignado', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Prioridad', 'like', '%' . $texto .  '%')
        //                 ->orWhere('Folio', 'like', '%' . $texto .  '%');










        ini_set('max_execution_time', 180); //3 minutes
        // $contactos = DB::table('det_CP_ContactosEmpresas')->limit(100)->get();
        // $contactos = det_CP_ContactosEmpresas::all()->paginate(100);
        $contactos = det_CP_ContactosEmpresas::limit(100)->get();

        // return view('index', compact('$contactos'));
        return DataTables::of($contactos)
            ->addIndexColumn()
            ->make(true);
    }

    public function apiContactosTel(Request $request)
    {
        $empresaId = $request->empresaId;
        $id = $request->contactoId;
        $contactosTel = DB::select('sp_det_CP_TelefonosContactos_SelectByContactoID ?, ?', [$empresaId, $id]);

        return DataTables::of($contactosTel)
            ->make(true);
    }

    public function getCliente(Request $request)
    {
        $cliente = DB::select('exec sp_mst_CP_Empresas_SelectById ?', [$request->id]);
        return $cliente;
    }

    public function guardarCliente(Request $request)
    {
        $folio_max = Db::table('mst_CP_Empresas')->max('vchEmpresaID');
        $folio = '000' . ($folio_max + 1);
        // $fecha = new DateTime();

        $vchEmpresaID = $folio;
        $chGrupo = $request->chGrupo;
        $chPersonaFiscal = $request->chPersonaFiscal;
        $datFechaAlta =  date('Y-m-d H:i:s');
        $sdatFechaCambio = date('Y-m-d H:i:s');
        $txtNotas = $request->txtNotas;
        $vchAgente = $request->vchAgente;
        $vchCP = $request->vchCP;
        $vchCadena = $request->vchCadena;
        $vchCalle = $request->vchCalle;
        $vchCampoLibre1 = $request->vchCampoLibre1;
        $vchCampoLibre2 = $request->vchCampoLibre2;
        $vchCiudad = $request->vchCiudad;
        $vchClave = $request->vchClave;
        $vchColonia = $request->vchColonia;
        $vchCondicionesPago = $request->vchCondicionesPago;
        $vchCuenta = $request->vchCuenta;
        $vchCurp = $request->vchCurp;
        $vchEntreCalles = $request->vchEntreCalles;
        $vchEstado = $request->vchEstado;
        $vchFormaPago = $request->vchFormaPago;
        $vchMailFE = $request->vchMailFE;
        $vchMunicipio = $request->vchMunicipio;
        $vchNombre = $request->vchNombre;
        $vchNombreCorto = $request->vchNombreCorto;
        $vchNumeroExterior = $request->vchNumeroExterior;
        $vchNumeroInterior = $request->vchNumeroInterior;
        $vchOrigen = $request->vchOrigen;
        $vchProducto = $request->vchProducto;
        $vchRFC = $request->vchRFC;
        $vchSector = $request->vchSector;
        $vchTipoCliente = $request->vchTipoCliente;
        $vchUltimoResultado = $request->vchUltimoResultado;
        $vchUsuarioAlta = 1;
        $vchUsuarioCambio = 1;
        $vchWeb = $request->vchWeb;

        $data = [
            'vchEmpresaID' => $vchEmpresaID,
            'vchTipoCliente' => $vchTipoCliente,
            'vchClave' => $vchClave,
            'vchNombre' => $vchNombre,
            'vchNombreCorto' => $vchNombreCorto,
            'vchCadena' => $vchCadena,
            'vchSector' => $vchSector,
            'vchOrigen' => $vchOrigen,
            'vchRFC' => $vchRFC,
            'vchCurp' => $vchCurp,
            'chPersonaFiscal' => $chPersonaFiscal,
            'vchCalle' => $vchCalle,
            'vchEntreCalles' => $vchEntreCalles,
            'vchColonia' => $vchColonia,
            'vchCiudad' => $vchCiudad,
            'vchCP' => $vchCP,
            'vchEstado' => $vchEstado,
            'vchPlano' => null,
            'vchAgente' => $vchAgente,
            'vchWeb' => $vchWeb,
            'chGrupo' => $chGrupo,
            'vchUltimoResultado' => $vchUltimoResultado,
            'vchCondicionesPago' => $vchCondicionesPago,
            'vchProducto' => $vchProducto,
            'vchCampoLibre1' => $vchCampoLibre1,
            'txtNotas' => $txtNotas,
            'datFechaAlta' => $datFechaAlta,
            'vchUsuarioAlta' => $vchUsuarioAlta,
            'sdatFechaCambio' => $sdatFechaCambio,
            'vchUsuarioCambio' => $vchUsuarioCambio,
            'vchNumeroExterior' => $vchNumeroExterior,
            'vchNumeroInterior' => $vchNumeroInterior,
            'vchMunicipio' => $vchMunicipio,
            'vchMailFE' => $vchMailFE,
            'vchCampoLibre2' => $vchCampoLibre2,
            'vchFormaPago' => $vchFormaPago,
            'vchCuenta' => $vchCuenta,
        ];

        // return $data;

        mst_CP_Empresas::create($data);

        // $privilegios = session('privilegios');
        // $id_ticket = Db::table('TicketsMtto')->max('Id_Ticket');
        // $ticket = v_TicketsMtto::where('Id_Ticket', $id_ticket)->first();
        // $alertasPlantillas = catPlantillasAlertas::get();

        // if ($ticket->CorreoSolicitante == null) {
        //     $cuenta_usuario = $alertasPlantillas[0]->Destinatario;
        // } else {
        //     $cuenta_usuario = $ticket->CorreoSolicitante;
        // }

        // if ($ticket->CorreoOperador == null) {
        //     $cuenta_cc1 = $alertasPlantillas[0]->Destinatario;
        // } else {
        //     $cuenta_cc1 = $ticket->CorreoOperador;
        // }

        // $nombre_proyecto = $ticket->Titulo;
        // $folio = $ticket->Folio;
        // $route = "Mantenimiento";
        // $nombre_agente = $ticket->Solicitante;
        // $fecha_solicitud = $ticket->FechaRegistro;
        // $asignadoA = $ticket->Asignado;

        // if ($datos_usuario[0]->Correo == null || $datos_usuario[0]->Correo == '') {
        //     $cuenta_cc2 = $alertasPlantillas[0]->Destinatario;
        // } else {
        //     if ($privilegios == 1) {
        //         $cuenta_cc2 = $alertasPlantillas[0]->Destinatario;
        //     } else {
        //         $cuenta_cc2 = $datos_usuario[0]->Correo;
        //     }
        // }

        // if ($request->Correo != null) {
        //     $cuenta_cc3 = $request->Correo;
        // } else {
        //     $cuenta_cc3 = $alertasPlantillas[0]->CopiarA;
        // }

        // $subject = $alertasPlantillas[0]->Asunto;
        // $mensaje = $alertasPlantillas[0]->Mensaje;

        // Mail::to($cuenta_usuario)->cc([$cuenta_cc1, $cuenta_cc2, $cuenta_cc3])->send(new SendMailMantenimiento($alertasPlantillas[0], $nombre_proyecto, $folio, $subject, $nombre_agente, $route, $fecha_solicitud, $mensaje, $asignadoA, $motivo_cancelacion, $motivo_cambio_fecha));

        // $this->bitacoraMtto('TICKET CREADO', $folio, $id_ticket, $solicitante, null, null, $fecha_registro);






    }

    public function create()
    {
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
