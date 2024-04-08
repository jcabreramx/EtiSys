<div class="modal fullscreen-modal fade" id="AddOrEditClienteNET" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formAddOrEditClienteNET">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header bg-gray row text-center" id="headerCliente">
                    <h4 class="modal-title ml-2" id="titleCliente" style="margin-top: -12px">Cliente</h4>
                </div>
                <div class="modal-body p-2">
                    <ul class="nav nav-tabs col-sm-12 mb-2" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item col-lg-3" id="nav_item_clientes_edit">
                            <a class="nav-link active" id="clientes_edit-tab" onclick="mostrarClientesModal()"
                                data-toggle="pill" role="tab" aria-controls="clientes_edit-tab" aria-selected="true"
                                style="cursor: pointer">Datos de Cliente / Prospecto</a>
                        </li>
                        <li class="nav-item col-lg-3" id="nav_item_contactos_edit">
                            <a class="nav-link" id="contactos_edit-tab" onclick="mostrarContactosModal()"
                                data-toggle="pill" role="tab" aria-controls="contactos_edit-tab"
                                aria-selected="false" style="cursor: pointer">Contactos</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="div_contactos_cliente">
                        <div class="tab-pane fade show active" id="clientes_edit" role="tabpanel"
                            aria-labelledby="clientes_edit-tab">
                            <div class="row" style="height: 74vh">
                                <div class="col-lg-6">
                                    <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2">
                                        <div class="row">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchClave">Clave : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-3" style="text-align: left">
                                                <input class="form-control" type="text" name="vchClave"
                                                    id="vchClave">
                                            </div>
                                            <div class="col-lg-1" style="text-align: right">
                                                <label class="form-label" for="vchAgente">Agente : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-6" style="text-align: left">
                                                <select id="vchAgente" name="vchAgente" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    @foreach ($combo_agente as $agente)
                                                        <option value="{{ $agente->vchUsuarioID }}">
                                                            ({{ $agente->vchUsuarioID }})
                                                            {{ $agente->vchNombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchNombre">Nombre :
                                                    &nbsp;&nbsp;&nbsp;&nbsp;(Razón Social)</label>
                                            </div>
                                            <div class="col-lg-10 mb-3" style="text-align: left">
                                                <textarea class="form-control" name="vchNombre" id="vchNombre" rows="2" style="height: 50px"></textarea>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchNombreCorto">Nombre Corto :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-10" style="text-align: left">
                                                <input class="form-control" type="text" name="vchNombreCorto"
                                                    id="vchNombreCorto">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchCadena">Cadena : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-5" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCadena"
                                                    id="vchCadena">
                                            </div>
                                            <div class="col-lg-5" style="text-align: left">
                                                <select id="vchTipoCliente" name="vchTipoCliente" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    @foreach ($combo_tipo as $tipo)
                                                        <option value="{{ $tipo->vchTipoClienteID }}">
                                                            ({{ $tipo->vchTipoClienteID }})
                                                            {{ $tipo->vchDescripcion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0">
                                        <div class="row">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchSector">Sector : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <select id="vchSector" name="vchSector" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    @foreach ($combo_sectores as $sector)
                                                        <option value="{{ $sector->vchSectorID }}">
                                                            ({{ $sector->vchSectorID }})
                                                            {{ $sector->vchDescripcion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchOrigen">Origen : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <select id="vchOrigen" name="vchOrigen" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    @foreach ($combo_origen as $origen)
                                                        <option value="{{ $origen->vchOrigenID }}">
                                                            ({{ $origen->vchOrigenID }})
                                                            {{ $origen->vchDescripcion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="chPersonaFiscal">Pers. Fiscal :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <select id="chPersonaFiscal" name="chPersonaFiscal" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    <option value="M">(M) MORAL</option>
                                                    <option value="F">(F) FISICA</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchRFC">RFC : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <input class="form-control" type="text" name="vchRFC"
                                                    id="vchRFC">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-6"></div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchCurp">CURP : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCurp"
                                                    id="vchCurp">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchCalle">Calle : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-6" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCalle"
                                                    id="vchCalle">
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchNumeroExterior">Num. Ext :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-2" style="text-align: left">
                                                <input class="form-control" type="text" name="vchNumeroExterior"
                                                    id="vchNumeroExterior">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchEntreCalles">Entre Calles :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-6" style="text-align: left">
                                                <input class="form-control" type="text" name="vchEntreCalles"
                                                    id="vchEntreCalles">
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchNumeroInterior">Num. Int :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-2" style="text-align: left">
                                                <input class="form-control" type="text" name="vchNumeroInterior"
                                                    id="vchNumeroInterior">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchCP">CP : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-3" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCP"
                                                    id="vchCP">
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchColonia">Colonia : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-5" style="text-align: left">
                                                <input class="form-control" type="text" name="vchColonia"
                                                    id="vchColonia">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchMunicipio">Alc./Municipio :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-10" style="text-align: left">
                                                <input class="form-control" type="text" name="vchMunicipio"
                                                    id="vchMunicipio">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchCiudad">Ciudad : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-10" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCiudad"
                                                    id="vchCiudad">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchEstado">Estado : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <select id="vchEstado" name="vchEstado" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    @foreach ($combo_estados as $estados)
                                                        <option value="{{ $estados->vchEstadoID }}">
                                                            ({{ $estados->vchEstadoID }})
                                                            {{ $estados->vchDescripcion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="chGrupo">Grupo : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-4" style="text-align: left">
                                                <select id="chGrupo" name="chGrupo" class="form-select text-uppercase"
                                                    style="border-radius: 5px">
                                                    <option value=""></option>
                                                    @foreach ($combo_grupo as $grupo)
                                                        <option value="{{ $grupo->chGrupoID }}">
                                                            ({{ $grupo->chGrupoID }})
                                                            {{ $grupo->varDescripcion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchWeb">WEB : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-9" style="text-align: left">
                                                <input class="form-control" type="text" name="vchWeb"
                                                    id="vchWeb">
                                            </div>
                                            <div class="col-lg-1" style="text-align: left">
                                                <input class="form-control" type="text" name="vchWeb"
                                                    id="vchWeb">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchFormaPago">Forma Pago :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-5" style="text-align: left">
                                                <input class="form-control" type="text" name="vchFormaPago"
                                                    id="vchFormaPago">
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchCuenta">Cuenta : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-3" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCuenta"
                                                    id="vchCuenta">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchMailFE">Mail F.E. : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-10" style="text-align: left">
                                                <input class="form-control" type="text" name="vchMailFE"
                                                    id="vchMailFE">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchUsuarioAlta">Alta : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-2" style="text-align: left">
                                                <input class="form-control" type="text" name="vchUsuarioAlta"
                                                    id="vchUsuarioAlta" readonly>
                                            </div>
                                            <div class="col-lg-2" style="text-align: left">
                                                <input class="form-control" type="text" name="datFechaAlta"
                                                    id="datFechaAlta" readonly>
                                            </div>
                                            <div class="col-lg-2" style="text-align: right">
                                                <label class="form-label" for="vchUsuarioCambio">Ult. Cambio :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-2" style="text-align: left">
                                                <input class="form-control" type="text" name="vchUsuarioCambio"
                                                    id="vchUsuarioCambio" readonly>
                                            </div>
                                            <div class="col-lg-2" style="text-align: left">
                                                <input class="form-control" type="text" name="sdatFechaCambio"
                                                    id="sdatFechaCambio" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2">
                                        <div class="row">
                                            <div class="col-lg-3" style="text-align: right">
                                                <label class="form-label" for="vchUltimoResultado">Último Resultado :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-9" style="text-align: left">
                                                <input class="form-control" type="text" name="vchUltimoResultado"
                                                    id="vchUltimoResultado">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-3" style="text-align: right">
                                                <label class="form-label" for="vchCondicionesPago">Condiciones de Pago
                                                    :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-9" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCondicionesPago"
                                                    id="vchCondicionesPago">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-3" style="text-align: right">
                                                <label class="form-label" for="vchProducto">Producto : &nbsp;</label>
                                            </div>
                                            <div class="col-lg-9" style="text-align: left">
                                                <input class="form-control" type="text" name="vchProducto"
                                                    id="vchProducto">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-3" style="text-align: right">
                                                <label class="form-label" for="vchCampoLibre1">Campo Libre :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-9" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCampoLibre1"
                                                    id="vchCampoLibre1">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -5px;">
                                            <div class="col-lg-3" style="text-align: right">
                                                <label class="form-label" for="vchCampoLibre2">Campo Libre 2 :
                                                    &nbsp;</label>
                                            </div>
                                            <div class="col-lg-9" style="text-align: left">
                                                <input class="form-control" type="text" name="vchCampoLibre2"
                                                    id="vchCampoLibre2">
                                            </div>
                                        </div>
                                    </div>
                                    <label class="form-label ms-2 bg-white">Notas</label>
                                    <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2" style="margin-top: -22px">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <button class="btn rounded-btn btn-sm"><i
                                                        class="fas fa-file"></i></button>
                                            </div>
                                            <div class="col-lg-1">
                                                <label for="buscarNota" class="form-label">Buscar</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" name="buscarNota" id="buscarNota"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row container" style="height: 42.5vh">
                                            <textarea style="font-size: 10px; font-weight: bold; height: 300px; text-transform: uppercase" class="form-control"
                                                name="txtNotas" id="txtNotas" cols="30" rows="10" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="contactos_edit" role="tabpanel"
                            aria-labelledby="contactos_edit-tab">
                            <label class="form-label ms-2 bg-white">Cliente / Prospecto</label>
                            <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2" style="margin-top: -22px">

                                <div class="row">
                                    <div class="col-lg-1" style="text-align: right">
                                        <label class="form-label" for="vchClaveCon">Clave : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-3" style="text-align: left">
                                        <input class="form-control" type="text" name="vchClaveCon"
                                            id="vchClaveCon" disabled>
                                    </div>
                                    <div class="col-lg-1" style="text-align: right">
                                        <label class="form-label" for="vchNombreCon">Nombre : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-7" style="text-align: left">
                                        <input class="form-control" type="text" name="vchNombreCon"
                                            id="vchNombreCon" disabled>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2">
                                <div class="row" style="height: 62vh">
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                                            Agregar</button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i>
                                            Modificar</button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i>
                                            Eliminar</button>
                                    </div>

                                    <div class="col-lg-8">
                                        <label class="form-label ms-2 bg-white">Lista de Contactos (Doble Click para enviar por Mail)</label>
                                        <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2" style="margin-top: -22px">








                                            <div class="row mb-1">
                                                <div id="contactosDivEdit" class="col-lg-12">
                                                    <table id="tblContactosEdit" class="hover stripe compact nowrap tblnombre"
                                                        style="font-size: 70% !important; width: 100%">
                                                        <thead>
                                                            <tr class="bg-blue-table">
                                                                <th>N°</th>
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>Puesto</th>
                                                                <th>Email</th>
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
                                    <div class="col-lg-4">
                                        <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2">






                                            <div id="telContactosDivEdit" class="col-lg-12">
                                                <table id="tblContactosTelEdit" class="hover stripe compact nowrap tblnombre"
                                                    style="font-size: 70% !important; width: 100%">
                                                    <thead>
                                                        <tr class="bg-blue-table">
                                                            <th>Teléfono</th>
                                                            <th>Tipo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                    <tfoot>
                                                        <tr class="bg-blue-table">
                                                            <th colspan="2"></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>




                                        </div>
                                        <label class="form-label ms-2 bg-white">Notas</label>
                                        <div class="border rounded-3 pt-2 pe-2 ps-2 pb-0 mb-2"
                                            style="margin-top: -22px">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <button class="btn rounded-btn btn-sm"><i
                                                            class="fas fa-file"></i></button>
                                                </div>
                                                <div class="col-lg-1">
                                                    <label for="buscarNota" class="form-label">Buscar</label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" name="buscarNota" id="buscarNota"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <textarea style="font-size: 10px; font-weight: bold; height: 150px; text-transform: uppercase" class="form-control"
                                                    name="txtNotas" id="txtNotas" cols="30" rows="10" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-2">
                        <div class="col-3">
                            <label for="Categoria">Categoria <span style="color:red;">*</span></label>
                            <select id="Categoria" name="Categoria" class="form-control"
                                style="text-transform: uppercase" required>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="Maquina">Máquina</label>
                            <select id="Maquina" name="Maquina" class="form-control" disabled
                                style="text-transform: uppercase">
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="EstatusMaquina">Estatus Máquina</label>
                            <select id="EstatusMaquina" name="EstatusMaquina" class="form-control" disabled
                                style="text-transform: uppercase">
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="FallaMaquina">Falla Máquina</label>
                            <select id="FallaMaquina" name="FallaMaquina" class="form-control" disabled
                                style="text-transform: uppercase">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="Titulo">Titulo <span style="color:red;">*</span></label>
                            <input type="text" name="Titulo" id="Titulo" class="form-control text-uppercase" required autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="Solicitud">Solicitud <span style="color:red;">*</span></label>
                            <textarea name="Solicitud" id="Solicitud" cols="30" rows="10" class="form-control text-uppercase" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 mt-5">
                            <span class="input-group-append">
                                <div class="custom-switch ml-0" id="EnviarCopiaMttoSwith"
                                    style="margin-top: -12px">
                                    <input type="checkbox" id="EnviarCopia" class="custom-control-input">
                                    <label id="EnviarCopiaLabel" for="EnviarCopia"
                                        class="custom-control-label" style="cursor: pointer">Enviar Copia</label>
                                </div>
                            </span>
                        </div>
                        <div class="col-sm-9">
                            <label for="Correo">Correo</label>
                            <input type="mail" name="Correo" id="Correo" class="form-control text-lowercase" disabled autocomplete="off">
                        </div>
                    </div> --}}
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-btn btn-md" id="btnCloseTicketMtto"
                    data-dismiss="modal" aria-label="Close" onclick="closeMClientes()"><i
                        class="fas fa-times-circle"></i> Cancelar</button>
                <button type="button" class="btn btn-primary rounded-btn btn-md" id="btnsaveTicketMtto"
                    onclick="guardarCliente()"><i class="fas fa-check-circle"></i> Aceptar</button>
            </div>
        </div>
    </div>
</div>
