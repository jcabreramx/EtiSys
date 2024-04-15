<div class="modal fade" id="mod_Register" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-md">
        <div class="modal-content card">
            <input type="hidden" id="id_Usuario">
            <div class="modal-header bg-gray text-center row" id="headerRegister">
                <h4 class="modal-title col-12" id="titleRegister" style="margin-top: -15px">Nuevo Usuario</h4>
                {{-- <button type="button" class="close bg-gray btn col-1" style="margin-top: -15px" data-dismiss="modal" aria-label="Close"
                    onclick="closeMRegister()">
                    <span aria-hidden="true" class="text-white text-bold">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body" id="formRegister">
                {{-- <form method="POST" action="{{ route('register') }}">
                    @csrf --}}
                <div class="row">
                    <label for="name" class="col-md-3 col-form-label text-md-end">Nombre</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control mt-2" name="name" required
                            autocomplete="off" autofocus style="height: 25px !important" placeholder="Nombre">
                    </div>
                </div>

                <div class="row">
                    <label for="username" class="col-md-3 col-form-label text-md-end">Usuario</label>
                    <div class="col-md-8">
                        <input id="username" type="text" class="form-control mt-2" name="username" required
                            autocomplete="off" style="height: 25px !important" placeholder="Usuario">
                    </div>
                </div>
                <div class="row">
                    <label for="idDepartamento"
                        class="col-md-3 col-form-label text-md-end">Departamento</label>
                    <div class="col-md-8">
                        <select class="form-control mt-2" name="idDepartamento" id="idDepartamento"
                            style="height: 30px !important">
                            <option value="" selected disabled>Departamento...</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="idPuesto" class="col-md-3 col-form-label text-md-end">Puesto</label>
                    <div class="col-md-8">
                        <select class="form-control mt-2" name="idPuesto" id="idPuesto"
                            style="height: 30px !important">
                            <option value="" selected disabled>Puesto...</option>
                            @foreach ($puestos as $puesto)
                                <option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="idPerfil" class="col-md-3 col-form-label text-md-end">Perfil</label>
                    <div class="col-md-8">
                        <select class="form-control mt-2" name="idPerfil" id="idPerfil"
                            style="height: 30px !important">
                            <option value="" selected disabled>Perfil...</option>
                            @foreach ($perfiles as $perfil)
                                <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control mt-2" name="email" required
                            autocomplete="off" style="height: 25px !important" placeholder="email@email.com">
                    </div>
                </div>

                <div id="divPassword">
                    <div class="row">
                        <label for="password" class="col-md-3 col-form-label text-md-end">Password</label>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control mt-2" name="password" required
                                autocomplete="off" style="height: 25px !important" placeholder="***">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-3 col-form-label text-md-end">Confirmar</label>
                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control mt-2"
                                name="password_confirmation" required autocomplete="off" style="height: 25px !important" placeholder="***">
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
            <div class="modal-footer">
                <div class="row mb-0 text-center">
                    <div class="col-lg-6 float-right">
                        <button type="button" class="btn btn-primary" onclick="crearUsuario()" id="btnCrearUsuario">
                            Registrar
                        </button>
                    </div>
                    <div class="col-lg-6 float-left">
                        <a type="button" class="btn btn-secondary text-white" onclick="closeMRegister()">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Emailess') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmword') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
