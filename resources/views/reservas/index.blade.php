@extends("layouts.reservas")
@section("content")
<!-- Cuerpo -->
<div class="row mt-4 justify-content-center">
    <div class="col-lg-10 text-center">
        <h2>Listado de reservas  de: {{ Auth::user()->name }}</h2>
    </div>    
</div>

<!-- Tabla -->

<div class="row mt-4 justify-content-center">
    <div class="col-lg-10">
<table class="table table-bordered border-dark bg-form">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">fecha de Entrada</th>
      <th scope="col">Fecha de Salida</th>
      <th scope="col">Ocupantes</th>
      <th scope="col">Precio Total:</th>
    </tr>
  </thead>
  <tbody>
  @forelse($reservas as $reserva)
    <tr>
      <th scope="row">{{$reserva->user->name}}</th>
      <td>{{$reserva->fechaEntrada}}</td>
      <td>{{$reserva->fechaSalida}}</td>
      <td>{{$reserva->capacidad}}</td>
      <td>{{$reserva->casa->precio}}</td>
    </tr>
    @empty
    <h2>El usuario {{ Auth::user()->name  }} no tiene reservas en la casa -></h2>
    @endforelse
  </tbody>
</table>
</div>
 

@endsection