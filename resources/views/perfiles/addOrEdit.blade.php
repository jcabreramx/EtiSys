<div class="modal fade" id="mod_Perfiles" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-md">
        <div class="modal-content card">
            <input type="hidden" id="id_Perfil">
            <div class="modal-header bg-gray row text-center" id="headerPerfil">
                <h4 class="modal-title ml-2" id="titlePerfil" style="margin-top: -12px">Perfil</h4>
            </div>
            <div class="modal-body p-2">
                <div class="row">
                    <label for="nombre_perfil" class="col-md-2 col-form-label text-md-end">Nombre</label>
                    <div class="col-md-10">
                        <input id="nombre_perfil" type="text" class="form-control mt-2" name="nombre"
                            required autocomplete="off" autofocus style="height: 25px !important">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row mb-0 text-center">
                    <div class="col-lg-6 float-right">
                        <button type="button" class="btn btn-primary" onclick="crearPerfil()" id="btnCrearPerfil"
                            disabled>
                            Aceptar
                        </button>
                    </div>
                    <div class="col-lg-6 float-left">
                        <a type="button" class="btn btn-secondary text-white" onclick="closeMPerfil()">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
