<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa una línea de detalle dentro de un pedido.
 * Si un pedido tiene 3 camisetas diferentes, habrá 3 registros de OrderItem asociados a ese pedido.
 */
class OrderItem extends Model
{
    use HasFactory;

    /**
     * Guardamos el ID del pedido, el producto, la talla, la cantidad y el precio que tenía en ese momento.
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'quantity',
        'unit_price',
    ];

    /**
     * Relación: Este item pertenece a un Pedido (Order).
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relación: Este item apunta a un Producto (Product).
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}