@extends("layouts.reservas")
@section("content")
<!-- Cuerpo -->
<div class="row mt-4 justify-content-center">
    <div class="col-lg-10 text-center">
        <h2>Listado de reservas  de: {{ Auth::user()->name }}</h2>
    </div>    
</div>

<div class="row mt-4 justify-content-center">
    <button type='button' class="btn btn-crear-casa col-lg-2 border border-transparent rounded">
        <a class="a-crear-casa text-decoration-none h4" href="">
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
      <th scope="col">fechaEntrada</th>
      <th scope="col">fechaEntrada</th>
      <th scope="col">FechaSalida</th>
      <th scope="col">capacidad</th>
    </tr>
  </thead>
  <tbody>
  @forelse($reservas as $reserva)
    <tr>
      <th scope="row">{{ Auth::user()->name  }}</th>
      <td>{{$reserva->casas->nombre}}</td>
      <td>{{$reserva->fechaEntrada}}</td>
      <td>{{$reserva->fechaSalida}}</td>
      <td>{{$reserva->capacidad}}</td>
    </tr>
    @empty
    <h2>El usuario {{ Auth::user()->name  }} no tiene reservas en la casa -></h2>
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