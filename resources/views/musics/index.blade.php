@extends('layouts.dashboard')
@section('content')
    
<!--<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">-->

<div class="container">
    <br><br>

    <div class="card">

        <div class="card-header">

         <div class="row">
          <div class="col md 8">

            <h2 class="card-title">Listado de canciones registrados en la base de datos</h2>
            </div>
            <div class="col md 4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <span data-href="/exportMusicsToCSV" id="export" class="btn btn-info" onclick="exportMusics(event.target);">Exportar a CSV</span>
                <br>
                <a class="btn btn-primary" href="{{ route('musics.create') }}"><i class="fa fas-add"></i> +Nuevo</a>
              
              </div>
            </div>
            </div>
        </div>

        <div class="card-body">
         <table class="table table-striped">

        <thead>
            <tr>
                <th>Nombre de la canción</th>
                <th>Información</th>
                <th>Descripción</th>               
                
            </tr>
        </thead>

        <tbody>
            @forelse ($musicas as $music)
          
       <tr>
       
      <td>
        <a class="btn btn-info btn-small" href="{{ route('musics.show', $music->id) }}">  
        <h4>{{ $music->songname }}</h4>
        <h4>{{ $music->artist }}</h4></td>
    </a>
      <td>
         <p><b>Genéro:</b> {{ $music->gender }}</p>
         <p><b>Año de lanzamiento:</b> {{ $music-> yearlaunch }}</p>
         <p><b>Album:</b> {{ $music->album }}</p>
         <p><b>Redes sociales:</b> {{ $music->socialmedia }}</p>
         <p><b>Tiempo escuchandolo:</b> {{ $music->timelistening }}</p>
         <p><b>Letra de la cancion:</b>{{ $music->letter }}</p>
      </td>
      <td><p>{{ $music->comment }}</p></td>
        
        @empty
        <h1>La tabla no tiene datos</h1>
    </tr>
        @endforelse
    </tbody>
        </table> 

        </div>
        </div>
      
        <!--Agregar codigo scrip para poder extrar archivo csv-->

        <script>
            function exportMusics(_this){
                let _url= $(_this).data('href');
                window.location.href= _url;            
                }
        </script>

        @endsection

       