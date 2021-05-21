@extends('layouts.dashboard')
@section('content')
    
<!--<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">-->

<div class="container">
    <br><br>

    <div class="card">

        <div class="card-header">

         <div class="row">
          <div class="col md 8">

            <h2 class="card-title">Listado de animales registrados en la base de datos</h2>
            </div>
            <div class="col md 4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <span data-href="/exportAnimalsToCSV" id="export" class="btn btn-info" onclick="exportAnimals(event.target);">Exportar a CSV</span>
              <br> 
               <a class="btn btn-primary" href="{{ route('animals.create') }}"><i class="fa fas-add"></i> +Nuevo</a>
              
              </div>
            </div>
            </div>
        </div>

        <div class="card-body">
         <table class="table table-striped">

        <thead>
            <tr>
                <th>Nombre del animal</th>
                <th>Información</th>
                <th>Descripción</th>
                
                
            </tr>
        </thead>

        <tbody>
            @forelse ($animals as $animal)
       
        
       <tr>
       
      <td>
        <a class="btn btn-info btn-small" href="{{ route('animals.show', $animal->id) }}">  
        <h4>{{ $animal->animal }}</h4> 
        <h4>{{ $animal->age }}</h4><b>Años</b></td>
    </a>
      <td>
        
        <p><b>Edad:</b> {{ $animal->age }} Años</p>
        <p><b>Lugar de origen :</b> {{ $animal->birthplace }}</p>
        <p><b>Clima:</b> {{ $animal->climate }}</p>
        <p><b>Color:</b> {{ $animal->color }}</b></p>
        <p><b>Pejale:</b> {{ $animal->fur }}</p>
        <p><b>Comida:</b> {{ $animal->food }}</p>

      </td>
      <td><p>{{ $animal->comemmtanim }}</p></td>
       
      
        
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
          function exportAnimals(_this){
              let _url= $(_this).data('href');
              window.location.href= _url;            
              }
      </script>

        @endsection
       