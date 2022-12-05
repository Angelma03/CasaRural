<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Models\Casas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all()->pluck('name','id');
        return view("auth.register", compact("roles"));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view("auth.register", compact("roles"));
    }


}
