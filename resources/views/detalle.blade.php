@extends("layouts.reservas")
<link href="/css/estilos.css" rel="stylesheet">
@section("content")
<div class="row mt-4  justify-content-center">
    <div class="col-lg-10">
        <img src="/{{$casa->imagen}}" class="img-fluid" alt="Responsive image">
    </div>
</div>

<div class="row mt-4 justify-content-center">
    <div class="col-lg-10">
        <h1 class="text-center">{{$casa->nombre}}</h1>
    </div>
</div>

<div class="row mt-4 justify-content-center">
    <div class="col-lg-2">
        <p class="text-center"><strong>{{$casa->direccion}}</strong></p>
    </div>
    <div class="col-lg-2">
        <p class="text-center"><strong>máximo {{$casa->capacidad}} personas</strong></p>
    </div>
    <div class="col-lg-2">
        <p class="text-center"><strong>{{$casa->precio}} € por dia</strong></p>
    </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-lg-10 text-center h3">Descripcion de la casa </div>
</div>
<div class="row justify-content-center mt-4 mb-3">
    <div class="col-lg-10 text-center">{{$casa->descripcion}}</div>
</div>

<div class="row mt-4 align-items-center justify-content-center">
    <div class="col-lg-2">
        <button type='button' class="btn btn-primary">
            <a class="text-decoration-none text-white h4" href="{{route('reservas.create')}}">Crear Reserva</a>
        </button> 
    </div>
    <div class="col-lg-3">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d181.2872873239861!2d-5.864458839235631!3d43.36454811340339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1669329468110!5m2!1ses!2ses" 
        width="400" height="300" style="border:0;"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
@endsection
