<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcesarPedidoRequest;
use App\Services\PedidoService;
use App\Models\ItemCarrito;
use Illuminate\Http\Request;
use Exception;

/**
 * CONTROLADOR DE PEDIDOS
 * Gestiona el paso final de la compra: la pasarela y el procesamiento del pedido.
 */
class PedidoController extends Controller
{
    protected $orderService;

    /**
     * Inyectamos el servicio de pedidos en el constructor.
     * De esta forma podemos usar toda la lógica de PedidoService.
     */
    public function __construct(PedidoService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Muestra la pantalla de confirmación antes de pagar.
     */
    public function mostrarPasarela(Request $request)
    {
        $metodo = $request->input('metodo_pago');
        $direccion = $request->input('direccion_envio');

        // Si faltan datos, devolvemos al usuario al carrito.
        if (!$metodo || !$direccion) {
            return redirect()->route('cliente.carrito');
        }

        $items = ItemCarrito::where('usuario_id', auth()->id())->with('producto')->get();
        
        // Si el carrito se ha quedado vacío (ej: por abrirlo en otra pestaña), volvemos.
        if ($items->isEmpty()) {
            return redirect()->route('cliente.carrito')->with('error', 'Tu carrito está vacío.');
        }

        // Calculamos el total de nuevo para mostrarlo en la pasarela.
        $total = $items->sum(fn($i) => $i->producto->price * $i->cantidad);
        if (session('codigo_descuento')) {
            $total *= 0.90;
        }

        return view('tienda.pasarela', [
            'metodo'    => $metodo,
            'direccion' => $direccion,
            'total'     => number_format($total, 2, ',', '.')
        ]);
    }

    /**
     * Acción final: crea el pedido en la base de datos.
     */
    public function procesarCompra(ProcesarPedidoRequest $request)
    {
        try {
            $datos = $request->validated();

            // Llamamos a nuestro servicio para que haga el trabajo sucio (BD, Stock, etc.).
            $this->orderService->procesarPedido(
                auth()->id(),
                $datos['direccion_envio'],
                $datos['metodo_pago']
            );

            // Si todo va bien, le mandamos a sus compras con un mensaje de éxito.
            return redirect()->route('cliente.mis-compras')->with('exito', '¡Pedido confirmado! Gracias por tu compra.');
            
        } catch (Exception $e) {
            // Si el servicio lanza un error (ej: falta de stock), lo capturamos y mostramos.
            return back()->with('error', $e->getMessage());
        }
    }
}
