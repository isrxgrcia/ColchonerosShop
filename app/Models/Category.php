<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // Campos para la tabla
    protected $fillable = [
        'name',
        'gender',
    ];

    // Una categoría tiene muchos productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
