@extends("layouts.reservas")
<link href="/css/estilos.css" rel="stylesheet">
<?php
use App\Models\Casas;
?>
@section("content")
<!-- Cuerpo -->
<div class="row mt-4 justify-content-center">
    <div class="col-lg-10 text-center">
        <h2>Listado casas de: {{ Auth::user()->name }}</h2>
    </div>    
</div>

<div class="row mt-4 justify-content-center">
    <button type='button' class="btn btn-crear-casa col-lg-2 border border-transparent rounded">
        <a class="a-crear-casa text-decoration-none h4" href="{{ route('casas.create') }}">
            Crear Nueva Casa
        </a>
    </button> 


<!-- Tabla -->

<div class="row mt-4 justify-content-center">
    <div class="col-lg-10">
<table class="table table-bordered border-dark bg-form">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Nombre de la casa</th>
      <th scope="col">Propietario de la casa</th>
      <th scope="col">fechaEntrada</th>
      <th scope="col">FechaSalida</th>
      <th scope="col">capacidad</th>
    </tr>
  </thead>
  <tbody>
  @forelse($reservas as $reserva)
    <tr>
      <th scope="row">{{ Auth::user()->name  }}</th>
      <td>{{ Casas::nombre()->nombre  }}</td>
    </tr>
    @empty
    @endforelse
  </tbody>
</table>
</div>
 
@if($reservas->count())
        <div class="mt-3">
            {{ $reservas->links() }}
           
        </div>
    @endif
@endsection