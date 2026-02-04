<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

Route::get('registros', [RegistroController::class, 'index']);
Route::get('/registros/cargar', [RegistroController::class, 'create']);
Route::post('/registros/cargar', [RegistroController::class, 'store']);
