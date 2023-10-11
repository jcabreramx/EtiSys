@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Catálogos</div>
                    <a id="href_catalogos">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fas fa-file-circle-plus fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Usuarios</div>
                    <a id="href_usuarios" onclick="usuarios(), loaderON()">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Clientes/Prospectos</div>
                    <a id="href_clientes" onclick="clientes(), loaderON()">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fas fa-user-tie fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Cotizaciones</div>
                    <a id="href_clientes">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fa-solid fa-file-invoice fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Pedidos</div>
                    <a id="href_clientes">
                        <div class="card-body text-center view overlay zoom">
                            {{-- <i class="fas fa-invoice fa-3x"></i> --}}
                            <i class="fa-solid fa-file-invoice-dollar fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Actividades</div>
                    <a id="href_actividades">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fas fa-file-pen fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Producción</div>
                    <a id="href_produccion">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fas fa-desktop fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Ordenes de Producción</div>
                    <a id="href_ordProduccion">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fa-solid fa-file-circle-check fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3" style="text-align: -webkit-center;">
                <div class="card-p card cards text-white bg-info mb-3" style="max-width: 90%">
                    <div class="card-header">Inventarios</div>
                    <a id="href_inventarios">
                        <div class="card-body text-center view overlay zoom">
                            <i class="fa-solid fa-file-lines fa-3x"></i>
                        </div>
                    </a>
                </div>
            </div>
            {{-- <div class="col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}
            {{-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Clientes/Prospectos</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
