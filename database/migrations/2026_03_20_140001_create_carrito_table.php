<?php

/**
 * Crea la tabla 'carrito'.
 * Sirve para que el carrito sea persistente: si el usuario se va y vuelve otro día, 
 * sus productos seguirán guardados en la base de datos.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('products')->onDelete('cascade');
            $table->string('talla', 10);
            $table->integer('cantidad');
            $table->timestamp('fecha_agregado')->useCurrent();
            $table->unique(['usuario_id', 'producto_id', 'talla'], 'uq_carrito_usuario_producto_talla');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};