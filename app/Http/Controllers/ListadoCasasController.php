<?php

namespace App\Http\Controllers;

use App\Models\Casas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class listadoCasasController extends Controller
{

    public function index()
    {
        $casas=Casas::all();
        return view('listadocasas', compact('casas'));
    }
}