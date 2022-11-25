@extends("layouts.reservas")
<link href="/css/estilos.css" rel="stylesheet">
@section("content")
<!-- Cuerpo -->

@forelse($casas as $casa)
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <img src="{{$casa->imagen}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-lg-5">
                    <a class="text-decoration-none text-primary" href="{{ route('show',['id'=> $casa->id])}}"><h2>{{$casa->nombre}}</h2></a>
                        <p>{{$casa->direccion}}</p>
                        <p><?php
                           echo substr($casa->descripcion,0,450).' ...'; 
                        ?></p>
                        <p>{{$casa->precio}} € por dia</p>
                    </div>
                </div>
                @empty
                <div class="row mt-3">
                        <p class="h1">No hay casas disponibles</p>
                </div>
            @endforelse

@endsection