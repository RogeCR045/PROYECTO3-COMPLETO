@extends('layouts.dashboard')
@section('content')

<div class="container">
    <h1>☎️📱 FORMULARIO DE CONTACTOS 📱📞</h1>
    <form action="{{ route('contacts.store') }}" method="post">

        @csrf

        <div class="row">

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
        <label for="">Nombre completo:</label>
       <input class="form-control" type="text" name="fullname" id="" placeholder="Nombre completo" required>
    </div>

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
      <label for="">Edad en años:</label>
       <input class="form-control" type="number" name="years" id="" placeholder="Edad en años" required>
    </div>

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
       <label for="">Dirección de correo:</label>
       <input class="form-control" type="email" name="mailaddress" id="" placeholder="Dirección de correo" required>
    </div>
    </div>
    <br>
    
    <div class="row">
    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
        <label for="">Contraseña:</label>
        <input class="form-control" type="password" name="password" id="" placeholder="Contraseña" required>
    </div>

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
        <label for="">Calle y codigo postal:</label>
        <input class="form-control" type="text" name="Street" id="" placeholder="Calle y codigo postal" required>
    </div>

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
        <label for="">Localidad:</label>
        <input class="form-control" type="text" name="location" id="" placeholder="Localidad" required>
    </div>
    </div>
    <br>
    
    <div class="row">

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
        <label for="">Ciudad:</label>
        <input class="form-control" type="text" name="city" id="" placeholder="Ciudad" required>
    </div>

    <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
        <label for="">Estado:</label>
        <input class="form-control" type="text" name="condition" id="" placeholder="Estado" required>
    </div>

    <div>
        <label for="">Sitio web:</label>
        <textarea class="form-control" type="text" name="website" id=""  cols="15" rows="8" required></textarea>
    </div>
    </div>
    <br> 

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <input  class="btn btn-info" type="reset" value="Restablecer">
    <input class="btn btn-primary" type="submit" value="Guardar">
    </div>
    </form>
   </div>

   @endsection