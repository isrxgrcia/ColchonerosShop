<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;

// Ruta para ver la configuración (debug)
Route::get('/debug-config', function () {
    return [
        'view.compiled' => config('view.compiled'),
        'storage_path_views' => storage_path('framework/views'),
        'realpath_storage_path_views' => realpath(storage_path('framework/views')),
        'is_writable' => is_writable(storage_path('framework/views')),
    ];
});

// Ruta principal de la tienda
Route::get('/', [InicioController::class, 'index'])->name('inicio');

// Rutas para el catálogo y ver un producto solo
Route::get('/catalogo/{genero?}/{categoria?}', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.mostrar');

// Rutas de autenticación (por ahora solo redirigen)
Route::get('/login',    fn() => redirect('/') )->name('login');
Route::get('/registro', fn() => redirect('/') )->name('registro');
Route::post('/logout',  fn() => redirect('/') )->name('logout');
Route::get('/tienda/carrito',     fn() => redirect('/') )->name('cliente.carrito');
Route::get('/tienda/cuenta',      fn() => redirect('/') )->name('cliente.cuenta');
Route::get('/tienda/mis-compras', fn() => redirect('/') )->name('cliente.mis-compras');
Route::post('/tienda/carrito/agregar', fn() => redirect('/') )->name('cliente.carrito.agregar');

Route::get('/admin', fn() => redirect('/') )->name('admin.panel');
