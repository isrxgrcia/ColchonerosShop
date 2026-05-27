@extends('layouts.app')
@section('titulo', 'INVENTARIO — COLCHONEROS SHOP')
@push('styles')
<style>
    .admin-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 3px double var(--borde);
        border-bottom: 3px double var(--borde);
        padding: 2rem 0;
        margin-bottom: 3rem;
    }
    .admin-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 900;
        text-transform: uppercase;
        color: var(--texto-principal);
        letter-spacing: 0.05em;
    }
    .admin-section-link {
        font-family: 'EB Garamond', serif;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--texto-secundario);
        text-decoration: underline;
        transition: color 0.3s;
    }
    .admin-section-link:hover { color: var(--acento); }
    .filtros-bar {
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto;
        gap: 1rem;
        align-items: flex-end;
    }
    @media (max-width: 900px) { .filtros-bar { grid-template-columns: 1fr 1fr; } }
    .filtro-grupo label {
        font-family: 'EB Garamond', serif;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--texto-secundario);
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    .stock-table-wrapper {
        border: 2px solid var(--borde);
        background: rgba(250, 246, 237, 0.5);
        overflow: hidden;
    }
    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }
    .admin-table thead {
        background: var(--acento);
    }
    .admin-table th {
        text-align: left;
        padding: 1rem 1.25rem;
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.12em;
        color: var(--fondo);
        border-bottom: none;
    }
    .admin-table td {
        padding: 1.25rem;
        border-bottom: 1px solid var(--borde);
        vertical-align: top;
    }
    .admin-table tbody tr {
        transition: background 0.3s ease;
    }
    .admin-table tbody tr:hover {
        background: rgba(166, 124, 82, 0.08);
    }
    .admin-table tbody tr:last-child td {
        border-bottom: none;
    }
    .producto-row {
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }
    .producto-thumb-container {
        position: relative;
        overflow: hidden;
        width: 64px;
        height: 80px;
        border: 2px solid var(--borde);
        border-radius: 4px;
        flex-shrink: 0;
        background: var(--blanco-roto);
    }
    .producto-thumb {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: sepia(0.15) contrast(1.05);
        transition: transform 0.5s ease;
    }
    .producto-thumb-container:hover .producto-thumb {
        transform: scale(1.15);
    }
    .producto-info-name {
        font-family: 'EB Garamond', serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--texto-principal);
        display: block;
        margin-bottom: 0.2rem;
        line-height: 1.3;
    }
    .producto-info-meta {
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        color: var(--texto-secundario);
        font-style: italic;
    }
    .producto-info-id {
        display: inline-block;
        font-family: monospace;
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--acento);
        background: rgba(74, 14, 14, 0.08);
        padding: 0.15rem 0.5rem;
        border-radius: 3px;
        letter-spacing: 0.05em;
        margin-top: 0.35rem;
    }
    .variantes-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
    }
    .variante-card {
        background: var(--blanco-roto);
        border: 1px solid var(--borde);
        border-radius: 6px;
        padding: 0.6rem 0.75rem;
        min-width: 95px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .variante-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--bronce), var(--acento));
        opacity: 0;
        transition: opacity 0.3s;
    }
    .variante-card:hover {
        border-color: var(--bronce);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }
    .variante-card:hover::before {
        opacity: 1;
    }
    .variante-card.is-saved {
        border-color: var(--acento-secundario);
        background: rgba(27, 48, 34, 0.04);
    }
    .variante-card.is-saved::before {
        background: var(--acento-secundario);
        opacity: 1;
    }
    .variante-talla {
        display: block;
        font-family: 'EB Garamond', serif;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--texto-secundario);
        margin-bottom: 0.4rem;
    }
    .variante-form {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        justify-content: center;
    }
    .variante-input-wrapper {
        position: relative;
        width: 52px;
    }
    .variante-input {
        width: 100% !important;
        text-align: center;
        padding: 0.35rem 0.25rem !important;
        font-family: 'EB Garamond', serif !important;
        font-size: 1.05rem !important;
        font-weight: 700 !important;
        color: var(--texto-principal) !important;
        background: var(--fondo) !important;
        border: 1px solid var(--borde) !important;
        border-radius: 4px !important;
        transition: border-color 0.3s;
        -moz-appearance: textfield;
    }
    .variante-input::-webkit-outer-spin-button,
    .variante-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .variante-input:focus {
        border-color: var(--bronce) !important;
        outline: none;
        box-shadow: 0 0 0 2px rgba(166, 124, 82, 0.2);
    }
    .stock-progress-bg {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        border-radius: 0 0 4px 4px;
        background: linear-gradient(90deg, var(--bronce), var(--acento));
        transition: width 0.6s cubic-bezier(0.19, 1, 0.22, 1);
        z-index: 10;
        pointer-events: none;
    }
    .btn-save-stock {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent !important;
        border: 1px solid var(--borde) !important;
        border-radius: 4px !important;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.8rem !important;
        color: var(--texto-secundario);
        padding: 0 !important;
        line-height: 1;
    }
    .btn-save-stock:hover {
        background: var(--acento) !important;
        border-color: var(--acento) !important;
        color: var(--fondo);
        transform: scale(1.1);
    }
    .status-saved {
        font-family: 'EB Garamond', serif;
        font-size: 0.6rem;
        font-weight: 700;
        color: var(--acento-secundario);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        display: block;
        margin-top: 0.3rem;
        animation: neon-flicker 2s infinite alternate;
    }
    .sin-variantes {
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        color: var(--texto-secundario);
        font-style: italic;
        padding: 0.5rem 0;
    }

    @media (max-width: 768px) {
        .admin-section-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        .admin-section-title {
            font-size: 1.6rem;
        }
        .admin-table th:first-child,
        .admin-table td:first-child {
            width: 40% !important;
        }
        .producto-thumb-container {
            width: 48px;
            height: 60px;
        }
        .variantes-grid {
            gap: 0.4rem;
        }
        .variante-card {
            min-width: 80px;
            padding: 0.5rem;
        }
    }
