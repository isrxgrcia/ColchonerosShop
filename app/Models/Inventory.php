<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Para controlar el stock de cada talla
    protected $fillable = [
        'product_id',
        'size',
        'stock_quantity',
    ];

    // Cada registro de stock pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
