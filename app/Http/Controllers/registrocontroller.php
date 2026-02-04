<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function index()
    {
        $registros = Registro::orderBy('fecha', 'desc')->get();
        return view('registros.index', compact('registros'));
    }
}
