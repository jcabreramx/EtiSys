<div class="modal fade" id="AddOrEditActividadesCliente" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formAddTicketMttoOrEditActividadesCliente">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header bg-gray row text-center" id="headerActividadCliente">
                    <h4 class="modal-title ml-2" id="titleActividadCliente" style="margin-top: -12px">Actividades Cliente</h4>
                </div>
                <div class="modal-body p-2">
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
                    data-dismiss="modal" aria-label="Close" onclick="closeMActividadesClientes()">Cancelar</button>
                <button type="button" class="btn btn-primary rounded-btn btn-md" id="btnsaveTicketMtto"
                    onclick="generarTicketMtto()">Generar</button>
            </div>
        </div>
    </div>
</div>
