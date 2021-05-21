@extends('layouts.app')
@section('title', 'Contactar con usuario')
<title>Contact</title>
@section('content')

<head>
    <!--Style personalizado-->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.css') }}" type="text/css">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <form action="{{ route('informations.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xs-12 colo-sm-8 col-md-8 col-xl-8">
                    <label for="">Nombre:</label>
                    <input class="form-control" placeholder="Nombre" type="text" name="nameuser" required>
                </div>
                <div class="col-xs-12 colo-sm-8 col-md-8 col-xl-8">
                    <label for="">Telefono:</label>
                    <input class="form-control" placeholder="Telefono" type="text" name="phone" min="0"
                        max="10000000000" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 colo-sm-8 col-md-8 col-xl-8">
                    <label for="">Correo email:</label>
                    <input class="form-control" placeholder="Email" type="email" name="email" required>
                </div>
                <div class="col-xs-16 colo-sm-14 col-md-14 col-xl-8">
                    <label for="">Mensaje:</label>
                    <textarea class="form-control" placeholder="Mensaje" type="text" name="message" required></textarea>
                </div>
            </div>
            <br>
            <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                <input class="btn btn-warning" type="reset" value="Restablecer">
                <input class="btn btn-success" type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
@endsection