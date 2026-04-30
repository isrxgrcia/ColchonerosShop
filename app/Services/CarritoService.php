<?php

namespace App\Services;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Exception;

class CarritoService
{
    private const SESSION_KEY = 'carrito_compra';

    // Devuelve lo que hay en el carrito guardado en la sesión
    public function obtenerCarrito(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    // Para meter un producto al carrito
    public function agregarProducto(int $productoId, string $talla, int $cantidad): array
    {
        $producto = Product::findOrFail($productoId);
        $stockRecord = $this->obtenerStock($productoId, $talla);

        $cart = $this->obtenerCarrito();
        $itemKey = "{$productoId}_{$talla}"; 

        $currentQty = $cart[$itemKey]['cantidad'] ?? 0;
        $totalRequestedQty = $currentQty + $cantidad;

        // Miramos si hay stock suficiente antes de añadir
        if ($stockRecord->stock_quantity < $totalRequestedQty) {
            throw new Exception("¡Stock insuficiente! Solo quedan {$stockRecord->stock_quantity} unidades.");
        }

        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['cantidad'] += $cantidad;
        } else {
            $cart[$itemKey] = [
                'producto_id'      => $producto->id,
                'nombre'           => $producto->name,
                'talla'            => $talla,
                'cantidad'         => $cantidad,
                'precio_unitario'  => $producto->price,
                'imagen_principal' => $producto->image_url,
            ];
        }

        Session::put(self::SESSION_KEY, $cart);

        return $cart;
    }

    // Quita un producto del carrito
    public function eliminarProducto(string $key): void
    {
        $cart = $this->obtenerCarrito();
        
        if (isset($cart[$key])) {
            unset($cart[$key]);
            Session::put(self::SESSION_KEY, $cart);
        }
    }

    // Limpia todo el carrito
    public function vaciarCarrito(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    // Calcula el precio total de la compra
    public function calcularMontoTotal(): float
    {
        return collect($this->obtenerCarrito())->sum(function($item) {
            return $item['precio_unitario'] * $item['cantidad'];
        });
    }


    // Mira el stock que hay en la base de datos
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
