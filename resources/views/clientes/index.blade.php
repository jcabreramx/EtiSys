@extends('layouts.app')
@section('content')
@include('partials.loading')
    <div class="container-fluid">

        <div id="card_general" class="card" style="margin-top: 0; display: block">
            <div id="card_bodyClientes" class="card-body">
                <div class="box_tooltip">
                    <button class="box btn_round_cli flecha_down" alt="NUEVO CLIENTE" id="btnNuevoCliente"
                        onclick="nuevoCliente(), openModalCliente()" type="button">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
                <div id="clientesDiv">
                    <table id="tblClientes" class="hover stripe compact nowrap tblnombre"
                        style="font-size: 70% !important; width: 100%">
                        <thead>
                            <tr class="bg-blue-table">
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr class="bg-blue-table">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
    <script src="js/clientes.js" defer></script>

@endsection
