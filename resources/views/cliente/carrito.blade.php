@extends('layouts.app')
@section('titulo', 'Mi Carrito — Colchoneros Shop')
@push('styles')
<style>
    .page-title {
        font-family: 'Playfair Display', serif, serif;
        font-style: italic;
        font-weight: 900;
        font-size: 3.5rem;
        color: var(--acento);
        border-bottom: 3px double var(--borde);
        padding-bottom: 1.5rem;
        margin-bottom: 3rem;
        text-align: center;
        letter-spacing: -0.02em;
    }
    .carrito-layout { display:grid; grid-template-columns:1fr; gap:3rem; }
    @media(min-width:1000px) { .carrito-layout { grid-template-columns:1fr 380px; } }
    .carrito-item {
        display:grid;
        grid-template-columns:110px 1fr auto;
        gap:1.5rem;
        align-items:center;
        border:1px solid var(--borde);
        padding:1.25rem;
        margin-bottom:1rem;
        background:var(--blanco-roto);
        transition:all 0.3s ease;
        box-shadow: 2px 2px 8px rgba(0,0,0,0.03);
    }
    .carrito-item:hover { transform: translateY(-2px); box-shadow: 4px 6px 15px rgba(0,0,0,0.06); }
    .carrito-img { width:110px; height:140px; object-fit:cover; filter:sepia(0.2); border: 1px solid var(--borde); }
    .item-name {
        font-family: 'Playfair Display', serif, serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--texto-principal);
        margin-bottom: 0.5rem;
    }
    .item-meta {
        font-family: 'EB Garamond', serif;
        font-size: 0.95rem;
        color: var(--texto-secundario);
        font-variant: small-caps;
        letter-spacing: 0.05em;
    }
    .item-precio {
        font-family: 'Playfair Display', serif, serif;
        font-size: 1.4rem;
        font-weight: 900;
        color: var(--texto-principal);
        margin-top: 0.75rem;
    }
    .btn-del {
        background:none;
        border:1px dashed var(--borde);
        color: var(--texto-secundario);
        padding: 0.5rem 1rem;
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        cursor: pointer;
        transition: all 0.3s;
        align-self: flex-start;
        border-radius: 4px;
    }
    .btn-del:hover { background: var(--rojo); color: var(--blanco); }
    .carrito-vacio {
        border: 2px dashed var(--borde);
        padding: 6rem 2rem;
        text-align: center;
        background: var(--blanco-roto);
    }
    .carrito-vacio p {
        font-family: 'Playfair Display', serif, serif;
        font-size: 1.75rem;
        color: var(--texto-secundario);
        margin-bottom: 2rem;
        font-style: italic;
    }
    .resumen-box {
        border: 4px double var(--borde);
        padding: 2rem;
        position: sticky;
        top: 7rem;
        background: var(--blanco-roto);
    }
    .resumen-title {
        font-family: 'EB Garamond', serif;
        font-size: 1.2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--texto-principal);
        border-bottom: 1px solid var(--borde);
        padding-bottom: 1rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .resumen-linea {
        display: flex;
        justify-content: space-between;
        font-size: 0.95rem;
        color: var(--texto-secundario);
        font-family: 'EB Garamond', serif;
        margin-bottom: 0.75rem;
    }
    .resumen-total {
        display: flex;
        justify-content: space-between;
        font-family: 'Playfair Display', serif, serif;
        font-size: 1.75rem;
        font-weight: 900;
        color: var(--texto-principal);
        border-top: 2px solid var(--texto-principal);
        margin-top: 1.5rem;
        padding-top: 1rem;
    }
    .btn-pagar {
        display: block;
        width: 100%;
        background: var(--acento);
        color: var(--fondo);
        border: none;
        padding: 1.25rem;
        font-family: 'EB Garamond', serif;
        font-size: 1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        cursor: pointer;
        margin-top: 1.5rem;
        transition: all 0.3s;
        text-align: center;
        border-radius: 40px;
        box-shadow: 4px 4px 0px rgba(0,0,0,0.1);
    }
    .btn-pagar:hover { background: var(--acento-hover); transform: translateY(-2px); box-shadow: 6px 6px 0px rgba(0,0,0,0.1); }
