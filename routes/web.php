<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

Route::get('registros', [RegistroController::class, 'index']);