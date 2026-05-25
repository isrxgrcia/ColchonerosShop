<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Este es el modelo principal de los Productos.
 * Representa cada artículo que vendemos en la tienda.
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Campos básicos del producto que podemos rellenar.
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image_primary',
        'image_secondary',
    ];

    /**
     * Relación: El producto pertenece a una Categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación: Un producto puede tener stock en varias tallas (múltiples registros en inventario).
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Relación: El producto puede aparecer en muchas líneas de pedidos.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Accesor (Attribute): Esto nos permite obtener la URL completa de la imagen principal
     * simplemente llamando a $product->image_url.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->image_primary) {
                    return asset('images/default-product.png');
                }
                if (str_starts_with($this->image_primary, 'http')) {
                    return $this->image_primary;
                }
                return asset('storage/products/' . $this->image_primary);
            }
        );
    }

    /**
     * Función personalizada para obtener todas las fotos relacionadas con este producto
     * buscando en la carpeta de almacenamiento.
     */
    public function getTodasLasFotos(): array
    {
        if (!$this->image_primary) return [];
        $baseName = pathinfo($this->image_primary, PATHINFO_FILENAME);
        $directoryPath = storage_path('app/public/products/');
        $matchingFiles = glob($directoryPath . $baseName . '*.*');
        if (!$matchingFiles) {
            return [$this->image_url];
        }
        return collect($matchingFiles)
            ->filter(function($filePath) use ($baseName) {
                $fileName = basename($filePath);
                return preg_match('/^' . preg_quote($baseName, '/') . '(\.|\_)/i', $fileName);
            })
            ->map(fn($file) => asset('storage/products/' . basename($file)))
            ->toArray();
    }
}