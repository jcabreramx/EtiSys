<div class="modal fade" id="NotaCliente" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #00000096">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="formNotaCliente">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header bg-gray row text-center" id="headerNotaCliente">
                    <h4 class="modal-title ml-2" id="titleCliente" style="margin-top: -12px">Notas</h4>
                </div>
                <div class="modal-body p-2">
                    <div class="row">
                        <textarea name="txtNotas" id="txtNotas" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-btn btn-md" id="btnCloseTicketMtto"
                    data-dismiss="modal" aria-label="Close" onclick="closeMNotas()">Cancelar</button>
                <button type="button" class="btn btn-primary rounded-btn btn-md" id="btnsaveTicketMtto"
                    onclick="guardarNota()">Guardar</button>
            </div>
        </div>
    </div>
</div>
