<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

/**
 * CONTROLADOR DE PRODUCTOS
 * Se encarga de mostrar el catálogo de la tienda y la ficha de cada producto.
 */
class ProductoController extends Controller
{
    /**
     * Muestra el catálogo de productos con filtros básicos.
     * Puede recibir el género y la categoría por la URL.
     */
    public function index(Request $request, ?string $gender = null, ?string $category = null)
    {
        // Empezamos la consulta cargando la categoría y el inventario (Eager Loading).
        $productsQuery = Product::with(['category', 'inventories']);

        // Aplicamos los filtros de género, categoría y búsqueda por nombre si vienen en la URL.
        $this->aplicarFiltrosBase($productsQuery, $gender, $category, $request->get('buscar'));

        // Pagina los resultados de 24 en 24 para no cargar todo de golpe.
        $products = $productsQuery->paginate(24);

        return view('tienda.catalogo', [
            'productos' => $products,
            'genero'    => $gender,
            'categoria' => $category
        ]);
    }

    /**
     * Muestra la ficha detallada de un producto.
     */
    public function show(int $id)
    {
        // Buscamos el producto por su ID o lanzamos un error 404 si no existe.
        $product = Product::with(['category', 'inventories' => fn($q) => $q->where('stock_quantity', '>', 0)])->findOrFail($id);

        // Ordenamos las tallas para que salgan bien (XS, S, M, L, XL, XXL).
        $order = ['XS' => 1, 'S' => 2, 'M' => 3, 'L' => 4, 'XL' => 5, 'XXL' => 6];
        $sortedInventories = $product->inventories->sortBy(fn($inv) => $order[strtoupper($inv->size)] ?? 99)->values();
        
        // Reemplazamos la relación con las tallas ya ordenadas.
        $product->setRelation('inventories', $sortedInventories);

        return view('tienda.detalle', [
            'producto' => $product,
            'fotos'    => $product->getTodasLasFotos()
        ]);
    }

    /**
     * Aplica filtros comunes de género, categoría y búsqueda de texto.
     */
    private function aplicarFiltrosBase(Builder $query, $gender, $category, $search)
    {
        $query->when($gender, fn($q, $val) => $q->whereHas('category', fn($c) => $c->where('gender', strtolower($val))))
              ->when($category, fn($q, $val) => $q->whereHas('category', fn($c) => $c->whereRaw('LOWER(name) = ?', [strtolower($val)])))
              ->when($search, fn($q, $val) => $q->where(fn($b) => $b->where('name', 'LIKE', "%$val%")->orWhere('description', 'LIKE', "%$val%")));
    }

}
