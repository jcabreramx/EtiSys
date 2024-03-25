@extends('layouts.app')
@section('content')
    @include('partials.loading')
    @include('catalogos.agentes')
    <div class="container-fluid">

        <div id="card_general" class="card" style="margin-top: 0; display: block">
            <div id="card_bodyCatalogos" class="card-body">
                <div class="row mb-1">
                    <ul class="nav nav-tabs col-sm-12 mb-2" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item" id="nav_item_agentes">
                            <a class="nav-link active" id="agentes-tab" onclick="mostrarAgentes()" data-toggle="pill"
                                role="tab" aria-controls="agentes-tab" aria-selected="true"
                                style="cursor: pointer">Agentes</a>
                        </li>
                        <li class="nav-item" id="nav_item_proveedores">
                            <a class="nav-link" id="proveedores-tab" onclick="mostrarProveedores()" data-toggle="pill"
                                role="tab" aria-controls="proveedores-tab" aria-selected="false"
                                style="cursor: pointer">Proveedores</a>
                        </li>
                        <li class="nav-item" id="nav_item_almacenes">
                            <a class="nav-link" id="almacenes-tab" onclick="mostrarAlmacenes()" data-toggle="pill"
                                role="tab" aria-controls="almacenes-tab" aria-selected="false"
                                style="cursor: pointer">Almacenes</a>
                        </li>
                        <li class="nav-item" id="nav_item_presentaciones">
                            <a class="nav-link" id="presentaciones-tab" onclick="mostrarPresentaciones()" data-toggle="pill"
                                role="tab" aria-controls="presentaciones-tab" aria-selected="false"
                                style="cursor: pointer">Presentaciones</a>
                        </li>
                        <li class="nav-item" id="nav_item_estados">
                            <a class="nav-link" id="estados-tab" onclick="mostrarEstados()" data-toggle="pill"
                                role="tab" aria-controls="estados-tab" aria-selected="false"
                                style="cursor: pointer">Estados</a>
                        </li>
                        <li class="nav-item" id="nav_item_paises">
                            <a class="nav-link" id="paises-tab" onclick="mostrarPaises()" data-toggle="pill" role="tab"
                                aria-controls="paises-tab" aria-selected="false" style="cursor: pointer">Paises</a>
                        </li>
                        <li class="nav-item" id="nav_item_mensajeros">
                            <a class="nav-link" id="mensajeros-tab" onclick="mostrarMensajeros()" data-toggle="pill"
                                role="tab" aria-controls="mensajeros-tab" aria-selected="false"
                                style="cursor: pointer">Mensajeros</a>
                        </li>
                        <li class="nav-item" id="nav_item_actividades_mensajeria">
                            <a class="nav-link" id="actividades_mensajeria-tab" onclick="mostrarActividadesMensajeria()"
                                data-toggle="pill" role="tab" aria-controls="actividades_mensajeria-tab"
                                aria-selected="false" style="cursor: pointer">Actividades de Mensajeria</a>
                        </li>
                        <li class="nav-item" id="nav_item_tipos_cambio">
                            <a class="nav-link" id="tipos_cambio-tab" onclick="mostrarTiposCambio()" data-toggle="pill"
                                role="tab" aria-controls="tipos_cambio-tab" aria-selected="false"
                                style="cursor: pointer">Tipos de Cambio</a>
                        </li>
                        <li class="nav-item" id="nav_item_conceptos_bonificaciones">
                            <a class="nav-link" id="conceptos_bonificaciones-tab"
                                onclick="mostrarConceptosBonificaciones()" data-toggle="pill" role="tab"
                                aria-controls="conceptos_bonificaciones-tab" aria-selected="false"
                                style="cursor: pointer">Conceptos de Bonificaciones</a>
                        </li>
                        <li class="nav-item" id="nav_item_conceptos_deducciones">
                            <a class="nav-link" id="conceptos_deducciones-tab" onclick="mostrarConceptosDeducciones()"
                                data-toggle="pill" role="tab" aria-controls="conceptos_deducciones-tab"
                                aria-selected="false" style="cursor: pointer">Conceptos de Deducciones</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="div_catalogos">
                        <div class="tab-pane fade show active" id="agentes" role="tabpanel"
                            aria-labelledby="agentes-tab">
                            <div class="box_tooltip">
                                <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Agente') }}
                                    class="box" alt="NUEVO CATALOGO" id="btnNuevoAgente" onclick="nuevoAgente()"
                                    type="button">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                            <div class="col-lg-12 justify-content-sm-center">
                                <div class="col-lg-12 input-group input-group-sm">
                                </div>
                            </div>
                            <div id="catalogosDiv" class="col-lg-12">
                                <table id="tblAgentes" class="hover stripe compact nowrap tblnombre"
                                    style="font-size: 70% !important; width: 100%;">
                                    <thead>
                                        <tr class="bg-blue-table">
                                            <th>Clave</th>
                                            <th>Nombre</th>
                                            <th>Consecutivo</th>
                                            <th>Comision</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-blue-table">
                                            <th colspan="5"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="proveedores" role="tabpanel" aria-labelledby="proveedores-tab">
                            <div class="box_tooltip">
                                <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Proveedor') }}
                                    class="box" alt="NUEVO PROVEEDOR" id="btnNuevoProveedor" onclick="nuevoProveedor()"
                                    type="button">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="almacenes" role="tabpanel" aria-labelledby="almacenes-tab">
                        </div>
                        <div class="tab-pane fade" id="presentaciones" role="tabpanel"
                            aria-labelledby="presentaciones-tab">
                        </div>
                        <div class="tab-pane fade" id="estados" role="tabpanel" aria-labelledby="estados-tab">
                        </div>
                        <div class="tab-pane fade" id="paises" role="tabpanel" aria-labelledby="paises-tab">
                        </div>
                        <div class="tab-pane fade" id="mensajeros" role="tabpanel" aria-labelledby="mensajeros-tab">
                        </div>
                        <div class="tab-pane fade" id="actividades_mensajeria" role="tabpanel"
                            aria-labelledby="actividades_mensajeria-tab">
                        </div>
                        <div class="tab-pane fade" id="tipos_cambio" role="tabpanel" aria-labelledby="tipos_cambio-tab">
                        </div>
                        <div class="tab-pane fade" id="conceptos_bonificaciones" role="tabpanel"
                            aria-labelledby="conceptos_bonificaciones-tab">
                        </div>
                        <div class="tab-pane fade" id="conceptos_deducciones" role="tabpanel"
                            aria-labelledby="conceptos_deducciones-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/catalogos.js" defer></script>
@endsection
