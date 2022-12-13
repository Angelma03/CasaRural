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
        $title = __("crear casa");
        $textButton = __("Crear");
        $route = route("casas.store");

        return view("casas.create", compact("title", "textButton", "route", "casa"));
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'Nombre es un campo requerido',
            'nombre.max' =>'El nombre del estudiante no puede ser mayor a :50 caracteres',
            'nombre.unique' => 'Nombre de casa invalido debe ser unico',
            'descripcion.required' => 'La descripcion es un campo requerido',
            'descripcion.min' => 'La descripcion debe tener un minimo de 50 caracteres',
            'direccion.required'=>'La dirección es un campo requerido',
            'precio.required'=>'El precio es un campo requerido',
            'precio.min'=>'El precio deber ser mayor a 10 €',
            'precio.integer'=>'El precio tiene que ser un número',
            'precio.max'=>'El precio maximo de la casa es de 1000€',
            'capacidad.required'=>'La capacidad es un campo requerido',
            'capacidad.integer'=>'La capacidad debe ser un numero',
            'capacidad.min'=>'La capacidad debe tener un minimo de 1 persona',
            'imagen.required' => 'Imagen es un campo requerido',
            'imagen.mimes'=> 'El formato de la imagen debe ser valido',
            'imagen.image'=> 'El formato de la imagen debe ser valido'
        ];
        $this->validate($request,[
            "nombre" => "required|max:50|unique:casas,nombre," . $request->id,
            "descripcion" => "required|min:50",
            "direccion" =>"required|string|max:50",
            "precio" => "required|integer|min:10|max:1000",
            "capacidad" => "required|integer|min:1",
            "imagen" => "required|image|mimes:jpg,gif,png,jpeg|"
        ],$messages);
       
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
        $title = __("editar Casa");
        $textButton = __("Actualizar");
        $route = route("casas.update", ["casa" => $casa]);
        return view("casas.edit", compact("update", "title", "textButton", "route", "casa"));
    }


    public function update(Request $request, Casas $casa)

    {
        $messages = [
            'nombre.required' => 'Nombre es un campo requerido',
            'nombre.max' =>'El nombre del estudiante no puede ser mayor a :50 caracteres',
            'descripcion.required' => 'La descripcion es un campo requerido',
            'descripcion.min' => 'La descripcion debe tener un minimo de 50 caracteres',
            'direccion.required'=>'La dirección es un campo requerido',
            'precio.required'=>'El precio es un campo requerido',
            'precio.min'=>'El precio deber ser mayor a 10 €',
            'precio.integer'=>'El precio tiene que ser un número',
            'precio.max'=>'El precio maximo de la casa es de 1000€',
            'capacidad.required'=>'La capacidad es un campo requerido',
            'capacidad.min'=>'La capacidad debe tener un minimo de 1 persona',
            'capacidad.integer'=>'La capacidad debe ser un número',
            'imagen.required' => 'Imagen es un campo requerido',
            'imagen.mimes'=> 'El formato de la imagen debe ser valido',
            'imagen.image'=> 'El formato de la imagen debe ser valido'
        ];

        $this->validate($request, [
            "nombre" => "required|max:50",
            "descripcion" => "required|min:50",
            "direccion" =>"required|string|max:50",
            "precio" => "required|int|max:1000|min:10",
            "capacidad" => "required|int|min:1",
            "imagen" => "required|image|mimes:jpg,gif,png,jpeg|"
        ],$messages);
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
