@extends('layouts.dashboard')
@section('content')

<div class="container">
    <h1>🎤🎧🎸FORMULARIO DE CANCIONES🤘🎼🎵 ♬</h1>
    <form action="{{ route('musics.store') }}" method="post">

        @csrf

        <div class="row">

            <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
                <label for="">Nombre de la canción:</label>
                <input class="form-control" type="text" name="songname" id="" placeholder="Nombre de la canción" required>
            </div>
        
            <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
                <label for="">Artista:</label>
                <input class="form-control" type="text" name="artist" id="" placeholder="Artista" required>
            </div>
        
            <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
                <label for="">Género:</label>
                <input class="form-control" type="text" name="gender" id="" placeholder="Género" required>
            </div>

        </div>

         <br>
        <div class="row">

            <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
                <label for="">Año de lanzamiento:</label>
                <input class="form-control" type="number" name="yearlaunch" id="" placeholder="Año de lanzamiento" required>
            </div>
        
            <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
                <label for="">Album:</label>
                <input class="form-control" type="text" name="album" id="" placeholder="Album" required>
            </div>
        
            <div class="col-xs-12 colo-sm-4 col-md-4 col-xl-4">
                <label for="">Redes sociales:</label>
                <input class="form-control" type="text" name="socialmedia" id="" placeholder="Redes sociales" required>
            </div>

        </div>

        <br>
       
        <div>
            <label for="">Tiempo de año escuchandolo:</label>
            <input class="form-control" type="number" name="timelistening" id="" placeholder="Tiempo de año escuchandolo" required>
        </div>
        <br>
        <div>
            <label for="">Letra de la cancion:</label>
            <textarea class="form-control" type="text" name="letter" id="" cols="30" rows="10" required></textarea>
        </div>
        <br>
        <div>
            <label for="">Comentario:</label>
            <input class="form-control" type="text" name="comment" id="" placeholder="Comentario">
        </div>
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <input  class="btn btn-info" type="reset" value="Restablecer">
      <input class="btn btn-primary" type="submit" value="Guardar">
    </div>

    </form>
</div>

@endsection
