@extends("layouts.reservas")
@section("content")
<!-- Cuerpo -->

@forelse($casas as $casa)
                <div class="row mt-4">
                    <div class="col-lg-6" >
                        <img src="{{$casa->imagen}}" width="800px" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-lg-5">
                    <a class="text-decoration-none text-primary h1" href="{{ route('show',['id'=> $casa->id])}}"><h2>{{$casa->nombre}}</h2></a>
                        <p class="h5 mt-3 mb-4"><strong>{{$casa->direccion}}</strong></p>
                        <p class="mb-2"><?php
                           echo substr($casa->descripcion,0,500).' ...'; 
                        ?></p>
                        <p class="mt-4"><strong>{{$casa->precio}} € por dia</strong></p>
                        <p class="mt-5"><strong>Propietario: {{$casa->dueño}}</strong></p>
                    </div>
                </div>
              
                @empty
                <div class="row mt-3">
                        <p class="h1 text-center">No hay casas disponibles</p>
                </div>

            @endforelse
            @if($casas->count())
                <div class="mt-3">
                    {{ $casas->links() }}
                </div>
                 @endif
       

@endsection