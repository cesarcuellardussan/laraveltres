@extends('layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Pedidos de la bodega</h2>
        </div>
        <hr>
        <div class="container shadow">
            <br>
            <table class="table table-bordered data-warehouse table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plato</th>
                        <th>Estado</th>
                        <th width="100px">Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br>
        </div>
    </div>
@endsection
@include('deposit')

@section('scripts')
    <script src="{{ asset('js/warehouse.js') }}"></script>
    <script src="{{ asset('js/deposit.js') }}"></script>
@endsection
