<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo gestiona el stock real de cada producto.
 * Como un mismo producto puede tener varias tallas, aquí guardamos cuántas unidades hay de cada una.
 */
class Inventory extends Model
{
    use HasFactory;

    /**
     * Campos que podemos rellenar: el ID del producto, la talla y la cantidad disponible.
     */
    protected $fillable = [
        'product_id',
        'size',
        'stock_quantity',
    ];

    /**
     * Relación inversa (belongsTo): Cada registro de inventario pertenece a un producto específico.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}