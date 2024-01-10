@extends('layouts.app')
@section('content')
    @include('partials.loading')
    <div class="container-fluid">

        <div id="card_general" class="card" style="margin-top: 0; display: block">
            <div id="card_bodyClientes" class="card-body">
                <div class="box_tooltip">
                    <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Cliente') }} class="box"
                        alt="NUEVO CLIENTE" id="btnNuevoCliente" onclick="nuevoCliente()" type="button">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
                <div class="row mb-1">
                    <ul class="nav nav-tabs col-sm-12 mb-2" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item" id="nav_item_clientes" style="width: 13%">
                            <a class="nav-link active" id="clientes-tab" onclick="mostrarClientes()" data-toggle="pill"
                                role="tab" aria-controls="clientes-tab" aria-selected="true"
                                style="cursor: pointer">Clientes</a>
                        </li>
                        <li class="nav-item" id="nav_item_contactos" style="width: 13%">
                            <a class="nav-link" id="contactos-tab" onclick="mostrarContactos()" data-toggle="pill"
                                role="tab" aria-controls="contactos-tab" aria-selected="false"
                                style="cursor: pointer">Contactos</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="div_contactos_cliente">
                        <div class="tab-pane fade show active" id="clientes" role="tabpanel"
                            aria-labelledby="clientes-tab">
                            <div class="col-lg-12 justify-content-sm-center">
                                <div class="col-lg-12 input-group input-group-sm">
                                    {{-- <input type="text" id="searchOportFolio" class="form-control ms-1 text-uppercase"
                                    placeholder="Folio"> --}}
                                    <select id="searchTipo" class="form-select ms-1 text-uppercase"
                                        style="border-radius: 5px">
                                        <option value="">Tipo: CUALQUIERA</option>
                                        @foreach ($combo_tipo as $tipo)
                                            <option value="{{ $tipo->vchTipoClienteID }}">({{ $tipo->vchTipoClienteID }})
                                                {{ $tipo->vchDescripcion }}</option>
                                        @endforeach
                                    </select>
                                    <select id="searchGrupo" class="form-select ms-1 text-uppercase"
                                        style="border-radius: 5px">
                                        <option value="">Grupo: CUALQUIERA</option>
                                        @foreach ($combo_grupo as $grupo)
                                            <option value="{{ $grupo->chGrupoID }}">({{ $grupo->chGrupoID }})
                                                {{ $grupo->varDescripcion }}</option>
                                        @endforeach
                                    </select>
                                    <select id="searchOrigen" class="form-select ms-1 text-uppercase"
                                        style="border-radius: 5px">
                                        <option value="">Origen: CUALQUIERA</option>
                                        @foreach ($combo_origen as $origen)
                                            <option value="{{ $origen->vchOrigenID }}">({{ $origen->vchOrigenID }})
                                                {{ $origen->vchDescripcion }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" id="searchNombre" class="form-control ms-1 text-uppercase"
                                        placeholder="Nombre">
                                    <input type="text" id="searchNombreCorto" class="form-control ms-1 text-uppercase"
                                        placeholder="Nombre Corto">
                                    <select id="searchAgente" class="form-select ms-1 text-uppercase"
                                        style="border-radius: 5px">
                                        <option value="">Agente: CUALQUIERA</option>
                                        @foreach ($combo_agente as $agente)
                                            <option value="{{ $agente->vchUsuarioID }}">({{ $agente->vchUsuarioID }})
                                                {{ $agente->vchNombre }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-append">
                                        <button type="button" onclick="cargarClientes()" id="btn-searchEstr"
                                            class="btn btn-primary btn-flat ms-2 rounded-btn btn-sm"
                                            {{ Popper::arrow('round')->theme('lightborder')->size('regular')->distance(10)->position('bottom')->pop('Buscar') }}
                                            style="margin-top: -7px">
                                            <i class="nav-icon fas fa-search"></i>
                                        </button>
                                        <button type="button" onclick="limpiarClientes()" id="btn-cleanEstr"
                                            class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm"
                                            {{ Popper::arrow('round')->theme('lightborder')->size('regular')->distance(10)->position('bottom')->pop('Limpiar') }}
                                            style="margin-top: -7px">
                                            <i class="nav-icon fas fa-search-minus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div id="clientesDiv" class="col-lg-12">
                                <table id="tblClientes" class="hover stripe compact nowrap tblnombre"
                                    style="font-size: 70% !important; width: 100%;">
                                    <thead>
                                        <tr class="bg-blue-table">
                                            <th colspan="9" class="text-center">CLIENTES / PROSPECTOS</th>
                                        </tr>
                                        <tr class="bg-blue-table">
                                            <th>Clave</th>
                                            <th>Nombre</th>
                                            <th>Nombre Corto</th>
                                            <th>Tipo</th>
                                            <th>Grupo</th>
                                            <th>Origen</th>
                                            <th>Agente</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($clientes as $cliente)
                                            <tr>
                                                <td>{{ $cliente->vchClave }}</td>
                                                <td>{{ $cliente->vchNombre }}</td>
                                                <td>{{ $cliente->vchNombreCorto }}</td>
                                                <td>{{ $cliente->vchDescripcionTipoCliente }}</td>
                                                <td>{{ $cliente->vchDescripcionGrupo }}</td>
                                                <td>{{ $cliente->vchDescripcionOrigen }}</td>
                                                <td>{{ $cliente->vchNombreAgente }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">Sin Registros</td>
                                            </tr>
                                        @endforelse --}}

                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-blue-table">
                                            <th colspan="9"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- {{ $clientes->links() }} --}}
                            <div class="row mb-1">
                                <div id="contactosDiv" class="col-lg-6">
                                    <table id="tblContactos" class="hover stripe compact nowrap tblnombre"
                                        style="font-size: 70% !important; width: 100%">
                                        <thead>
                                            <tr class="bg-blue-table">
                                                <th colspan="7" class="text-center">CONTACTOS</th>
                                            </tr>
                                            <tr class="bg-blue-table">
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Titulo</th>
                                                <th>Puesto</th>
                                                <th>Sexo</th>
                                                <th>Horario</th>
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
                                <div id="telContactosDiv" class="col-lg-6">
                                    <table id="tblContactosTel" class="hover stripe compact nowrap tblnombre"
                                        style="font-size: 70% !important; width: 100%">
                                        <thead>
                                            <tr class="bg-blue-table">
                                                <th colspan="2" class="text-center">TELÉFONOS</th>
                                            </tr>
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
                        </div>
                        <div class="tab-pane fade" id="contactos" role="tabpanel" aria-labelledby="contactos-tab">
                            @include('contactos.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('clientes.addOrEdit')
    @include('clientes.indexActividades')
    @include('clientes.addOrEditActividades')
    <script src="js/clientes.js" defer></script>
@endsection
