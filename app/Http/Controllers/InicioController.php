<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

/**
 * CONTROLADOR DE LA PÁGINA DE INICIO
 * Este controlador se encarga de mostrar la pantalla principal que ve el usuario.
 */
class InicioController extends Controller
{
    /**
     * Muestra la vista de inicio con los productos destacados.
     */
    public function index()
    {
        // Traemos 10 productos destacados de hombre y 10 de mujer.
        $destacadosHombre = $this->obtenerDestacadosPorGenero('hombre');
        $destacadosMujer = $this->obtenerDestacadosPorGenero('mujer');

        // Enviamos los datos a la vista 'tienda.inicio'.
        return view('tienda.inicio', [
            'destacadosHombre' => $destacadosHombre,
            'destacadosMujer'  => $destacadosMujer
        ]);
    }

    /**
     * Función interna para buscar productos por género.
     * Usamos caché para que la página cargue más rápido y no sature la base de datos.
     */
    private function obtenerDestacadosPorGenero(string $gender)
    {
        // Nombre único para guardar estos datos en la caché.
        $cacheKey = "inicio_destacados_{$gender}_v3";

        // Si ya están en caché, los devuelve; si no, los busca en la BD y los guarda por 1 hora (3600s).
        return Cache::remember($cacheKey, 3600, function() use ($gender) {
            return Product::with(['category', 'inventories'])
                // Filtramos por el género de la categoría.
                ->whereHas('category', fn($q) => $q->where('gender', $gender))
                // Ordenamos por los últimos añadidos.
                ->latest()
                // Cogemos solo los 10 primeros.
                ->take(10)
                ->get()
                // Añadimos un campo extra al vuelo para el precio con formato europeo.
                ->map(function($product) {
                    $product->precio_formateado = number_format($product->price, 2, ',', '.') . ' €';
                    return $product;
                });
        });
    }
}
