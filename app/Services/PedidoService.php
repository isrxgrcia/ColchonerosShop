<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Inventory;
use App\Models\ItemCarrito;
use Illuminate\Support\Facades\DB;
use Exception;

class PedidoService
{
    // Función para finalizar la compra y crear el pedido
    public function procesarPedido(int $userId, string $shippingAddress, string $paymentMethod): Order
    {
        $cartItems = ItemCarrito::where('usuario_id', $userId)->with('producto')->get();

        // Si no hay nada en el carro, lanzamos error
        if ($cartItems->isEmpty()) {
            throw new Exception("El carrito está vacío. No se puede procesar el pedido.");
        }

        // Usamos una transacción para que si algo falla, no se guarde nada a medias
        return DB::transaction(function () use ($userId, $shippingAddress, $paymentMethod, $cartItems) {
            
            $totalAmount = 0;

            // Recorremos los productos para comprobar stock y calcular total
            foreach ($cartItems as $item) {
                $stockRecord = Inventory::where('product_id', $item->producto_id)
                                        ->where('size', $item->talla)
                                        ->lockForUpdate()
                                        ->first();

                if (!$stockRecord) {
                    throw new Exception("El producto '{$item->producto->name}' ya no está disponible.");
                }

                if ($stockRecord->stock_quantity < $item->cantidad) {
                    throw new Exception("Stock insuficiente para: {$item->producto->name} (Talla: {$item->talla}).");
                }

                $totalAmount += ($item->producto->price * $item->cantidad);
            }

            // Aplicamos descuento si existe el cupón en la sesión
            if (session()->has('codigo_descuento')) {
                $totalAmount = $totalAmount - ($totalAmount * 0.10);
            }

            // Creamos el registro del pedido
            $order = Order::create([
                'user_id'          => $userId,
                'total_amount'     => $totalAmount,
                'shipping_address' => $shippingAddress,
                'payment_method'   => $paymentMethod,
                'status'           => 'pending'
            ]);

            // Guardamos cada línea del pedido y restamos el stock
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->producto_id,
                    'size'       => $item->talla,
                    'quantity'   => $item->cantidad,
                    'unit_price' => $item->producto->price
                ]);

                Inventory::where('product_id', $item->producto_id)
                         ->where('size', $item->talla)
                         ->decrement('stock_quantity', $item->cantidad);
            }

            // Borramos el carrito de la base de datos una vez comprado
            ItemCarrito::where('usuario_id', $userId)->delete();
            session()->forget('codigo_descuento');

            return $order;
        });
    }
}
