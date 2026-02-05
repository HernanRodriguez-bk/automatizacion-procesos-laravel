<?php

namespace App\Http\Controllers;

use App\Models\Registro;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Registro::count();
        $activos = Registro::where('estado', 'Activo')->count();
        $pendientes = Registro::where('estado', 'Pendiente')->count();

        $ultimos = Registro::orderBy('created_at', 'desc')->take(5)->get();

        $porEstado = Registro::selectRaw('estado, COUNT(*) as total')
        ->groupBy('estado')
        ->pluck('total', 'estado');


        return view('dashboard.index', compact(
            'total',
            'activos',
            'pendientes',
            'ultimos',
            'porEstado'
        ));
    }
}
