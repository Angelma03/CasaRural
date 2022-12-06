<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Models\Casas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class ReservasController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function index()
    {
        $reservas = Reservas::all();
        return view("reservas.index", compact("reservas"));
    }

    public function create()
    {
        $reserva = new Reservas;
        $title = __("Crear reserva");
        $textButton = __("Crear");
        $route = route("reservas.store");

        return view("reservas.create", compact("title", "textButton", "route", "reserva"));
    }
}
