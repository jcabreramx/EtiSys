@extends('layouts.app')
@section('content')
    @include('partials.loading')
    <div class="container-fluid">

        <div id="card_general" class="card" style="margin-top: 0; display: block">
            <div id="card_bodyClientes" class="card-body">
                @if (session('AccesoClientes') == 1 && session('CrearClientes') == 1)
                    <div class="box_tooltip">
                        <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Cliente') }} class="box"
                            alt="NUEVO CLIENTE" id="btnNuevoCliente" onclick="nuevoCliente()" type="button">
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
                <div class="row mb-1">
                    {{-- <ul class="nav nav-tabs col-sm-12 mb-2" id="custom-content-below-tab" role="tablist">
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
                    </ul> --}}
                    <div id="clientesDiv" class="col-lg-12">
                        <table id="tblClientes" class="hover stripe compact nowrap tblnombre"
                            style="font-size: 70% !important; width: 100%;">
                            <thead>
                                {{-- <tr class="bg-blue-table">
                                    <th colspan="9" class="text-center">CLIENTES / PROSPECTOS</th>
                                </tr> --}}
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
                </div>
            </div>
        </div>
    </div>
    @include('clientes.addOrEdit')
    <script src="js/clientes.js" defer></script>
@endsection
