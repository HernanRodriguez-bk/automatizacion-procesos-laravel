<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/registros', [RegistroController::class, 'index']);
    Route::get('/registros/cargar', [RegistroController::class, 'create']);
    Route::post('/registros/cargar', [RegistroController::class, 'store']);
    Route::get('/registros/exportar', [RegistroController::class, 'exportar']);
});


require __DIR__.'/auth.php';
