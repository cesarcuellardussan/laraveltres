var tabla;
atributosDatatable.columns = [
    {data: 'id', name: 'id'},
    {data: 'food', name: 'food'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
];
tabla = $('.data-warehouse').DataTable(atributosDatatable);
tabla.ajax.url("/warehouse").load();

function updateWerehouse(){
    tabla.ajax.url("/warehouse").load();
}
