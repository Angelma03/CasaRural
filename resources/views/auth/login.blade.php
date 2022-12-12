@extends('layouts.usuario')

@section('content')


<div class="row mt-4 justify-content-center">
<div class="col-lg-4 border border-dark">
<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
@csrf
    <div class="row text-center bg-primary">
        <h1 class="h1">Iniciar Sesion</h1>
    </div>
        <label for="email" class="form-label mt-2">{{ __('Correo Electronico') }}:</label>
        <input id="email" type="email" class="form-control" name="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus>
        <div id="email" class="form-text">Escribe tu correo electronico</div>
        @error('email')
        <div class="border border-danger bg-danger text-white p-2">
            {{ $message }}
        </div>
        @enderror

        <label for="password" class="form-label mt-2">{{ __('Contraseña') }}:</label>
        <input id="password" type="password" class="form-control" name="password" required >
        <div id="password" class="form-text">Escribe tu contraseña</div>
        @error('contraseña')
        <div class="border border-danger bg-danger text-white p-2">
            {{ $message }}
        </div>
        @enderror

    <div class="row mt-3">
        <div class="col-lg-6">
            <label class="form-label" for="remember">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox">
                     {{ old('remember') ? 'checked' : '' }}
                <span class="ml-2">{{ __('Recordarme') }}</span>
            </label>
        </div>
    </div>

    <div class="row m-3">
        <button type="submit" class="btn btn-primary">
        {{ __('Iniciar Sesion') }}
        </button>
    </div>
    
 
        @if (Route::has('register'))
        <p class="text-center text-secondary">
            {{ __("¿No tienes cuenta?") }}
            <a class="text-blue" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
        </p>
        @endif
 
</form>
</div>
</div>
@endsection
