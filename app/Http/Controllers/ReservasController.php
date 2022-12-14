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
                ->paginate(10);
                
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
        $fechasEntrada = Reservas::all()->where('casa_id','=',$id)->pluck('fechaEntrada');
        $fechasSalida = Reservas::all()->where('casa_id','=',$id)->pluck('fechaSalida');
        $reserva = new Reservas;
        $title = __("hacer reserva");
        $textButton = __("Reservar");
        $route = route("reservas.store");
        return view("reservas.create", compact("title", "textButton", "route", "reserva","casa","fechasEntrada","fechasSalida"));
    } 

    public function store(Request $request){
        $messages= [
            'ocupantes.required'=> 'El campo ocupantes es requerido',
            'ocupantes.integer'=> 'El campo ocupantes debe ser un numero',
            'fechaEntrada.required'=> 'El campo fecha de entrada es requerido',
            'fechaEntrada.date'=> 'El campo fecha de entrada debe tener una fecha correcta',
            'fechaSalida.required'=> 'El campo fecha de salida es requerido',
            'fechaSalida.date'=> 'El campo fecha de salida deber tener una fecha correcta',
            'fechaSalida.after'=> 'El campo fecha salida deber ser posterior a la de entrada'
        ];
       
        $this->validate($request, [
            "ocupantes" => "required|integer",
            "fechaEntrada" => "required|date",
            "fechaSalida" =>"required|date|after:fechaEntrada"
        ],$messages);
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
        $fechasEntrada = Reservas::all()->where('casa_id','=',$casa->id)->pluck('fechaEntrada');
        $fechasSalida = Reservas::all()->where('casa_id','=',$casa->id)->pluck('fechaSalida');
        $update = true;
        $title = __("editar reserva");
        $textButton = __("Actualizar");
        $route = route("reservas.update", ["reserva" => $reserva]);
        return view("reservas.edit", compact("update", "title", "textButton", "route", "reserva","casa","fechasEntrada","fechasSalida"));
    }


    public function update(Request $request, Reservas $reserva)
    {

        $messages= [
            'ocupantes.required'=> 'El campo ocupantes es requerido',
            'ocupantes.integer'=> 'El campo ocupantes debe ser un numero',
            'fechaEntrada.required'=> 'El campo fecha de entrada es requerido',
            'fechaEntrada.date'=> 'El campo fecha de entrada debe tener una fecha correcta',
            'fechaSalida.required'=> 'El campo fecha de salida es requerido',
            'fechaSalida.date'=> 'El campo fecha de salida deber tener una fecha correcta',
            'fechaSalida.after'=> 'El campo fecha salida deber ser posterior a la de entrada',
        ];
        $this->validate($request, [
            "ocupantes" => "required|integer",
            "fechaEntrada" => "required|date",
            "fechaSalida" =>"required|date|after:fechaEntrada",
        ],$messages);
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
