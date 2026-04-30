@extends('layouts.app')
@section('titulo', 'CATÁLOGO — ' . strtoupper($genero ?? 'TODOS') . ' — ' . strtoupper($categoria ?? 'PRODUCTOS'))

@push('styles')
<style>
    .catalogo-header {
        border-top: 3px double var(--borde);
        border-bottom: 3px double var(--borde);
        padding: 2rem 0;
        margin-bottom: 3rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    .breadcrumb {
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        font-variant: small-caps;
        letter-spacing: 0.15em;
        color: var(--texto-secundario);
    }
    .breadcrumb span { color: var(--acento); font-weight: 700; }

    .category-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0.5rem 0;
        color: var(--texto-principal);
        letter-spacing: 0.05em;
    }

    .grid-productos {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        background: transparent;
    }
    @media(min-width: 768px)  { .grid-productos { grid-template-columns: repeat(3,1fr); } }
    @media(min-width: 1200px) { .grid-productos { grid-template-columns: repeat(4,1fr); } }
</style>
@endpush

@section('contenido')
    {{-- Cabecera con filtros y nombre de la categoría --}}
    <div class="catalogo-header">
        <div class="breadcrumb">
            TIENDA / {{ $genero ?? 'TODAVÍA NO SELECCIONADO' }} / <span>{{ $categoria ?? 'TODOS' }}</span>
        </div>
        <h1 class="category-title">
            {{ $categoria ?? ($genero ? 'TODO ' . $genero : 'CATÁLOGO COMPLETO') }}
        </h1>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span class="title-section">{{ $productos->total() }} ARTÍCULOS ENCONTRADOS</span>
            <div style="display: flex; gap: 1rem;">
                <a href="{{ route('productos.index', ['genero' => 'hombre']) }}" class="btn {{ $genero == 'hombre' ? 'btn-accent' : '' }}" style="font-size: 0.7rem;">HOMBRE</a>
                <a href="{{ route('productos.index', ['genero' => 'mujer']) }}" class="btn {{ $genero == 'mujer' ? 'btn-accent' : '' }}" style="font-size: 0.7rem;">MUJER</a>
            </div>
        </div>
    </div>

    {{-- Cuadrícula donde se pintan los productos --}}
    <div class="grid-productos">
        @forelse($productos as $producto)
            @include('components.product-card', ['producto' => $producto])
        @empty
            <div style="grid-column:1/-1; text-align:center; padding:10rem 0; border:2px dashed var(--borde); background: var(--blanco-roto);">
                <p class="title-xl" style="font-size: 1.5rem;">No hay productos en esta selección</p>
                <a href="{{ route('productos.index') }}" class="btn" style="margin-top: 2rem; border-radius: 4px;">RESETEAR FILTROS</a>
            </div>
        @endforelse
    </div>

    <div style="margin-top: 3rem; display: flex; justify-content: center;">
        {{ $productos->links('components.pagination') }}
    </div>

@endsection

