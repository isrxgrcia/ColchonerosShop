<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa un producto que un usuario ha añadido a su carrito de la compra.
 */
class ItemCarrito extends Model
{
    use HasFactory;

    /**
     * Indicamos que este modelo usa la tabla llamada 'carrito' en lugar de 'item_carritos'.
     */
    protected $table = 'carrito';

    // Desactivamos los timestamps (created_at/updated_at) porque no se usan en esta tabla.
    public $timestamps = false;

    /**
     * Campos rellenables: quién compra, qué compra, qué talla y cuántas unidades.
     */
    protected $fillable = [
        'usuario_id',
        'producto_id',
        'talla',
        'cantidad',
    ];

    /**
     * Casting de datos: le decimos a Laravel que trate 'fecha_agregado' como una fecha (Carbon).
     */
    protected $casts = [
        'fecha_agregado' => 'datetime',
    ];

    /**
     * Relación: Este item del carrito apunta a un Producto.
     */
    public function producto()
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }

    /**
     * Relación: Este item del carrito pertenece a un Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}