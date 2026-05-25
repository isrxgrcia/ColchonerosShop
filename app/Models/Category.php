<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Este modelo representa las categorías de los productos en nuestra tienda.
 * Por ejemplo: Camisetas, Pantalones, Zapatillas, etc.
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * El array $fillable define qué campos de la tabla se pueden rellenar de forma masiva.
     * Esto es una medida de seguridad de Laravel para evitar "Mass Assignment".
     */
    protected $fillable = [
        'name',
        'gender',
    ];

    /**
     * Definimos una relación de uno a muchos (hasMany).
     * Una categoría puede tener asociados muchos productos.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}