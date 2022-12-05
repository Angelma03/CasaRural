@extends('layouts.usuario')

@section('content')
<div class="row mt-4 justify-content-center">
<div class="col-lg-4 border border-dark">
<div class="row text-center bg-primary">
        <h1>Registrarse</h1>
    </div>
<form method="POST" action="{{ route('register') }}">
@csrf

   
    <label for="name" class="form-label mt-2">{{ __('Nombre') }}:</label>
    <input id="name" type="text" class="form-control  @error('name')  border-danger @enderror"
    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    <div id="name" class="form-text">Escribe tu nombre de usuario</div>
        @error('name')
    <div class="border border-danger bg-danger text-white p-2">
        {{ $message }}
</div>
    @enderror

    <label for="email" class="form-label mt-2">{{ __('Correo Electronico') }}:</label>
    <input id="email" type="email" class="form-control @error('email') border-danger @enderror" name="email"
    value="{{ old('email') }}" required autocomplete="email" autofocus>
    <div id="email" class="form-text">Escribe tu correo electronico</div>
        @error('email')
    <div class="border border-danger bg-danger text-white p-2">
        {{ $message }}
    </div>
    @enderror

    <label for="password" class="form-label mt-2">{{ __('Contraseña') }}:</label>
    <input id="password" type="password" class="form-control @error('password') border-danger @enderror" name="password" required autocomplete="new-password" >
    <div id="password" class="form-text">Escribe tu contraseña</div>
    @error('password')
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

    <select class="form-select mt-4" type="select" name="roles" id="roles" aria-label="rol">
    <option selected disabled>Elige un Rol para tu usuario</option>
        @forelse($roles as $id=>$rol)

        <option>{{$rol}}</option>
        @empty
        @endforelse
  
    </select>

    <div class="row m-3">
        <button type="submit" class="btn btn-primary leading-normal">
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
