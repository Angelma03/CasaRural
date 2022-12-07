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

    public function create(int $id)
    {
        $casa = Casas::find($id);
        $reserva = new Reservas;
        $title = __("Crear reserva");
        $textButton = __("Crear");
        $route = route("reservas.store");
        return view("reservas.create", compact("title", "textButton", "route", "reserva","casa"));
    } 

    public function store(Request $request)
    {
        $this->validate($request, [
            "ocupantes" => "required|max:50",
            "fechaEntrada" => "required",
            "fechaSalida" =>"required",
        ]);
        $reserva = Reservas::create(array_merge(
            $request->only("ocupantes","fechaEntrada","fechaSalida"),
            [
                'casa_id' =>($request->input("id_casa")),
                'user_id' => Auth::user()->id,
                
            ]   
        ));
        return redirect(route("reservas.index"))
        ->with("success", __("Reserva creada!"));
    }

    public function edit(Reservas $reserva)
    {
        $casa = Casas::find($reserva->casa_id);
        $update = true;
        $title = __("Editar Reserva");
        $textButton = __("Actualizar");
        $route = route("reservas.update", ["reserva" => $reserva]);
        return view("reservas.edit", compact("update", "title", "textButton", "route", "reserva","casa"));
    }


    public function update(Request $request, Reservas $reserva)
    {

        $this->validate($request, [
            "ocupantes" => "required",
            "fechaEntrada" => "required",
            "fechaSalida" =>"required",
        ]);
        $reserva->fill($request->only("ocupantes","fechaEntrada","fechaSalida"));
        $reserva->save();
        return redirect(route("reservas.index"))
        ->with("success", __("reserva actualizada!"));
    }


    public function destroy(Reservas $reserva)
    {
        $reserva->delete();
        return back()->with("success", __("reserva eliminada!"));
    }
}
