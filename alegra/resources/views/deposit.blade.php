<!-- Modal -->
<div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="depositLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="depositLabel">Verificar disponibilidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container shadow">
                    <br>
                    <table class="table table-bordered data-deposit table-sm">
                        <thead>
                            <tr>
                                <th width="250px">Ingrediente</th>
                                <th>Requerido</th>
                                <th>Inventario</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
            <div class="modal-footer" id="div-modal-footer">
                <button type="button" class="btn btn-secondary shadow" data-dismiss="modal" onclick="updateWerehouse()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
