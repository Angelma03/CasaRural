<?php

namespace App\Http\Controllers;

use App\Models\Casas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;


class DueñoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function index()
    {
        $user = Auth::user();
        $casas = $user->casas()->paginate(10);

        return view("casas.index", compact("casas"));
    }

    public function create()
    {
        $casa = new Casas;
        $title = __("Crear casa");
        $textButton = __("Crear");
        $route = route("casas.store");

        return view("casas.create", compact("title", "textButton", "route", "casa"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre" => "required|max:50|unique:casas,nombre," . $request->id,
            "descripcion" => "required|min:50",
            "direccion" =>"required|string|max:50",
            "precio" => "required|integer|min:10",
            "capacidad" => "required|integer|min:1",
            "imagen" => "required|image|mimes:jpg,gif,png,jpeg|"
        ]);
        $file = $request->file('imagen');
        $casa = Casas::create(array_merge(
            $request->only("nombre","dueño","descripcion","direccion","capacidad","precio"),
            [
                "imagen" => $file->storeAs(
                    'images',
                    uniqid()."-".$file->getClientOriginalName()

                ),
                'user_id' => Auth::user()->id,
                'dueño' => Auth::user()->name,
            ]   
        ));

        return redirect(route("casas.index"))
            ->with("success", __("Casa creada!"));
    }

    public function edit(Casas $casa)
    {
        $update = true;
        $title = __("Editar Casa");
        $textButton = __("Actualizar");
        $route = route("casas.update", ["casa" => $casa]);
        return view("casas.edit", compact("update", "title", "textButton", "route", "casa"));
    }


    public function update(Request $request, Casas $casa)

    {

        $this->validate($request, [
            "nombre" => "required",
            "descripcion" => "required|min:50",
            "direccion" =>"required|string|max:50",
            "precio" => "required|int|max:1000|min:10",
            "capacidad" => "required|int|min:1",
            "imagen" => "required|image|mimes:jpg,gif,png,jpeg|"
        ]);
        $casa->fill($request->only("nombre","dueño","descripcion","direccion","precio"));
        if($request->hasFile('imagen')){
            $req_file = $request->file('imagen');
            Storage::delete('images/'.$casa->imagen);
            $casa->imagen = $req_file->storeAs('images',
                $req_file->getClientOriginalName()
            );
        }
        $casa->save();
        return redirect(route("casas.index"))
        ->with("success", __("Casa actualizada!"));
    }


    public function destroy(Casas $casa)
    {
        $casa->delete();
        return back()->with("success", __("Casa eliminada!"));
    }

}
