@extends('layouts.app')
@section('content')
    @include('partials.loading')
    @include('auth.register')
    @include('usuarios.permisos')
    @include('departamentos.addOrEdit')
    @include('puestos.addOrEdit')
    @include('perfiles.addOrEdit')
    <div class="container-fluid">

        <div id="card_general" class="card" style="margin-top: 0; display: block">
            {{-- <input type="hidden" id="conteo_activo">
            <input type="hidden" id="Gestion_Id">
            <input type="hidden" id="cerrado">
            <input type="hidden" id="ajustes">
            <input type="hidden" id="nombre" value="{{ $nombre }}"> --}}
            <div id="card_bodyUsuarios" class="card-body">
                <div class="row mb-1">
                    <ul class="nav nav-tabs col-sm-12 mb-2" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item" id="nav_item_usuarios">
                            <a class="nav-link active" id="usuarios-tab" onclick="mostrarUsuarios()" data-toggle="pill"
                                role="tab" aria-controls="usuarios-tab" aria-selected="true"
                                style="cursor: pointer">Usuarios</a>
                        </li>
                        <li class="nav-item" id="nav_item_departamentos">
                            <a class="nav-link" id="departamentos-tab" onclick="mostrarDepartamentos()" data-toggle="pill"
                                role="tab" aria-controls="departamentos-tab" aria-selected="false"
                                style="cursor: pointer">Departamentos</a>
                        </li>
                        <li class="nav-item" id="nav_item_puestos">
                            <a class="nav-link" id="puestos-tab" onclick="mostrarPuestos()" data-toggle="pill"
                                role="tab" aria-controls="puestos-tab" aria-selected="false"
                                style="cursor: pointer">Puestos</a>
                        </li>
                        <li class="nav-item" id="nav_item_perfiles">
                            <a class="nav-link" id="perfiles-tab" onclick="mostrarPerfiles()" data-toggle="pill"
                                role="tab" aria-controls="perfiles-tab" aria-selected="false"
                                style="cursor: pointer">Perfiles</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="div_usuarios">
                        <div class="tab-pane fade show active" id="usuarios" role="tabpanel"
                            aria-labelledby="usuarios-tab">
                            <div class="col-lg-12 justify-content-sm-center">
                                <div class="col-lg-12 input-group input-group-sm">
                                </div>
                            </div>
                            @if (session('AccesoUsuarios') == 1 && session('CrearUsuarios') == 1)
                                <div class="box_tooltip">
                                    <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Usuario') }}
                                        class="box" alt="NUEVO USUARIO" id="btnNuevoUsuario" onclick="nuevoUsuario()"
                                        type="button">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            @else
                                <div class="box_tooltip">
                                    <button class="box" type="button" style="cursor: not-allowed">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            @endif
                            <div id="usuariosDiv">
                                <table id="tblUsuarios" class="hover stripe compact nowrap tblnombre"
                                    style="font-size: 70% !important; width: 100%">
                                    <thead>
                                        <tr class="bg-blue-table">
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Fecha Creación</th>
                                            <th>Permisos</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="bg-blue-table">
                                            <th colspan="7"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="departamentos" role="tabpanel" aria-labelledby="departamentos-tab">
                            <div class="col-lg-12 justify-content-sm-center">
                                <div class="col-lg-12 input-group input-group-sm">
                                </div>
                            </div>
                            <div class="box_tooltip">
                                <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Departamento') }}
                                    class="box" alt="NUEVO DEPARTAMENTO" id="btnNuevoDepartamento"
                                    onclick="nuevoDepartamento()" type="button">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                            <div id="departamentosDiv">
                                <table id="tblDepartamentos" class="hover stripe compact nowrap tblnombre"
                                    style="font-size: 70% !important; width: 100%">
                                    <thead>
                                        <tr class="bg-blue-table">
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Estatus</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="bg-blue-table">
                                            <th colspan="5"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="puestos" role="tabpanel" aria-labelledby="puestos-tab">
                            <div class="col-lg-12 justify-content-sm-center">
                                <div class="col-lg-12 input-group input-group-sm">
                                </div>
                            </div>
                            <div class="box_tooltip">
                                <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Puesto') }}
                                    class="box" alt="NUEVO PUESTO" id="btnNuevoPuesto" onclick="nuevoPuesto()"
                                    type="button">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                            <div id="puestosDiv">
                                <table id="tblPuestos" class="hover stripe compact nowrap tblnombre"
                                    style="font-size: 70% !important; width: 100%">
                                    <thead>
                                        <tr class="bg-blue-table">
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Estatus</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="bg-blue-table">
                                            <th colspan="5"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="perfiles" role="tabpanel" aria-labelledby="perfiles-tab">
                            <div class="col-lg-12 justify-content-sm-center">
                                <div class="col-lg-12 input-group input-group-sm">
                                </div>
                            </div>
                            <div class="box_tooltip">
                                <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Perfil') }}
                                    class="box" alt="NUEVO PERFIL" id="btnNuevoPerfil" onclick="nuevoPerfil()"
                                    type="button">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                            <div id="perfilesDiv">
                                <table id="tblPerfiles" class="hover stripe compact nowrap tblnombre"
                                    style="font-size: 70% !important; width: 100%">
                                    <thead>
                                        <tr class="bg-blue-table">
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Estatus</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="bg-blue-table">
                                            <th colspan="5"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('auth.register') --}}
    <script src="js/usuarios.js" defer></script>
@endsection
