<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

// Ruta principal
Route::get('/', [InicioController::class, 'index'])->name('inicio');
