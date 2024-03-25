<div class="modal fade" id="mod_Permisos" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header bg-gray text-center row" id="headerPermisos">
                <h4 class="modal-title col-12" id="titlePermisos" style="margin-top: -15px">Permisos Usuario</h4>
            </div>
            <div class="modal-body" id="formPermisos">
                {{-- <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror mt-2" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus
                            style="height: 25px !important">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                <div id="divTblPermisos">
                    <table id="tblPermisos" class="hover stripe compact nowrap tblnombre"
                        style="font-size: 70% !important; width: 100%">
                        <thead>
                            <tr class="bg-blue-table">
                                <th>Modulo</th>
                                <th>Acceso</th>
                                <th>Crear</th>
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
                <div class="row mb-2 text-center">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary col-4" onclick="guardarPermisos()" id="btnGuardarPermisos">
                            {{ __('Aceptar') }}
                        </button>
                    </div>
                    {{-- <div class="col-lg-6 float-left">
                        <a type="button" class="btn btn-secondary text-white" onclick="closeMRegister()">
                            {{ __('Cancelar') }}
                        </a>
                    </div> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
