<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * CONTROLADOR DE ADMINISTRACIÓN
 * Aquí se gestiona todo el panel de control para el administrador.
 */
class AdminController extends Controller
{
    /**
     * Muestra el panel principal (Dashboard) con estadísticas rápidas.
     */
    public function panel()
    {
        $stats = [
            'totalPedidos'   => Order::count(),
            'totalProductos' => Product::count(),
            'totalUsuarios'  => User::where('role', 'cliente')->count(),
            'bajoStock'      => Inventory::where('stock_quantity', '<=', 3)->count(),
        ];

        // Cogemos los 8 últimos pedidos para mostrarlos en una tabla.
        $pedidosRecientes = Order::with('user')->latest()->take(8)->get();

        return view('admin.panel', compact('stats', 'pedidosRecientes'));
    }

    /**
     * Lista todos los pedidos con posibilidad de filtrar por ID o estado.
     */
    public function gestionPedidos(Request $request)
    {
        $buscar = $request->input('buscar');
        $estado = $request->input('estado');

        $pedidos = Order::with(['user', 'orderItems.product'])
            ->when($buscar, fn($q) => $q->where('id', $buscar)->orWhereHas('user', fn($u) => $u->where('name', 'LIKE', "%$buscar%")->orWhere('email', 'LIKE', "%$buscar%")))
            ->when($estado && $estado !== 'todos', fn($q) => $q->where('status', $estado))
            ->latest()
            ->paginate(20)
            ->withQueryString(); // Mantiene los filtros en la paginación.

        return view('admin.pedidos', compact('pedidos'));
    }

    /**
     * Cambia el estado de un pedido (ej: de Pendiente a Enviado).
     */
    public function actualizarEstadoPedido(Order $pedido, string $nuevoEstado)
    {
        $estadosValidos = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
        
        if (in_array($nuevoEstado, $estadosValidos)) {
            $pedido->update(['status' => $nuevoEstado]);
            return back()->with('exito', "Pedido actualizado correctamente.");
        }

        return back()->withErrors(['estado' => 'Ese estado no vale.']);
    }

    /**
     * Muestra el inventario de productos para que el admin pueda cambiar el stock.
     */
    public function gestionStock(Request $request)
    {
        $buscar = $request->input('buscar');
        $genero = $request->input('genero');
        $catId  = $request->input('categoria_id');

        $productos = Product::with(['inventories', 'category'])
            ->when($buscar, fn($q) => $q->where(fn($sub) => $sub->where('name', 'LIKE', "%$buscar%")->orWhere('id', $buscar)))
            ->when($genero && $genero !== 'todos', fn($q) => $q->whereHas('category', fn($c) => $c->where('gender', $genero)))
            ->when($catId  && $catId !== 'todas', fn($q) => $q->where('category_id', $catId))
            ->orderBy('name')
            ->paginate(30)
            ->withQueryString();

        $categorias = Category::orderBy('name')->get();

        return view('admin.stock', compact('productos', 'categorias'));
    }

    /**
     * Actualiza la cantidad de stock de una talla de un producto.
     */
    public function actualizarStock(Inventory $inventario, int $cantidad)
    {
        // Usamos max(0, $cantidad) para que el stock nunca sea negativo.
        $inventario->update(['stock_quantity' => max(0, $cantidad)]);
        return back()->with('exito', 'Stock guardado.');
    }

    /**
     * Lista todos los usuarios registrados en el sistema.
     */
    public function gestionUsuarios(Request $request)
    {
        $buscar = $request->input('buscar');
        $rol    = $request->input('rol');

        $usuarios = User::query()
            ->when($buscar, fn($q) => $q->where('name', 'LIKE', "%$buscar%")->orWhere('email', 'LIKE', "%$buscar%")->orWhere('id', $buscar))
            ->when($rol && $rol !== 'todos', fn($q) => $q->where('role', $rol))
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view('admin.usuarios', compact('usuarios'));
    }
}
