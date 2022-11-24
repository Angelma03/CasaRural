<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->

<div class="row justify-content-center mt-4">
<div class="col-lg-4  border border-dark">
<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
@csrf
    @isset($update)
        @method("PUT")
    @endisset
            <div class="row bg-form mb-1">
                <h3 class="text-center ">Formulario para {{$title}}</h3>
            </div>
            <label for="nombre" class="form-label"> {{ __("Nombre") }}: </label>
            <input name="nombre" value="{{ old('nombre') ?? $casa->nombre }}" class="form-control" id="nombre" aria-describedby="nombre">
            <div id="nombre" class="form-text">Escribe el nombre de la casa</div>
            @error("nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror


            <label for="descripcion" class="form-label">Descripción: </label>
            <textarea name="descripcion"  class="form-control" id="descripcion" aria-describedby="descripcion">{{ old('descripcion') ?? $casa->descripcion }}</textarea>
            <div id="descripcion"  class="form-text">Escribe la descripción de la casa</div>
            @error("descripcion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror


            <label for="direccion" class="form-label">Dirección: </label>
            <input name="direccion" value="{{ old('direccion') ?? $casa->direccion }}" class="form-control" id="direccion" aria-describedby="direccion">
            <div id="direccion" class="form-text">Escribe la direccion de la casa</div>
            @error("direccion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror


            <label for="precio" class="form-label">Precio: </label>
            <input name="precio" value="{{ old('precio') ?? $casa->precio }}"class="form-control" id="precio" aria-describedby="precio">
            <div id="precio" class="form-text">Escribe el precio de casa por dia</div>
            @error("precio")
            <div class="border border-danger">
                {{ $message }}
            </div>
            @enderror


            

            <label for="imagen" class="form-label">Imagen:</label>
            @if (isset($casa->imagen))
            <img src="{{asset($casa->imagen)}}" style=" max-height:100px; width: auto;">
            @endif
            <input class="form-control" type="file" id="imagen" name="imagen">
            @error("imagen")
            <div class="imagen">
            {{ $message }}
            </div>
            @enderror

            <button class="justify-content-center m-3 bg-success" type="submit">
                {{ $textButton }}
            </button>
</form>
</div>
</div>