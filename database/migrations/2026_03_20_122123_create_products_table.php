<?php

/**
 * Crea la tabla 'products'.
 * Es la tabla principal donde guardamos el nombre, descripción, precio e imágenes de lo que vendemos.
 * Tiene una clave foránea (category_id) que apunta a la tabla de categorías.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image_primary')->nullable();
            $table->string('image_secondary')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};