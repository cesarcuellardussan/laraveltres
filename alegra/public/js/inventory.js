var tabla;
atributosDatatable.columns = [
    {data: 'id', name: 'id'},
    {data: 'ingrediente', name: 'ingrediente'},
    {data: 'cantidad', name: 'cantidad'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
];
tabla = $('.data-inventory').DataTable(atributosDatatable);
tabla.ajax.url("/inventory").load();

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
        tabla.ajax.url("/inventory").load();
        Swal.fire(data.title,data.text,data.icon);
    })
    .catch(error => {
        console.error(error);
    });
}
