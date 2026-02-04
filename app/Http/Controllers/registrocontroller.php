<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function index(Request $request)
    {
        $query = Registro::query();

        if ($request->filled('buscar')) {
            $query->where('codigo', 'like', '%' . $request->buscar . '%')
                ->orWhere('nombre', 'like', '%' . $request->buscar . '%')
                ->orWhere('email', 'like', '%' . $request->buscar . '%');
        }

        $registros = $query->orderBy('fecha', 'desc')->get();

        return view('registros.index', compact('registros'));
    }

    public function create()
    {
        return view('registros.cargar');
    }

    public function store(Request $request)
{
    $request->validate([
        'archivo' => 'required|mimes:csv,txt'
    ]);

    $archivo = $request->file('archivo');
    $ruta = $archivo->getRealPath();

    $datos = array_map('str_getcsv', file($ruta));

    // Eliminar encabezado
    unset($datos[0]);

    foreach ($datos as $fila) {
        Registro::updateOrCreate(
            ['codigo' => $fila[0]],
            [
                'nombre' => $fila[1],
                'email' => $fila[2],
                'fecha' => $fila[3],
                'estado' => $fila[4],
            ]
        );
    }

    return redirect('/registros')->with('success', 'Registros cargados correctamente');
}

}