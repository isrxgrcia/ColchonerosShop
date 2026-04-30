@extends('layouts.app')

@section('titulo', $producto->name . ' — COLCHONEROS SHOP')

@section('contenido')
<div class="padding-section" x-data="{ mainPhoto: '{{ $fotos[0] }}' }">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
        
        
        {{-- Galería de fotos del producto --}}
        <div class="gallery-container">
            {{-- Foto grande --}}
            <div class="main-photo-wrap" style="border: 4px double var(--borde); overflow: hidden; position: relative; padding-top: 125%; background: var(--blanco-roto);">
                <img :src="mainPhoto" 
                     alt="{{ $producto->name }}" 
                     class="img-vintage"
                     style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease; filter: sepia(0.3) contrast(1.1);">
            </div>

            {{-- Miniaturas para cambiar de foto --}}
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-top: 1.5rem;">
                @foreach($fotos as $foto)
                    <div @mouseenter="mainPhoto = '{{ $foto }}'" 
                         style="border: 1px solid var(--borde); cursor: pointer; padding-top: 100%; position: relative; overflow: hidden; background: var(--blanco-roto);"
                         :class="{ 'active-thumb': mainPhoto === '{{ $foto }}' }">
                        <img src="{{ $foto }}" 
                             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; filter: sepia(0.2);"
                             class="img-vintage-thumb">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Información detallada y formulario de compra --}}
        <div class="info-container" style="position: sticky; top: 7rem;">
            <div class="border-bottom" style="padding-bottom: 2rem; margin-bottom: 2rem; border-bottom: 2px dashed var(--borde);">
                <span class="title-section" style="font-size: 1rem;">{{ $producto->category->name ?? 'CATEGORÍA' }}</span>
                <h1 class="title-serif" style="font-size: 4rem; margin-top: 1rem; line-height: 1.1;">{{ $producto->name }}</h1>
                <p style="font-family: 'EB Garamond', serif; font-size: 1.25rem; margin-top: 1.5rem; color: var(--texto-secundario); line-height: 1.6; font-style: italic;">{{ $producto->description }}</p>
                <div style="font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 900; margin-top: 2rem; color: var(--texto-principal); font-style: italic;">
                    {{ number_format($producto->price, 2, ',', '.') }} €
                </div>
            </div>

            {{-- Formulario para añadir al carro --}}
            @auth
            <form action="{{ route('cliente.carrito.agregar') }}" method="POST" id="form-{{ $producto->id }}">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                
                <div style="margin-bottom: 2.5rem;">
                    <label class="title-section" style="display: block; margin-bottom: 1rem;">SELECCIONA TALLA</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                        @foreach($producto->inventories as $inv)
                            <label class="talla-selector">
                                <input type="radio" name="talla" value="{{ $inv->size }}" required>
                                <span class="talla-box {{ $inv->stock_quantity == 0 ? 'agotado' : '' }}">{{ $inv->size }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div style="margin-bottom: 2rem;">
                    <label class="title-section" style="display: block; margin-bottom: 1rem;">CANTIDAD</label>
                    <input type="number" name="cantidad" value="1" min="1" max="10" class="form-control" style="width: 80px;">
                </div>

                <button type="button" class="btn-primary" 
                        onclick="peticionAgregarCarrito({{ $producto->id }})"
                        {{ $producto->inventories->sum('stock_quantity') == 0 ? 'disabled' : '' }}
                        style="width: 100%; padding: 1.5rem; font-size: 1.2rem; border-radius: 50px; box-shadow: 4px 4px 0px rgba(62, 39, 35, 0.2);">
                    {{ $producto->inventories->sum('stock_quantity') == 0 ? 'SOLICITUD AGOTADA' : 'SOLICITAR ARTÍCULO' }}
                </button>
            </form>
            @else
            <div style="margin-bottom: 2.5rem;">
                <p style="font-family: 'EB Garamond', serif; font-size: 1.1rem; margin-bottom: 1.5rem; color: var(--texto-secundario);">Para formalizar una solicitud, debe autenticarse en nuestro registro oficial.</p>
                <a href="{{ route('login') }}" class="btn-primary" style="width: 100%; padding: 1.5rem; font-size: 1.2rem; text-align: center; text-decoration: none; display: block; border-radius: 50px;">
                    ACCEDER AL REGISTRO
                </a>
            </div>
            @endauth

            <div style="margin-top: 4rem; font-family: 'EB Garamond', serif; font-size: 1rem; color: var(--texto-secundario); line-height: 1.8; border: 1px dashed var(--borde); padding: 1.5rem; background: var(--blanco-roto);">
                <p>❦ Envío estándar gratuito en pedidos superiores a 100€.</p>
                <p>❦ Devoluciones disponibles durante 14 días naturales.</p>
                <p>❦ Calidad superior garantizada por Colchoneros Shop.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .img-vintage:hover {
        filter: sepia(0.1) contrast(1.15) brightness(1.05) !important;
    }
    .active-thumb {
        border: 2px solid var(--acento) !important;
        box-shadow: 0 0 10px rgba(27, 77, 62, 0.2);
    }
    .talla-selector input { display: none; }
    .talla-box {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        border: 1px solid var(--borde);
        background: var(--blanco-roto);
        font-family: 'EB Garamond', serif;
        font-weight: 700;
        font-size: 1.25rem;
        cursor: pointer;
        transition: all 0.3s;
        border-radius: 4px;
    }
    .talla-selector input:checked + .talla-box {
        background: var(--acento);
        color: var(--fondo);
        border-color: var(--acento);
        box-shadow: inset 2px 2px 5px rgba(0,0,0,0.2);
    }
    .talla-box:hover {
        border-color: var(--texto-principal);
        background: var(--fondo);
    }
    .talla-box.agotado {
        opacity: 0.3;
        text-decoration: line-through;
        cursor: not-allowed;
        background: #e0d9c4;
    }
</style>
@endsection

