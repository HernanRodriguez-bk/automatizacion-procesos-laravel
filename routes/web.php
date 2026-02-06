<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS DE REGISTROS - CON PROTECCIÓN DE ADMIN
Route::middleware(['auth'])->group(function () {
    // Rutas públicas para usuarios autenticados
    Route::get('/registros', [RegistroController::class, 'index']);
    Route::get('/registros/exportar', [RegistroController::class, 'exportar']);

    // Rutas solo para administradores
    Route::middleware('can:admin')->group(function () {
        Route::get('/registros/cargar', [RegistroController::class, 'create']);
        Route::post('/registros/cargar', [RegistroController::class, 'store']);
    });
});

require __DIR__.'/auth.php';