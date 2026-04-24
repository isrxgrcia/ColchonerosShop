<?php

namespace App\Services;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Exception;

class CarritoService
{
    private const SESSION_KEY = 'carrito_compra';

    /**
     * Recupera los artículos del carrito desde la sesión.
     */
    public function obtenerCarrito(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * Añade un producto al carrito gestionando cantidades y validando stock.
     */
    public function agregarProducto(int $productoId, string $talla, int $cantidad): array
    {
        $producto = Product::findOrFail($productoId);
        $stockRecord = $this->obtenerStock($productoId, $talla);

        $cart = $this->obtenerCarrito();
        $itemKey = "{$productoId}_{$talla}";

        // Calculamos la cantidad total que el usuario pretende tener en el carrito
        $currentQty = $cart[$itemKey]['cantidad'] ?? 0;
        $totalRequestedQty = $currentQty + $cantidad;

        if ($stockRecord->stock_quantity < $totalRequestedQty) {
            throw new Exception("¡Stock insuficiente! Solo quedan {$stockRecord->stock_quantity} unidades.");
        }

        // Actualizamos o creamos la entrada en el carrito
        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['cantidad'] += $cantidad;
        } else {
            $cart[$itemKey] = [
                'producto_id' => $producto->id,
                'nombre' => $producto->name,
                'talla' => $talla,
                'cantidad' => $cantidad,
                'precio_unitario' => $producto->price,
                'imagen_principal' => $producto->image_url,
            ];
        }

        Session::put(self::SESSION_KEY, $cart);

        return $cart;
    }

    /**
     * Elimina una línea completa del carrito por su clave única.
     */
    public function eliminarProducto(string $key): void
    {
        $cart = $this->obtenerCarrito();

        if (isset($cart[$key])) {
            unset($cart[$key]);
            Session::put(self::SESSION_KEY, $cart);
        }
    }

    /**
     * Vacía el carrito por completo (útil tras finalizar una compra).
     */
    public function vaciarCarrito(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    /**
     * Calcula el monto total del carrito usando colecciones (más limpio).
     */
    public function calcularMontoTotal(): float
    {
        return collect($this->obtenerCarrito())->sum(function ($item) {
            return $item['precio_unitario'] * $item['cantidad'];
        });
    }

    // MÉTODOS DE APOYO

    private function obtenerStock(int $productId, string $size)
    {
        $stock = Inventory::where('product_id', $productId)
            ->where('size', $size)
            ->first();

        if (!$stock) {
            throw new Exception('La talla seleccionada no está disponible en nuestro catálogo.');
        }

        return $stock;
    }
}
