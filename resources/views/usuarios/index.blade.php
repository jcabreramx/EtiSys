@extends('layouts.app')
@section('content')
@include('partials.loading')
    <div class="container-fluid">

        <div id="card_general" class="card" style="margin-top: 0; display: block">
            {{-- <input type="hidden" id="conteo_activo">
            <input type="hidden" id="Gestion_Id">
            <input type="hidden" id="cerrado">
            <input type="hidden" id="ajustes">
            <input type="hidden" id="nombre" value="{{ $nombre }}"> --}}
            <div id="card_bodyUsuarios" class="card-body">
                <div class="box_tooltip">
                    <button class="box btn_round_gl flecha_down" alt="NUEVO USUARIO" id="btnNuevoUsuario"
                        onclick="nuevoUsuario()" type="button">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
                <div id="usuariosDiv">
                    <table id="tblUsuarios" class="hover stripe compact nowrap tblnombre"
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
    {{-- @include('auth.register') --}}
    <script src="js/usuarios.js" defer></script>

@endsection
