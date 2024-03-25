<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait PermisosTrait
{
    // public static function permiso()
    // {
    //     $id = Auth::user()->id;
    //     $permisos = DB::select('exec sp_etiPermisosXUsuario @idUsuario=' . $id);

    //     return $permisos;
    // }

    public static function permisos()
    {
        $modulos = DB::table('eti_Modulos')->get();
        $id = Auth::user()->id;

        foreach ($modulos as $modulo) {


            // if ($permisos != null) {
            //     session(['rol_usuario' => $permisos[0]->idRol]);
            //     session(['rol_usuario_admin' => $permisos[0]->idRol]);
            // } else {
            //     session(['rol_usuario' => 8]);
            // }

            if ($modulo->modulo === 'Usuarios') {
                $permisos = DB::table('v_eti_ModulosPermisos')->where('idUsuario', $id)->where('idModulo', $modulo->id)->get();
                $permisos_count = count($permisos);

                for ($i = 0; $i < $permisos_count; $i++) {

                    if ($permisos[$i]->acceso == 1) {
                        session(['AccesoUsuarios' => 1]);
                    } else {
                        session(['AccesoUsuarios' => 0]);
                    }

                    if ($permisos[$i]->crear == 1) {
                        session(['CrearUsuarios' => 1]);
                    } else {
                        session(['CrearUsuarios' => 0]);
                    }

                    if ($permisos[$i]->editar == 1) {
                        session(['EditarUsuarios' => 1]);
                    } else {
                        session(['EditarUsuarios' => 0]);
                    }

                    if ($permisos[$i]->eliminar == 1) {
                        session(['EliminarUsuarios' => 1]);
                    } else {
                        session(['EliminarUsuarios' => 0]);
                    }

                }
            } else if ($modulo->modulo == 'Catalogos') {

                $permisos = DB::table('v_eti_ModulosPermisos')->where('idUsuario', $id)->where('idModulo', $modulo->id)->get();
                $permisos_count = count($permisos);

                for ($i = 0; $i < $permisos_count; $i++) {

                    if ($permisos[$i]->acceso == 1) {
                        session(['AccesoCatalogos' => 1]);
                    } else {
                        session(['AccesoCatalogos' => 0]);
                    }

                    if ($permisos[$i]->crear == 1) {
                        session(['CrearCatalogos' => 1]);
                    } else {
                        session(['CrearCatalogos' => 0]);
                    }

                    if ($permisos[$i]->editar == 1) {
                        session(['EditarCatalogos' => 1]);
                    } else {
                        session(['EditarCatalogos' => 0]);
                    }

                    if ($permisos[$i]->eliminar == 1) {
                        session(['EliminarCatalogos' => 1]);
                    } else {
                        session(['EliminarCatalogos' => 0]);
                    }

                }

            } else if ($modulo->modulo == 'Clientes') {

                $permisos = DB::table('v_eti_ModulosPermisos')->where('idUsuario', $id)->where('idModulo', $modulo->id)->get();
                $permisos_count = count($permisos);

                for ($i = 0; $i < $permisos_count; $i++) {

                    if ($permisos[$i]->acceso == 1) {
                        session(['AccesoClientes' => 1]);
                    } else {
                        session(['AccesoClientes' => 0]);
                    }

                    if ($permisos[$i]->crear == 1) {
                        session(['CrearClientes' => 1]);
                    } else {
                        session(['CrearClientes' => 0]);
                    }

                    if ($permisos[$i]->editar == 1) {
                        session(['EditarClientes' => 1]);
                    } else {
                        session(['EditarClientes' => 0]);
                    }

                    if ($permisos[$i]->eliminar == 1) {
                        session(['EliminarClientes' => 1]);
                    } else {
                        session(['EliminarClientes' => 0]);
                    }

                }

            } else if ($modulo->modulo == 'Facturacion') {

                $permisos = DB::table('v_eti_ModulosPermisos')->where('idUsuario', $id)->where('idModulo', $modulo->id)->get();
                $permisos_count = count($permisos);

                for ($i = 0; $i < $permisos_count; $i++) {

                    if ($permisos[$i]->acceso == 1) {
                        session(['AccesoFacturacion' => 1]);
                    } else {
                        session(['AccesoFacturacion' => 0]);
                    }

                    if ($permisos[$i]->crear == 1) {
                        session(['CrearFacturacion' => 1]);
                    } else {
                        session(['CrearFacturacion' => 0]);
                    }

                    if ($permisos[$i]->editar == 1) {
                        session(['EditarFacturacion' => 1]);
                    } else {
                        session(['EditarFacturacion' => 0]);
                    }

                    if ($permisos[$i]->eliminar == 1) {
                        session(['EliminarFacturacion' => 1]);
                    } else {
                        session(['EliminarFacturacion' => 0]);
                    }

                }
            } else if ($modulo->modulo == 'CxC') {

                $permisos = DB::table('v_eti_ModulosPermisos')->where('idUsuario', $id)->where('idModulo', $modulo->id)->get();
                $permisos_count = count($permisos);

                for ($i = 0; $i < $permisos_count; $i++) {

                    if ($permisos[$i]->acceso == 1) {
                        session(['AccesoCxC' => 1]);
                    } else {
                        session(['AccesoCxC' => 0]);
                    }

                    if ($permisos[$i]->crear == 1) {
                        session(['CrearCxC' => 1]);
                    } else {
                        session(['CrearCxC' => 0]);
                    }

                    if ($permisos[$i]->editar == 1) {
                        session(['EditarCxC' => 1]);
                    } else {
                        session(['EditarCxC' => 0]);
                    }

                    if ($permisos[$i]->eliminar == 1) {
                        session(['EliminarCxC' => 1]);
                    } else {
                        session(['EliminarCxC' => 0]);
                    }

                }

            }
        }
    }

}
