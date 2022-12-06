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
        $route = route("reservas.store", ["casa" => $casa]);
        return view("reservas.create", compact("title", "textButton", "route", "reserva"));
    } 

    public function store(Request $request)
    {
        $this->validate($request, [
            "ocupantes" => "required|max:50",
            "fechaEntrada" => "required",
            "fechaSalida" =>"required",
        ]);
        $reserva = Reservas::create(array_merge(
            $request->only("nombre","fechaEntrada","fechaSalida"),
            [
                'user_id' => Auth::user()->id,

            ]   
        ));
    }
}
