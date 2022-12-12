<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Models\Casas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $user = Auth::user();
        $reservas=Reservas::all();
        foreach ($user->roles as $rol) {
            foreach($reservas as $reserva){
             if($rol->name=='Dueño' && $reserva->casa->dueño==$user->name){
                $reservas =  Reservas::where('user_id','=',Auth::user()->id)->
                OrwhereHas('casa' ,function($q){
                $q->where('dueño','=',Auth::user()->name);})
                ->get();
                
             }else{
                $reservas = $user->reservas()->paginate(10);

             }
            }
    }
        return view("reservas.index", compact("reservas"));
    }

    public function create(int $id)
    {
        $casa = Casas::find($id);
        $reserva = new Reservas;
        $title = __("hacer reserva");
        $textButton = __("Reservar");
        $route = route("reservas.store");
        return view("reservas.create", compact("title", "textButton", "route", "reserva","casa"));
    } 

    public function store(Request $request)
    {
        $this->validate($request, [
            "ocupantes" => "required|max:50",
            "fechaEntrada" => "required|date",
            "fechaSalida" =>"required|date|after_or_equal:fechaEntrada",
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
        $title = __("editar Reserva");
        $textButton = __("Actualizar");
        $route = route("reservas.update", ["reserva" => $reserva]);
        return view("reservas.edit", compact("update", "title", "textButton", "route", "reserva","casa"));
    }


    public function update(Request $request, Reservas $reserva)
    {

        $this->validate($request, [
            "ocupantes" => "required",
            "fechaEntrada" => "required|date",
            "fechaSalida" =>"required|date|after:fechaEntrada",
        ]);
        $reserva->fill($request->only("ocupantes","fechaEntrada","fechaSalida"));
        $reserva->save();
        return redirect(route("reservas.index"))
        ->with("success", __("reserva actualizada!"));
    }


    public function destroy(Reservas $reserva)
    {
        $reserva->delete();
        return redirect(route("reservas.index"))
        ->with("success", __("reserva eliminada!"));
    }
}
