@extends('layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Lista de inventario</h2>
        </div>
        <hr>
        <div class="container shadow">
            <br>
            <table class="table table-bordered data-inventory table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ingrediente</th>
                        <th>Cantidad</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/inventory.js') }}"></script>
@endsection
