<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductoController extends Controller
{
    // Muestra el catálogo con los productos
    public function index(Request $request, ?string $gender = null, ?string $category = null)
    {
        $productsQuery = Product::with(['category', 'inventories']);

        // Llamamos a los filtros de búsqueda
        $this->aplicarFiltrosBase($productsQuery, $gender, $category, $request->get('buscar'));

        $products = $productsQuery->paginate(24);

        return view('tienda.catalogo', [
            'productos' => $products,
            'genero'    => $gender,
            'categoria' => $category
        ]);
    }

    // Esta función la usamos para la búsqueda por AJAX
    public function obtenerProductos(Request $request)
    {

        $searchTerm = $request->input('buscar');
        $categoryName = $request->input('categoria');
        $gender = $request->input('genero');
        $size = $request->input('talla');

        $query = Product::with(['category', 'inventories' => function($inv) {
            $inv->where('stock_quantity', '>', 0);
        }]);


        $this->aplicarFiltrosAvanzados($query, $searchTerm, $categoryName, $gender, $size);

        $paginatedResults = $query->paginate(12);

        return response()->json([
            'status' => 'success',
            'data'   => $paginatedResults
        ]);
    }

    // Muestra la ficha de un solo producto
    public function show(int $id)
    {
        // Buscamos el producto por ID o falla
        $product = Product::with(['category', 'inventories' => function($q) {
            $q->where('stock_quantity', '>', 0);
        }])->findOrFail($id);

        $order = ['XS' => 1, 'S' => 2, 'M' => 3, 'L' => 4, 'XL' => 5, 'XXL' => 6];
        $sortedInventories = $product->inventories->sortBy(function($inventory) use ($order) {
            return $order[strtoupper($inventory->size)] ?? 99;
        })->values();
        
        $product->setRelation('inventories', $sortedInventories);

        $images = $product->getTodasLasFotos();

        return view('tienda.detalle', [
            'producto' => $product,
            'fotos'    => $images
        ]);
    }



    private function aplicarFiltrosBase(Builder $query, $gender, $category, $search)
    {
        $query->when($gender, function($q, $val) {
            $q->whereHas('category', fn($c) => $c->where('gender', strtolower($val)));
        })
        ->when($category, function($q, $val) {
            $q->whereHas('category', fn($c) => $c->whereRaw('LOWER(name) = ?', [strtolower($val)]));
        })
        ->when($search, function($q, $val) {
            $q->where(fn($b) => $b->where('name', 'LIKE', "%$val%")->orWhere('description', 'LIKE', "%$val%"));
        });
    }

    private function aplicarFiltrosAvanzados(Builder $query, $search, $category, $gender, $size)
    {

        $this->aplicarFiltrosBase($query, $gender, $category, $search);


        $query->when($size && strtolower($size) !== 'todas', function($q, $val) {
            $q->whereHas('inventories', fn($t) => $t->whereRaw('LOWER(size) = ?', [strtolower($val)]));
        });
    }
}
