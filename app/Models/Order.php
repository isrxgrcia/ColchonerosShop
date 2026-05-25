<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Este modelo representa un pedido realizado por un cliente.
 * Contiene información general como el total, la dirección de envío y el estado.
 */
class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Campos que guardamos al crear un pedido.
     */
    protected $fillable = [
        'user_id',
        'total_amount',
        'shipping_address',
        'payment_method',
        'status',
    ];

    /**
     * Relación: El pedido pertenece a un usuario (el cliente que lo compró).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un pedido tiene muchos "items" o líneas de detalle (los productos comprados).
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}