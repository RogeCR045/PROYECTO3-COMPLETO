@extends('layouts.dashboard')
@section('content')
    
<!--<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">-->

<div class="container">
    <br><br>

    <div class="card">

        <div class="card-header">

         <div class="row">
          <div class="col md 8">

            <h2 class="card-title">Listado de profesiones registrados en la base de datos</h2>
            </div>
            <div class="col md 4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <span data-href="/exportProfessionsToCSV" id="export" class="btn btn-info" onclick="exportProfessions(event.target);">Exportar a CSV</span>
                <br> 
               <a class="btn btn-primary" href="{{ route('professions.create') }}"><i class="fa fas-add"></i> +Nuevo</a>
              
              </div>
            </div>
            </div>
        </div>

        <div class="card-body">
         <table class="table table-striped">

        <thead>
            <tr>
                <th>Nombre de la profesión</th>
                <th>Información</th>
                <th>Descripción</th>
               
                
            </tr>
        </thead>

        <tbody>
            @forelse ($professions as $profession)
       
        
       <tr>
       
      <td>
        <a class="btn btn-info btn-small" href="{{ route('professions.show', $profession->id) }}">  
        <h4>{{ $profession->profession }}</h4></td>
    </a>
      <td>
         <p><b>Nombre:</b> {{ $profession->name  }}</p>
         <p><b>Edad:</b> {{ $profession->ageyears }} Años</p>
         <p><b>Número telefónico:</b> {{ $profession->phonenumber }}</p>
         <p><b>Años trabajando en ello:</b> {{ $profession->yearsworking }} Año(s)</p>
         <p><b>Le gusto por:</b> {{ $profession->inherited }}</p>
         <p><b>Comentario de la carrera:</b> {{ $profession->commentcarr }}</p>
      </td>
      <td><p>{{ $profession->description }}</p></td>
        
      
        
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
            function exportProfessions(_this){
                let _url= $(_this).data('href');
                window.location.href= _url;            
                }
        </script>

        @endsection
       