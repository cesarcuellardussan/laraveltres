var tabla;
atributosDatatable.columns = [
    {data: 'id', name: 'id'},
    {data: 'fecha', name: 'fecha'},
    {data: 'ingrediente', name: 'ingrediente'},
    {data: 'cantidad', name: 'cantidad'},
];
tabla = $('.data-purchase').DataTable(atributosDatatable);
tabla.ajax.url("/purchase").load();
