@extends("layouts.reservas")
@section("content")
@if (session('success'))
    <div class="bg-danger text-center border border-danger text-success px-4 py-3 rounded relative" role="alert">
    <p><strong class="font-bold">{{ session('success') }}</strong></p>
    </div>
@endif
<!-- Cuerpo -->
<div class="row mt-4 justify-content-center">
    <div class="col-lg-10 text-center">
        <h2>Listado de reservas  de: {{ Auth::user()->name }}</h2>
    </div>    
</div>
<!-- Tabla -->

<div class="row mt-4 justify-content-center">
    <div class="col-lg-10">
<table class="table table-bordered border-dark bg-form table align-middle">
  <thead>
    <tr class="text-center">
      <th scope="col">Cliente</th>
      <th scope="col">fecha de Entrada</th>
      <th scope="col">Fecha de Salida</th>
      <th scope="col">Ocupantes</th>
      <th scope="col">Precio Total:</th>
      <th scope="col">Acciones:</th>
    </tr>
  </thead>
  <tbody>
  @forelse($reservas as $reserva)
    <tr class="text-center">
      <th scope="row">{{$reserva->user->name}}</th>
      <td>{{$reserva->fechaEntrada}}</td>
      <td>{{$reserva->fechaSalida}}</td>
      <td>{{$reserva->ocupantes}} personas</td>
      <td><?php 
        $fecha1=new DateTime($reserva->fechaEntrada);
        $fecha2=new DateTime($reserva->fechaSalida);
        $diff = $fecha1->diff($fecha2);
        $precioTotal=$diff->days*$reserva->casa->precio;
        echo $precioTotal;
      ?> €</td>
      <td>
        <div class="row justify-content-center ">
            <button type="button" class="btn btn-warning col-lg-7">
                <a class="text-dark text-decoration-none " href="{{route('reservas.edit',['reserva' => $reserva]) }}">Editar</a>
            </button>
        </div>
        <div class="row justify-content-center mt-2">
            <button type="button" class="btn btn-danger col-lg-7">
                <a href="#" onclick="event.preventDefault();
                document.getElementById('delete-casa-{{ $reserva->id }}-form').submit();" class="text-white text-decoration-none">
                Eliminar
                </a>
            </button>
        </div>
        <form id="delete-casa-{{ $reserva->id }}-form" action="{{ route('reservas.destroy', ['reserva' => $reserva]) }}" method="POST" class="hidden">
            @method("DELETE")
            @csrf
        </form>
    </td>
    </tr>
    @empty
    <h2>El usuario {{ Auth::user()->name  }} no tiene reservas en la casa -></h2>
    @endforelse
  </tbody>
</table>
</div>
</div>
@endsection