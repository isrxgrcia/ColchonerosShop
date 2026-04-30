<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // Atributos que se pueden rellenar
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image_primary',
        'image_secondary',
    ];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con el stock (inventario)
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

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

    // Función para sacar todas las fotos de un producto
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
