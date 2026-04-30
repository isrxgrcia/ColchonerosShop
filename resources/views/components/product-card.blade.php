<style>
    .card {
        background: var(--blanco-roto);
        border: 1px solid var(--borde);
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        outline: 1px solid var(--borde);
        outline-offset: -8px;
    }
    .card:hover { 
        box-shadow: 20px 20px 60px rgba(0,0,0,0.05); 
        transform: translateY(-5px) rotate(0.5deg);
        outline-color: var(--acento);
    }

    .card-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 125%; 
        background: #fff;
        border: 10px solid #fff;
        box-shadow: 2px 2px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }
    .card-img-wrap::before {
        content: '';
        position: absolute;
        top: 10px; right: 10px;
        width: 30px; height: 30px;
        background: url('{{ asset('images/bronze_rivet.png') }}') center center / contain no-repeat;
        z-index: 10;
        filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.3));
    }
    .card-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: sepia(0.5) contrast(1) brightness(0.9);
        transition: all 0.6s;
    }
    .card-img-wrap::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .card:hover .card-img {
        filter: sepia(0.2) contrast(1.1) brightness(1);
        transform: scale(1.05);
    }

    .card-badge {
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        background: var(--acento);
        color: var(--fondo);
        font-family: 'EB Garamond', serif;
        font-size: 0.65rem;
        font-weight: 600;
        font-variant: small-caps;
        letter-spacing: 0.1em;
        padding: 4px 10px;
        z-index: 5;
        border: 1px solid var(--blanco-roto);
        box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    .card-badge.premium { background: var(--texto-principal); color: var(--fondo); }

    .card-body {
        padding: 1.25rem 0.5rem 0.5rem 0.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
        text-align: center;
    }
    .card-cat {
        font-family: 'EB Garamond', serif;
        font-size: 0.75rem;
        font-variant: small-caps;
        letter-spacing: 0.1em;
        color: var(--texto-secundario);
        margin-bottom: 0.25rem;
    }
    .card-name {
        font-family: 'EB Garamond', serif;
        font-size: 1.15rem;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--texto-principal);
        letter-spacing: 0.05em;
        line-height: 1.3;
        flex: 1;
        margin-bottom: 0.75rem;
    }
    .card-price {
        font-family: 'Playfair Display', serif;
        font-size: 1.35rem;
        font-weight: 900;
        color: var(--texto-secundario);
        margin-bottom: 0.5rem;
        font-style: italic;
        font-variant-numeric: oldstyle-nums;
    }

    .card-form { display: flex; flex-direction: column; gap: 0.5rem; border-top: 1px dashed var(--borde); padding-top: 1rem; }
    .card-form-row { display: grid; grid-template-columns: 2fr 1fr; gap: 0.5rem; }
    .card-form select, .card-form input {
        background: var(--fondo);
        border: 1px solid var(--borde);
        color: var(--texto-principal);
        padding: 0.5rem 0.75rem;
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        outline: none;
        width: 100%;
        transition: border-color 0.3s;
        border-radius: 2px;
    }
    .card-form select:focus, .card-form input:focus { border-color: var(--acento); }
    .card-form select option { background: var(--fondo); }
    
    .btn-agregar {
        width: 100%;
        background: var(--acento);
        color: var(--fondo);
        border: 1px solid var(--acento);
        padding: 0.75rem 1.5rem;
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        border-radius: 50px; 
        cursor: pointer;
        transition: all 0.3s;
    }
    .btn-agregar:hover:not([disabled]) { 
        background: var(--acento-secundario);
        border-color: var(--acento-secundario);
    }
    .btn-agregar[disabled] {
        opacity: 0.4;
        cursor: not-allowed;
    }
</style>

{{-- Tarjeta para cada producto individual --}}
<article class="card">
    <a href="{{ route('productos.mostrar', $producto->id) }}" style="text-decoration: none; color: inherit;">
        <div class="card-img-wrap">
            
            @if($producto->status_label === '¡Últimas unidades!')
                <div class="card-badge">ÚLTIMAS UNIDADES</div>
            @elseif($producto->is_premium)
                <div class="card-badge premium">PREMIUM</div>
            @endif

            {{-- Foto del producto --}}
            <img
                src="{{ asset('storage/products/' . $producto->image_primary) }}"
                alt="{{ $producto->name }}"
                class="card-img"
                loading="lazy"
                decoding="async"
                width="400"
                height="500"
                onerror="this.src='https://placehold.co/400x500?text=No+Foto'"
            >
        </div>

        <div class="card-body">
            {{-- Nombre y precio --}}
            <span class="card-cat">{{ $producto->category->name }} — {{ ucfirst($producto->category->gender) }}</span>
            <h3 class="card-name">{{ $producto->name }}</h3>
            <div class="card-price">{{ $producto->precio_formateado }}</div>
        </div>
    </a>

    
    {{-- Formulario para elegir talla y comprar --}}
    <div class="card-footer" style="padding: 0.5rem;">
        @auth
        <form class="card-form" id="form-{{ $producto->id }}">
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <div class="card-form-row">
                <select name="talla" required>
                    <option value="" disabled selected>— TALLA —</option>
                    @foreach($producto->inventories as $inv)
                        <option
                            value="{{ $inv->size }}"
                            {{ $inv->stock_quantity == 0 ? 'disabled' : '' }}
                            data-stock="{{ $inv->stock_quantity }}"
                        >
                            {{ strtoupper($inv->size) }}
                            {{ $inv->stock_quantity == 0 ? '(AGOTADO)' : "({$inv->stock_quantity})" }}
                        </option>
                    @endforeach
                </select>
                <input type="number" name="cantidad" value="1" min="1" max="5">
            </div>

            @php $hayStock = $producto->inventories->where('stock_quantity', '>', 0)->count() > 0; @endphp
            <button
                type="button"
                class="btn-agregar"
                {{ !$hayStock ? 'disabled' : '' }}
                onclick="peticionAgregarCarrito({{ $producto->id }})"
            >
                {{ $hayStock ? 'SOLICITAR ARTÍCULO' : 'SIN STOCK' }}
            </button>
        </form>
        @else
        <a href="{{ route('login') }}" class="btn-agregar" style="text-align:center; text-decoration:none; display:block;">
            ACCEDE PARA COMPRAR
        </a>
        @endauth
    </div>
</article>
