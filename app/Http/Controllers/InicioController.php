<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class InicioController extends Controller
{
    // Método para la página de inicio
    public function index()
    {
        // Cogemos productos de hombre y mujer por separado
        $destacadosHombre = $this->obtenerDestacadosPorGenero('hombre');
        $destacadosMujer = $this->obtenerDestacadosPorGenero('mujer');

        return view('tienda.inicio', [
            'destacadosHombre' => $destacadosHombre,
            'destacadosMujer'  => $destacadosMujer
        ]);
    }

    // Función para sacar productos según el género
    private function obtenerDestacadosPorGenero(string $gender)
    {
        $cacheKey = "inicio_destacados_{$gender}_v3";

        // Usamos la caché para que la página cargue rápido
        return Cache::remember($cacheKey, 3600, function() use ($gender) {
            return Product::with(['category', 'inventories'])
                ->whereHas('category', fn($q) => $q->where('gender', $gender))
                ->latest()
                ->take(10)
                ->get()
                ->map(function($product) {
                    $product->precio_formateado = number_format($product->price, 2, ',', '.') . ' €';
                    return $product;
                });
        });
    }
}
