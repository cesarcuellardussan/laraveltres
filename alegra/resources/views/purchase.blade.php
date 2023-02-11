@extends('layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Historial de compras</h2>
        </div>
        <hr>
        <div class="container shadow">
            <br>
            <table class="table table-bordered data-purchase table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Ingrediente</th>
                        <th>Cantidad</th>
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
    <script src="{{ asset('js/purchase.js') }}"></script>
@endsection