</style>
@endpush
@section('contenido')
    <h1 class="page-title">CARRITO_</h1>
    @if(session('exito'))
        <div style="border:1px dashed #10b981; padding:1rem; color:#10b981; margin-bottom:2rem; font-family:'EB Garamond',serif; text-align:center;">
            ✓ {{ session('exito') }}
        </div>
    @endif
    @if(session('error'))
        <div style="border:1px dashed var(--rojo); padding:1rem; color:var(--rojo); margin-bottom:2rem; font-family:'EB Garamond',serif; text-align:center;">
            ✕ {{ session('error') }}
        </div>
    @endif
    @if($items_carrito->isEmpty())
        <div class="carrito-vacio">
            <p>CARRITO VACÍO</p>
            <a href="{{ route('cliente.novedades') }}" class="btn">VER NOVEDADES →</a>
        </div>
    @else
        <div class="carrito-layout">
            <div>
                @foreach($items_carrito as $item)
                <div class="carrito-item">
                    <img
                        src="{{ asset('storage/products/' . $item->producto->image_primary) }}"
                        alt="{{ $item->producto->name }}"
                        class="carrito-img"
                        onerror="this.src='https://placehold.co/100x120/111/333?text=IMG'"
                    >
                    <div>
                        <div class="item-name">{{ $item->producto->name }}</div>
                        <div class="item-meta">Talla: {{ $item->talla }} · Cant: {{ $item->cantidad }}</div>
                        <div class="item-precio">{{ number_format($item->producto->price * $item->cantidad, 2, ',', '.') }} €</div>
                    </div>
                    <form action="{{ route('cliente.carrito.eliminar', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-del">✕ QUITAR</button>
                    </form>
                </div>
                @endforeach
            </div>
            <div class="resumen-box">
                {{-- Esta sección muestra el desglose del precio total y los descuentos aplicados --}}
                <div class="resumen-title">RESUMEN_COMPRA</div>
                <div style="margin-bottom: 2rem;">
                    @if($codigo_activo)
                        <div style="background: #f0f7f4; border: 1px dashed #1b4d3e; padding: 1.25rem; display: flex; justify-content: space-between; align-items: center; border-radius: 4px;">
                            <div>
                                <span style="font-family: 'EB Garamond'; font-size: 0.85rem; color: #1b4d3e; text-transform: uppercase;">Código Activo</span>
                                <div style="font-weight: 900; font-family: 'Playfair Display', serif; color: var(--texto-principal); font-size: 1.25rem;">{{ $codigo_activo }}</div>
                            </div>
                            <form action="{{ route('cliente.carrito.descuento.eliminar') }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #1b4d3e; cursor: pointer; font-size: 1.5rem;">✕</button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('cliente.carrito.descuento') }}" method="POST" style="display: flex; gap: 0.5rem;">
                            @csrf
                            <input type="text" name="codigo" placeholder="INTRODUCE EL CÓDIGO VINTAGE" class="form-control" style="font-size: 0.9rem; letter-spacing: 0.05em; text-transform: uppercase;">
                            <button type="submit" class="btn" style="padding: 0.5rem 1.5rem; font-size: 0.85rem; background: var(--texto-principal); color: var(--fondo); border-radius: 4px;">APLICAR</button>
                        </form>
                    @endif
                </div>
                <div style="margin-bottom: 2.5rem;">
                    @foreach($items_carrito as $item)
                        <div class="resumen-linea" style="margin-bottom: 1rem;">
                            <span style="font-style: italic;">{{ Str::limit($item->producto->name, 22) }}</span>
                            <span style="font-weight: 700;">{{ number_format($item->producto->price * $item->cantidad, 2) }}€</span>
                        </div>
                    @endforeach
                    @if($descuento > 0)
                        <div class="resumen-linea" style="color: #e63946; font-weight: 700;">
                            <span>REDUCCIÓN PROMOCIONAL (10%)</span>
                            <span>-{{ $descuento }}€</span>
                        </div>
                    @endif
                    <div class="resumen-total">
                        <span>TOTAL</span>
                        <span>{{ $total }} €</span>
                    </div>
                </div>
                <form action="{{ route('cliente.pasarela') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 2rem;">
                        {{-- El usuario debe elegir su método de pago preferido antes de tramitar el pedido --}}
                        <label class="title-section" style="display: block; margin-bottom: 1rem; font-size: 0.9rem; opacity: 1;">FORMA DE PAGO OFICIAL</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                            <label class="pago-selector">
                                <input type="radio" name="metodo_pago" value="TARJETA" checked>
                                <span class="pago-box">TARJETA</span>
                            </label>
                            <label class="pago-selector">
                                <input type="radio" name="metodo_pago" value="BIZUM">
                                <span class="pago-box">BIZUM</span>
                            </label>
                            <label class="pago-selector">
                                <input type="radio" name="metodo_pago" value="PAYPAL">
                                <span class="pago-box">PAYPAL</span>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="direccion_envio" value="{{ auth()->user()->address ?? 'Domicilio registrado por defecto' }}">
                    <button type="submit" class="btn-pagar">TRAMITAR PEDIDO</button>
                    <div style="margin-top: 2rem; text-align: center; border: 1px dashed var(--borde); padding: 1.25rem; font-family: 'EB Garamond', serif; font-size: 0.9rem; color: var(--texto-secundario);">
                        <span>❧ Transacción protegida por cifrado de seguridad oficial</span>
                    </div>
                </form>
            </div>
        </div>
<style>
    .pago-selector input { display: none; }
    .pago-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1rem 0;
        border: 1px solid var(--borde);
        background: var(--fondo);
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s;
        color: var(--texto-secundario);
        border-radius: 4px;
        box-shadow: inset 0 0 5px rgba(0,0,0,0.03);
    }
    .pago-selector input:checked + .pago-box {
        border-color: var(--acento);
        color: var(--fondo);
        background: var(--acento);
        box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    .pago-box:hover { border-color: var(--texto-principal); transform: scale(1.02); }
</style>
    @endif
@endsection