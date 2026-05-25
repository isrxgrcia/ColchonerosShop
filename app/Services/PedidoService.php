<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Inventory;
use App\Models\ItemCarrito;
use Illuminate\Support\Facades\DB;
use Exception;

/**
 * SERVICIO DE PEDIDOS
 * Esta clase se encarga de toda la lógica compleja de crear un pedido.
 * Centralizamos aquí la lógica para no llenar los controladores de código.
 */
class PedidoService
{
    /**
     * Procesa la compra del carrito de un usuario.
     * Recibe el ID del usuario, la dirección de envío y el método de pago.
     */
    public function procesarPedido(int $userId, string $address, string $method): Order
    {
        // 1. Buscamos los productos que el usuario tiene en su carrito.
        $items = ItemCarrito::where('usuario_id', $userId)->with('producto')->get();

        // Si no hay productos, lanzamos una excepción (un error controlado).
        if ($items->isEmpty()) {
            throw new Exception("¡La cesta está vacía! No hay nada que comprar.");
        }

        // Transacción: si algo falla, no se guarda nada.
        return DB::transaction(function () use ($userId, $address, $method, $items) {
            $total = 0;

            // 2. Primera pasada: Validamos el stock de todos los productos.
            foreach ($items as $item) {
                // Buscamos el inventario para ese producto y talla.
                // lockForUpdate() bloquea esa fila para que nadie más la toque mientras compramos.
                $stock = Inventory::where('product_id', $item->producto_id)
                                  ->where('size', $item->talla)
                                  ->lockForUpdate()
                                  ->first();

                // Si no hay stock suficiente, cancelamos todo con un error.
                if (!$stock || $stock->stock_quantity < $item->cantidad) {
                    throw new Exception("¡Qué mala suerte! '{$item->producto->name}' se ha agotado en esa talla.");
                }

                // Sumamos al total del pedido.
                $total += ($item->producto->price * $item->cantidad);
            }

            // 3. Aplicamos descuento si existe en la sesión.
            if (session('codigo_descuento')) {
                $total *= 0.90; // 10% de descuento.
            }

            // 4. Creamos la cabecera del pedido (la tabla orders).
            $pedido = Order::create([
                'user_id'          => $userId,
                'total_amount'     => $total,
                'shipping_address' => $address,
                'payment_method'   => $method,
                'status'           => 'pending' // El pedido empieza como pendiente.
            ]);

            // 5. Guardamos las líneas del pedido (order_items) y restamos el stock.
            foreach ($items as $item) {
                OrderItem::create([
                    'order_id'   => $pedido->id,
                    'product_id' => $item->producto_id,
                    'size'       => $item->talla,
                    'quantity'   => $item->cantidad,
                    'unit_price' => $item->producto->price
                ]);

                // Restamos la cantidad comprada del inventario.
                $stock->decrement('stock_quantity', $item->cantidad);
            }

            // 6. Limpiamos el carrito del usuario y el cupón de descuento.
            ItemCarrito::where('usuario_id', $userId)->delete();
            session()->forget('codigo_descuento');

            // Devolvemos el pedido recién creado.
            return $pedido;
        });
    }
}
