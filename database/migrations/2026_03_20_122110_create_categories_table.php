<?php

/**
 * Crea la tabla 'categories'.
 * Aquí clasificamos los productos (Camisetas, Pantalones...) y por género (Hombre, Mujer, Unisex).
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['hombre', 'mujer', 'unisex']);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};