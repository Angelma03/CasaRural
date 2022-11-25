<?php

namespace App\Http\Controllers;

use App\Models\Reservas;

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
        $user = Auth::user();
        $reservas = Reservas::with("user")->paginate(10);

        return view("reservas.index", compact("reservas"));
    }
}
