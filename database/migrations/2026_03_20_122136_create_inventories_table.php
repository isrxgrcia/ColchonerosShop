<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Tabla para controlar el stock de cada producto por talla
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            // Relación con el producto
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('size', 10);
            $table->integer('stock_quantity')->default(0); 
            $table->timestamps();
            
            // No puede haber dos tallas iguales para el mismo producto
            $table->unique(['product_id', 'size']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
