{{-- <div class="modal" id="recipe-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Receta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 id="title-food">Ingredientes</h3>
                <ul id="list-ingredients" class="list-unstyled">
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn " data-dismiss="modal" onclick="updateKitchen()">Cerrar</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal -->
<div class="modal fade" id="recipe-detail" tabindex="-1" role="dialog" aria-labelledby="recipe-detailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipe-detailLabel">Receta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 id="title-food">Ingredientes</h3>
                <ul id="list-ingredients" class="list-unstyled"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary shadow" data-dismiss="modal" onclick="updateKitchen()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