</style>
@endpush
@section('contenido')
<div class="admin-section-header reveal">
    <div>
        <h1 class="admin-section-title">CONTROL DE INVENTARIO</h1>
        <p class="title-section" style="margin-top: 0.25rem;">EXISTENCIAS POR PRODUCTO Y TALLA</p>
    </div>
    <a href="{{ route('admin.panel') }}" class="btn">← PANEL</a>
</div>
@if(session('exito'))
    <div style="border: 1px solid var(--borde); padding: 1rem; margin-bottom: 2rem; color: var(--acento-secundario); font-family: 'EB Garamond', serif;">
        [✓] {{ session('exito') }}
    </div>
@endif
<form action="{{ route('admin.stock') }}" method="GET" class="filtros-bar reveal" style="background: rgba(212, 197, 176, 0.4); border: 2px solid var(--borde);">
    <div class="filtro-grupo">
        <label>BUSCAR PRODUCTO</label>
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Nombre o ID..." style="background: var(--blanco-roto); border: 1px solid var(--borde); font-family: 'EB Garamond'; font-size: 1rem;">
    </div>
    <div class="filtro-grupo">
        <label>LÍNEA</label>
        <select name="genero" id="genero" onchange="actualizarCategorias()" style="background: var(--blanco-roto); border: 1px solid var(--borde); font-family: 'EB Garamond'; font-size: 1rem;">
            <option value="todos">TODAS LAS LÍNEAS</option>
            <option value="hombre" {{ request('genero') == 'hombre' ? 'selected' : '' }}>HOMBRE</option>
            <option value="mujer"  {{ request('genero') == 'mujer'  ? 'selected' : '' }}>MUJER</option>
        </select>
    </div>
    <div class="filtro-grupo">
        <label>CATEGORÍA</label>
        <select name="categoria_id" id="categoria_id" style="background: var(--blanco-roto); border: 1px solid var(--borde); font-family: 'EB Garamond'; font-size: 1rem;">
            <option value="todas">TODAS LAS CATEGORÍAS</option>
            @foreach(\App\Models\Category::all() as $cat)
                <option value="{{ $cat->id }}"
                        data-genero="{{ $cat->gender }}"
                        {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>
                    {{ strtoupper($cat->name) }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn" style="background: var(--acento); color: var(--fondo); padding: 0.8rem 2rem;">APLICAR FILTRO</button>
</form>
<div class="stock-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th style="width: 35%;">PRODUCTO</th>
                <th>VARIANTES DE STOCK</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
            @php
                $isCamisaRomantica = str_contains(strtolower($producto->name ?? ''), 'romántica');
            @endphp
            <tr>
                <td>
                    <div class="producto-row">
                        <div class="producto-thumb-container">
                            <img src="{{ asset('storage/products/' . $producto->image_primary) }}"
                                 class="producto-thumb"
                                 alt="{{ $producto->name }}"
                                 onerror="this.src='https://placehold.co/64x80/F5EEDC/3E2723?text={{ urlencode(substr($producto->name ?? 'IMG', 0, 3)) }}'">
                        </div>
                        <div>
                            <strong class="producto-info-name">{{ $producto->name }}</strong>
                            <span class="producto-info-meta">{{ $producto->category->name ?? 'Catálogo General' }}</span>
                            <span class="producto-info-id">#{{ $producto->id }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="variantes-grid">
                        @forelse($producto->inventories as $inv)
                        @php
                            $isSavedSim = $isCamisaRomantica && strtoupper($inv->size ?? '') == 'L';
                        @endphp
                        <div class="variante-card {{ $isSavedSim ? 'is-saved' : '' }}">
                            <span class="variante-talla">{{ strtoupper($inv->size ?? '—') }}</span>
                            <form method="POST" action=""
                                  onsubmit="actualizarRutaStock(event, this, {{ $inv->id }})"
                                  class="variante-form">
                                @csrf @method('PATCH')
                                <div class="variante-input-wrapper">
                                    <input type="number" name="cantidad"
                                           value="{{ $inv->stock_quantity }}"
                                           min="0" class="variante-input">
                                    <div class="stock-progress-bg" style="width: {{ min(100, $inv->stock_quantity * 2) }}%"></div>
                                </div>
                                <button type="submit" class="btn-save-stock" title="Guardar stock" onclick="return confirm('¿Guardar stock ' + this.form.querySelector('input[name=\'cantidad\']').value + ' unidades?')">
                                    @if($isSavedSim)
                                        <span style="color:var(--acento-secundario)">✓</span>
                                    @else
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                    @endif
                                </button>
                            </form>
                            @if($isSavedSim)
                                <span class="status-saved">GUARDADO</span>
                            @endif
                        </div>
                        @empty
                            <span class="sin-variantes">❦ Sin variantes disponibles</span>
                        @endforelse
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" style="text-align: center; padding: 3rem;">
                    <span class="sin-variantes">No se encontraron productos</span>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top: 2rem; margin-bottom: 4rem;">
    {{ $productos->links('components.pagination') }}
</div>
@push('scripts')
<script>
function actualizarRutaStock(event, form, inventoryId) {
    event.preventDefault();
    const cant = form.querySelector('input[name="cantidad"]').value;
    form.action = `{{ url('admin/stock') }}/${inventoryId}/${cant}`;
    setTimeout(() => {
        form.submit();
    }, 400);
}
function actualizarCategorias() {
    const genero = document.getElementById('genero').value;
    document.querySelectorAll('#categoria_id option[data-genero]').forEach(opt => {
        opt.hidden = (genero !== 'todos' && opt.dataset.genero !== genero);
    });
}
document.addEventListener('DOMContentLoaded', actualizarCategorias);
</script>
@endpush
@endsection