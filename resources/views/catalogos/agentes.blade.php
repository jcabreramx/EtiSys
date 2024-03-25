<div class="modal fade" id="AddOrEditAgente" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-md">
        <div class="modal-content card">
            <div class="modal-header bg-gray row text-center" id="headerAgente">
                <h4 class="modal-title ml-2" id="titleAgente" style="margin-top: -12px">Agente</h4>
            </div>
            <div class="modal-body p-2">
                <form id="formAgente">
                    <input type="hidden" id="ClaveAgente" name="ClaveAgente">
                    <div class="row">
                        <label for="Agente" class="col-md-3 col-form-label text-md-end">Clave</label>
                        <div class="col-md-9">
                            <input id="Agente" type="text" class="form-control mt-2 text-uppercase" name="Agente"
                                required autocomplete="off" autofocus style="height: 25px !important">
                        </div>
                    </div>
                    <div class="row">
                        <label for="NombreAgente" class="col-md-3 col-form-label text-md-end">Nombre</label>
                        <div class="col-md-9">
                            <input id="NombreAgente" type="text" class="form-control mt-2 text-uppercase"
                                name="NombreAgente" required autocomplete="off" style="height: 25px !important">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Consecutivo" class="col-md-3 col-form-label text-md-end">Consecutivo</label>
                        <div class="col-md-9">
                            <input id="Consecutivo" type="number" class="form-control mt-2" name="Consecutivo" required
                                autocomplete="off" style="height: 25px !important">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Comision" class="col-md-3 col-form-label text-md-end">Comision</label>
                        <div class="col-md-9">
                            <input id="Comision" type="number" class="form-control mt-2" name="Comision" required
                                autocomplete="off" style="height: 25px !important">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row mb-0 text-center">
                    <div class="col-lg-6 float-right">
                        <button type="button" class="btn btn-primary" onclick="crearAgente()" id="btnCrearAgente"
                            disabled>
                            Aceptar
                        </button>
                    </div>
                    <div class="col-lg-6 float-left">
                        <a type="button" class="btn btn-secondary text-white" onclick="closeMAgente()">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
