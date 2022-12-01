@extends('layouts.usuario')

@section('content')
<div class="row mt-4 justify-content-center">
<div class="col-lg-4 border border-dark">
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
@csrf

    <div class="row text-center bg-primary">
        <h1>Registrarse</h1>
    </div>
    <label for="nombre" class="form-label mt-2">{{ __('Nombre') }}:</label>
    <input id="nombre" type="text" class="form-control" name="nombre" 
    value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
    <div id="email" class="form-text">Escribe tu nombre de usuario</div>
        @error('nombre')
    <p class="border border-danger bg-danger text-white p-2">
        {{ $message }}
    </p>
    @enderror

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

    <label for="password-confirm" class="form-label mt-2">
        {{ __('Confirma la contraseña') }}:
    </label>
    <input id="password-confirm" type="password" class="form-control"
    name="password_confirmation" required autocomplete="new-password">
    <div id="password" class="form-text">Confirma tu contraseña</div>
    <div class="row m-3">
        <button type="submit" class="btn btn-primary">
            {{ __('Registrarse') }}
        </button>
    </div>

        <p class="text-center text-secondary">
            {{ __("¿Ya tienes cuenta?") }}
            <a class="text-blue" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
        </p>
    </form>
</div>
</div>
@endsection
