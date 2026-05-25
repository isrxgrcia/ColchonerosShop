<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;

/**
 * ARCHIVO DE RUTAS WEB
 * Aquí definimos todas las URLs de nuestra aplicación y qué controlador las maneja.
 */

// Página de inicio: Lo primero que ve el usuario al entrar.
Route::get('/', [InicioController::class, 'index'])->name('inicio');

// Catálogo de productos: Podemos filtrar por género (hombre/mujer) y categoría.
Route::get('/catalogo/{genero?}/{categoria?}', [ProductoController::class, 'index'])->name('productos.index');

// Ficha de un producto: Muestra los detalles de un producto específico mediante su ID.
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.mostrar');

/**
 * RUTAS DE AUTENTICACIÓN (Solo para invitados)
 * El middleware 'guest' hace que si ya estás logueado, no puedas entrar aquí.
 */
Route::middleware('guest')->group(function () {
    // Mostrar el formulario de login y procesar la entrada del usuario.
    Route::get('/login',    [AuthController::class, 'mostrarLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'procesarLogin'])->name('login.procesar');
    
    // Formulario de registro para nuevos clientes.
    Route::get('/registro', [AuthController::class, 'mostrarRegistro'])->name('registro');
    Route::post('/registro',[AuthController::class, 'procesarRegistro'])->name('registro.procesar');
});

// Cerrar sesión: Solo para usuarios que han iniciado sesión.
Route::post('/logout', [AuthController::class, 'cerrarSesion'])->name('logout')->middleware('auth');

/**
 * RUTAS DEL CLIENTE (Requieren estar logueado)
 * Todas estas rutas empiezan por 'tienda/' y tienen el nombre 'cliente.' delante.
 */
Route::middleware(['auth'])->prefix('tienda')->name('cliente.')->group(function () {
    // Ver productos nuevos.
    Route::get('/novedades',   [ClienteController::class, 'novedades'])->name('novedades');
    
    // Gestión del carrito: ver, añadir productos, aplicar descuentos y borrar productos.
    Route::get('/carrito',     [ClienteController::class, 'verCarrito'])->name('carrito');
    Route::post('/carrito/agregar', [ClienteController::class, 'agregarAlCarrito'])->name('carrito.agregar');
    Route::post('/carrito/descuento', [ClienteController::class, 'aplicarDescuento'])->name('carrito.descuento');
    Route::delete('/carrito/descuento', [ClienteController::class, 'eliminarDescuento'])->name('carrito.descuento.eliminar');
    Route::delete('/carrito/{item}', [ClienteController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
    
    // Perfil del cliente: historial de compras y datos personales.
    Route::get('/mis-compras', [ClienteController::class, 'misCompras'])->name('mis-compras');
    Route::get('/cuenta',      [ClienteController::class, 'cuenta'])->name('cuenta');
    Route::post('/cuenta',     [ClienteController::class, 'actualizarCuenta'])->name('cuenta.actualizar');
    
    // Proceso de compra: pasarela de pago y finalizar pedido.
    Route::match(['get', 'post'], '/pasarela', [PedidoController::class, 'mostrarPasarela'])->name('pasarela');
    Route::post('/pagar',      [PedidoController::class, 'procesarCompra'])->name('pagar');
});

/**
 * RUTAS DE ADMINISTRACIÓN (Solo para el administrador)
 * Tienen el prefijo 'admin/' y requieren el middleware 'es_admin'.
 */
Route::middleware(['auth', 'es_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Panel principal de administración.
    Route::get('/',         [AdminController::class, 'panel'])->name('panel');
    
    // Gestión de pedidos: ver lista y cambiar el estado (pendiente, enviado, etc.).
    Route::get('/pedidos',  [AdminController::class, 'gestionPedidos'])->name('pedidos');
    Route::patch('/pedidos/{pedido}/estado/{estado}', [AdminController::class, 'actualizarEstadoPedido'])->name('pedidos.estado');
    
    // Gestión de inventario: ver stock y actualizar cantidades.
    Route::get('/stock',    [AdminController::class, 'gestionStock'])->name('stock');
    Route::patch('/stock/{inventario}/{cantidad}', [AdminController::class, 'actualizarStock'])->name('stock.actualizar');
    
    // Listado de usuarios registrados.
    Route::get('/usuarios', [AdminController::class, 'gestionUsuarios'])->name('usuarios');
});
