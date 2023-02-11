<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Alegra')</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    @yield("styles")
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">{{ 'ALEGRA' }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" id="inicio">Inicio</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('order') }}">Ordenes</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kitchen') }}" id="cocina">Cocina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('warehouse') }}" id="bodega">Bodega</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase') }}" purchaseid="compras">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inventory') }}" id="inventario">Inventario</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>

    <footer class="bg-dark py-4 text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Sobre nosotros</h4>
                    <p>
                        Reto técnico php ALEGRA<br> Ing. Cesar Cuellar <br>
                        <em>Especialista en desarrollo de software</em>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Horario</h4>
                    <p>lunes a viernes <br> 8:00 am - 5:00 pm</p>
                </div>
                <div class="col-md-4">
                    <h4>Contacto</h4>
                    <p>cesar.cuellar26@hotmail.com <br> +57 3124253540</p>
                </div>
            </div>
        </div>
    </footer>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/order.js') }}"></script>
    <script src="{{ asset('js/recipe.js') }}"></script>
    @yield("scripts")
</body>
</html>
