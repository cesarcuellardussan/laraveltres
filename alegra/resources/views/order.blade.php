@extends('layout')

@section('content')
    <div class="container">
        <h1>Hacer una orden</h1>
        <p>Elige el tipo de orden que quieres hacer:</p>

        <div class="row">
            <div class="col-md-6">
                <a href="/order/single" class="btn btn-primary btn-lg btn-block">Orden individual</a>
            </div>
            <div class="col-md-6">
                <a href="/order/bulk" class="btn btn-secondary btn-lg btn-block">Orden masiva</a>
            </div>
        </div>
    </div>
    <!-- Modal trigger button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
@endsection
