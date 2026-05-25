<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\ItemCarrito;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\AgregarAlCarritoRequest;
use Illuminate\Http\Request;

/**
 * CONTROLADOR PARA EL CLIENTE
 * Aquí se gestiona todo lo que un usuario logueado puede hacer: 
 * gestionar su carrito, ver sus compras y editar su perfil.
 */
class ClienteController extends Controller
{
    /**
     * Muestra los últimos productos añadidos a la tienda.
     */
    public function novedades()
    {
        $products = Product::with(['inventories', 'category'])->latest()->paginate(24);
        return view('tienda.catalogo', [
            'productos' => $products,
            'genero'    => null,
            'categoria' => 'NOVEDADES'
        ]);
    }

    /**
     * Añade un producto a la cesta.
     * Recibe los datos validados del formulario.
     */
    public function agregarAlCarrito(AgregarAlCarritoRequest $request)
    {
        $data = $request->validated();
        $userId = auth()->id();

        // 1. Comprobamos si hay stock suficiente para lo que pide el usuario.
        $stock = Inventory::where('product_id', $data['producto_id'])->where('size', $data['talla'])->first();
        if (!$stock || $stock->stock_quantity < $data['cantidad']) {
            return response()->json(['error' => '¡Vaya! No queda suficiente stock.'], 400);
        }

        // 2. Miramos si el producto ya está en el carrito para no duplicar filas.
        $item = ItemCarrito::where('usuario_id', $userId)
                           ->where('producto_id', $data['producto_id'])
                           ->where('talla', $data['talla'])
                           ->first();

        if ($item) {
            // Si ya está, sumamos la cantidad.
            $nuevaCantidad = $item->cantidad + $data['cantidad'];
            
            // Validamos que la suma no supere el stock total.
            if ($nuevaCantidad > $stock->stock_quantity) {
                return response()->json(['error' => "No puedes añadir más, ya tienes {$item->cantidad} en la cesta."], 400);
            }
            $item->update(['cantidad' => $nuevaCantidad]);
        } else {
            // Si no está, creamos una nueva línea en la tabla carrito.
            ItemCarrito::create([
                'usuario_id'  => $userId,
                'producto_id' => $data['producto_id'],
                'talla'       => $data['talla'],
                'cantidad'    => $data['cantidad'],
            ]);
        }

        return response()->json([
            'notificacion' => 'Añadido a la cesta correctamente.',
            'total_items'  => ItemCarrito::where('usuario_id', $userId)->count()
        ]);
    }

    /**
     * Muestra la página de la cesta con el resumen de precios.
     */
    public function verCarrito()
    {
        $items = ItemCarrito::where('usuario_id', auth()->id())->with('producto')->get();
        
        // Calculamos el subtotal multiplicando cantidad por precio de cada item.
        $subtotal = $items->sum(fn($i) => $i->cantidad * $i->producto->price);
        
        // Aplicamos un 10% de descuento si hay un cupón activo en la sesión.
        $descuento = session('codigo_descuento') ? ($subtotal * 0.10) : 0;

        return view('cliente.carrito', [
            'items_carrito' => $items,
            'subtotal'      => number_format($subtotal, 2, ',', '.'),
            'descuento'     => number_format($descuento, 2, ',', '.'),
            'total'         => number_format($subtotal - $descuento, 2, ',', '.'),
            'codigo_activo' => session('codigo_descuento')
        ]);
    }

    /**
     * Intenta aplicar un cupón de descuento.
     */
    public function aplicarDescuento(Request $request)
    {
        $codigo = strtoupper(trim($request->codigo ?? ''));

        // Cupón especial para la primera compra.
        if ($codigo === 'FORZAATLETI10') {
            // Comprobamos si el usuario ya ha comprado alguna vez.
            if (Order::where('user_id', auth()->id())->exists()) {
                return back()->with('error', 'Este cupón solo vale para tu primera compra.');
            }
            
            // Guardamos el código en la sesión.
            session(['codigo_descuento' => 'FORZAATLETI10']);
            return back()->with('exito', '¡Cupón aplicado! Tienes un 10% de descuento.');
        }

        return back()->with('error', 'Ese código no existe o no es válido.');
    }

    /**
     * Quita el cupón de descuento de la sesión.
     */
    public function eliminarDescuento()
    {
        session()->forget('codigo_descuento');
        return back()->with('exito', 'Descuento eliminado.');
    }

    /**
     * Borra un producto del carrito.
     */
    public function eliminarDelCarrito(ItemCarrito $item)
    {
        // Seguridad: solo puedes borrar tus propios items.
        if ($item->usuario_id === auth()->id()) {
            $item->delete();
        }
        return back()->with('exito', 'Artículo fuera de la cesta.');
    }

    /**
     * Muestra el historial de pedidos del usuario.
     */
    public function misCompras()
    {
        $pedidos = Order::where('user_id', auth()->id())->with('orderItems.product')->latest()->get();
        return view('cliente.mis-compras', compact('pedidos'));
    }

    /**
     * Muestra el formulario para editar los datos personales.
     */
    public function cuenta()
    {
        return view('cliente.cuenta', ['usuario' => auth()->user()]);
    }

    /**
     * Guarda los cambios en el perfil del usuario.
     */
    public function actualizarCuenta(Request $request)
    {
        // Validación de datos.
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'foto'    => 'nullable|image|max:2048' // Máximo 2MB.
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->address = $request->address;

        // Si el usuario sube una foto nueva, la guardamos en public/uploads/profiles.
        if ($request->hasFile('foto')) {
            $fileName = time() . '_' . $user->id . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('uploads/profiles'), $fileName);
            $user->profile_photo_url = asset('uploads/profiles/' . $fileName);
        }

        $user->save();
        return back()->with('exito', 'Perfil actualizado.');
    }
}
