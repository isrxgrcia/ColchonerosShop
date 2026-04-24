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

    public function procesarPedido(int $userId, string $shippingAddress, string $paymentMethod): Order
    {
        // 1. Recuperamos los ítems del carrito de la base de datos
        $cartItems = ItemCarrito::where('usuario_id', $userId)->with('producto')->get();

        if ($cartItems->isEmpty()) {
            throw new Exception("El carrito está vacío. No se puede procesar el pedido.");
        }

        // 2. Iniciamos la transacción para asegurar la integridad de los datos
        return DB::transaction(function () use ($userId, $shippingAddress, $paymentMethod, $cartItems) {

            $totalAmount = 0;

            // FASE 1: Validar stock y bloquear filas para evitar compras simultáneas (Race Conditions)
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

            if (session()->has('codigo_descuento')) {
                $totalAmount = $totalAmount - ($totalAmount * 0.10);
            }

            // FASE 2: Crear la cabecera del pedido (Order)
            $order = Order::create([
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'shipping_address' => $shippingAddress,
                'payment_method' => $paymentMethod,
                'status' => 'pending'
            ]);

            // FASE 3: Crear las líneas del pedido y descontar el inventario real
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->producto_id,
                    'size' => $item->talla,
                    'quantity' => $item->cantidad,
                    'unit_price' => $item->producto->price
                ]);

                // Descontamos el stock de forma atómica
                Inventory::where('product_id', $item->producto_id)
                    ->where('size', $item->talla)
                    ->decrement('stock_quantity', $item->cantidad);
            }

            // FASE 4: Limpiar el carrito del usuario tras el éxito
            ItemCarrito::where('usuario_id', $userId)->delete();
            session()->forget('codigo_descuento');

            return $order;
        });
    }
}
