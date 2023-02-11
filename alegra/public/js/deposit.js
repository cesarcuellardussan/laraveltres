var tabla_deposit;
atributosDatatable.searching = false;
atributosDatatable.paging = false;
atributosDatatable.info = false;
atributosDatatable.columns = [
    {data: 'ingrediente', name: 'ingrediente'},
    {data: 'requerido',   name: 'requerido'},
    {data: 'inventario',  name: 'inventario'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
];
tabla_deposit = $('.data-deposit').DataTable(atributosDatatable);

function loadDeposit(element){
    var food_id = $(element).attr("data-food-id");
    var order_id = $(element).attr("data-order-id");
    $('#div-modal-footer #btn-entregar').remove();
    tabla_deposit.ajax.url("/api/deposit/"+food_id).load(function(data) {
        // tu codigo callback para manejar la respuesta
        if (data.verificado) {
            $('#div-modal-footer').append('<button type="button" class="btn btn-success shadow" data-order="'+order_id+'" id="btn-entregar" onclick="deliverFood(this)">Entregar ingredientes</button>');
        }else{
            // Obtener el elemento HTML
            var div_modal_footer = document.getElementById("div-modal-footer");
            // Establecer el atributo data-mi-atributo en el elemento
            div_modal_footer.setAttribute("data-food-id", food_id);
            div_modal_footer.setAttribute("data-order-id", order_id);
        }
    });
}

function deliverFood(element) {
    $('#deposit').modal('hide');
    var id = $(element).attr("data-order");
    fetch('/api/orders/'+ id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        Swal.fire(data.title,data.text,data.icon);
        updateWerehouse();
    })
    .catch(error => {
        console.error(error);
    });
}


function purchase(element) {
    let id = $(element).attr("data-ingredient-id");
    fetch('/api/ingredients/' + id + '/purchase', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        var div_modal_footer = document.getElementById("div-modal-footer");
        loadDeposit(div_modal_footer);
        Swal.fire(data.title,data.text,data.icon);
    })
    .catch(error => {
        console.error(error);
    });
}
