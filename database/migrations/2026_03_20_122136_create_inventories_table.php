<?php

/**
 * Crea la tabla 'inventories'.
 * Aquí controlamos el stock: cuántas unidades hay de cada talla para cada producto.
 * Usamos un índice único para que no se repita la combinación de producto y talla.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('size', 10);
            $table->integer('stock_quantity')->default(0);
            $table->timestamps();
            $table->unique(['product_id', 'size']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};