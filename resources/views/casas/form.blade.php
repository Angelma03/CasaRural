<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->

<form class="w-full max-w-lg border-4" method="POST" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
     <h1 class="font-semibold py-5 text-blue mb-10 bg-green-900 text-white px-5">{{ $title }} </h1>
     
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="nombre">
                {{ __("Nombre") }}
            </label>

            <input name="nombre" value="{{ old('nombre') ?? $casa->nombre }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombre" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre de la Casa") }}</p>
            @error("nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
           
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="precio">
                {{ __("Dueño") }}
            </label>
            <input name="descripcion" value="{{Auth::user()->name}}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="descripcion" type="text" disabled>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre del dueño") }}</p>    
        </div>
    </div>
    
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="descripcion">
                {{ __("Descripcion") }}
            </label>
            <textarea name="descripcion" value="{{ old('descripcion') ?? $casa->descripcion }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="descripcion"></textarea>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Descripcion de la página") }}</p>
            @error("descripcion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

  
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="direccion">
                {{ __("Direccion") }}
            </label>
            <input name="direccion" value="{{ old('direccion') ?? $casa->direccion}}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("¿Que dirección tiene tu casa?") }}</p>
            @error("direccion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="precio">
                {{ __("Precio") }}
            </label>
            <input name="precio" value="{{ old('precio') ?? $casa->precio}}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="precio" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("¿Que precio tiene tu casa por dia?") }}</p>
            @error("precio")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="imagen">
                {{ __("Imagen") }}
            </label>
            @if (isset($casa->imagen))
                <img src="{{asset($casa->imagen)}}" style=" max-height:100px; width: auto;">
            @endif

            <input type="file" name="imagen" class="form-control" placeholder="Imagen">
            @error("imagen")
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    {{ $message }}
                </div>
            @enderror

        </div>
    </div>
    <div class="md:flex md:items-center">
        <div class="md:w-1/3 m-3">
            <button class="shadow bg-teal-700 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>