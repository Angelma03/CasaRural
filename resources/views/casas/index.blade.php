@extends("layouts.casas")
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
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Direccion</th>
      <th scope="col">Precio</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($casas as $casa)
    <tr>
      <th scope="row">{{ $casa->id }}</th>
      <td>{{ $casa->nombre }}</td>
      <td><?php echo substr($casa->descripcion,0,200).' ...'?></td>
      <td>{{ $casa->direccion}}</td>
      <td>{{ $casa->precio }}</td>
      <td>{{ $casa->imagen }}</td>
    <td>
        <div class="row justify-content-center ">
            <button type="button" class="btn btn-warning col-lg-10">
                <a class="text-dark text-decoration-none" href="{{route('casas.edit',['casa' => $casa]) }}">Editar</a>
            </button>
        </div>
        <div class="row justify-content-center mt-2">
            <button type="button" class="btn btn-danger col-lg-10">
                <a href="#" onclick="event.preventDefault();
                document.getElementById('delete-casa-{{ $casa->id }}-form').submit();" class="text-white text-decoration-none">
                Eliminar
                </a>
            </button>
        </div>
        <form id="delete-casa-{{ $casa->id }}-form" action="{{ route('casas.destroy', ['casa' => $casa]) }}" method="POST" class="hidden">
            @method("DELETE")
            @csrf
        </form>
    </td>
    </tr>
    @empty
    @endforelse
  </tbody>
</table>
</div>
 
@if($casas->count())
        <div class="mt-3">
            {{ $casas->links() }}
           
        </div>
    @endif

@endsection