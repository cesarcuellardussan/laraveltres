@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Jornada de almuerzo ¡gratis!</h1>
        <p class="text-center mb-4">
            Hemos decidido tener una jornada de donación de comida a los
            residentes de la región con la única condición de que el plato que obtendrán los
            comensales será aleatorio, elige el tipo de orden que quieres hacer:
        </p>
        <div class="row">
            <div class="col-md-6 p-2">
                <button class="btn btn-primary btn-lg btn-block shadow" onclick="createOrders(1)">Orden individual</button>
            </div>
            <div class="col-md-6 p-2">
                <button class="btn btn-secondary btn-lg btn-block shadow" data-toggle="modal" data-target="#MassOrder">Orden masiva</button>
            </div>
        </div>
        <br>
        <h2 class="mb-4">Platos disponibles</h2>
        <div class="row">
            @foreach($foods as $food)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="{{ asset($food->image_dir) }}" class="card-img-top" alt="{{ $food->name }}" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $food->name }}</h5>
                            <p class="card-text">{{ $food->description }}</p>
                            {{-- <a href="#" class="btn btn-primary">Ver detalles</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="MassOrder" tabindex="-1" role="dialog" aria-labelledby="MassOrderLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="MassOrderLabel">Orden masiva</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="numeric-input">Número de órdenes a partir de 2 y hasta 100</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="decrementValue()">-</button>
                        </div>
                        <input type="number" class="form-control" id="quantity" value="2" min="2" max="100" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="incrementValue()">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="createMassive()">Crear</button>
            </div>
        </div>
        </div>
    </div>
@endsection
