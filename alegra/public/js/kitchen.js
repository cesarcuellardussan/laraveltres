var tabla;
atributosDatatable.columns = [
    {data: 'id', name: 'id'},
    {data: 'food', name: 'food'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
];
tabla = $('.data-tablee').DataTable(atributosDatatable);
tabla.ajax.url("/kitchen").load();

function updateKitchen(){
    tabla.ajax.url("/kitchen").load();
}

function dispatch(element) {
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
        updateKitchen();
    })
    .catch(error => {
        console.error(error);
    });
}
