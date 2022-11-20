<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Listado Casas</title>
</head>
<body>
<div class="container-fluid">
<!-- Menu -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-success">
    <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand">Casa Rural</a>
        </div>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Inicio</a></li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/listadocasas') }}">Nuestras casas </a>
            </li>
        </ul>
        @if(Route::has('login'))
                @auth
                <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                        <a class="nav-link" href="/home">Dueño</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 1 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg> {{ Auth::user()->name }}</span></a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav navbar-right">
                    <li class ="nav-item">
                        <a class ="nav-link aling-items-center" href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 1 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Iniciar Sesion</a>
                    </li>
                    @if (Route::has('register'))
                        <li class ="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 1 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg> Registrarse</a>
                        </li>
                    @endif
                @endauth
    </ul>
        @endif
    </div>
    </nav>
<!-- Cuerpo -->

  
    
</body>
</html> 