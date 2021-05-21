@extends('layouts.app')
<title>About</title>
@section('content')
<!--Style personalizado-->
<link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('/dist/css/adminlte.css') }}" type="text/css">
<div class="container">
    <Center>
        <h1><b>HACERCA DE LA PAGINA MPCA🎵💼📱🐶</b></h1>
    </Center>
    <center>
        <figure><img src="/images/royer.jpeg" alt="#" height="200px" width="150px"></figure>
    </center>
    <Center>
        <h2>Creador: Rogelio Castañeda Reyes</h2>
    </Center>
    <Center>
        <h2>Ingeníero Informático</h2>
    </Center>
    <br>
    <Center>
        <h2>Diseños de interfacez:</h2>
    </Center>
    <Center>
        <h2>Modulo de canciones
            <picture><img src="/rock/images/1.jpg" alt="#" height="200px" width="150px"></picture>
        </h2>
    </Center>
    <Center>
        <h2>Modulo de profesiones
            <picture><img src="/rock/images/trabajo.jpg" alt="#" height="200px" width="150px"></picture>
        </h2>
    </Center>
    <Center>
        <h2>Modulo de contactos
            <picture><img src="/rock/images/contactos.jpg" alt="#" height="200px" width="150px"></picture>
        </h2>
    </Center>
    <Center>
        <h2>Modulo de animales
            <picture><img src="/rock/images/animales.jpeg" alt="#" height="200px" width="150px"></picture>
        </h2>
    </Center>
</div>
@endsection