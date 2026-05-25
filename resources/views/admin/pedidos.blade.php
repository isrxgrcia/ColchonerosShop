@extends('layouts.app')
@section('titulo', 'LOGÍSTICA — COLCHONEROS SHOP')
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
        text-decoration: none;
        transition: color 0.3s;
    }
    .admin-section-link:hover { color: var(--acento); }
    .filtros-bar {
        border: 2px solid var(--borde);
        padding: 1.5rem;
        margin-bottom: 2rem;
        background: rgba(212, 197, 176, 0.4);
        display: grid;
        grid-template-columns: 2fr 1fr auto;
        gap: 1rem;
        align-items: flex-end;
    }
    @media (max-width: 768px) { .filtros-bar { grid-template-columns: 1fr; } }
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
        font-size: 0.9rem;
        vertical-align: top;
        color: var(--texto-principal);
    }
    .admin-table tbody tr {
        transition: background 0.3s ease;
    }
    .admin-table tr:last-child td { border-bottom: none; }
    .admin-table tbody tr:hover td { background: rgba(166, 124, 82, 0.08); }
    .status-badge {
        font-family: 'EB Garamond', serif;
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        padding: 3px 10px;
        border: 1px solid;
        display: inline-block;
    }
    .status-pendiente  { color: #c97a00; border-color: #c97a00; }
    .status-completado { color: var(--acento-secundario); border-color: var(--acento-secundario); }
    .status-cancelado  { color: var(--rojo); border-color: var(--rojo); }
    .status-select-inline {
        background: var(--blanco-roto);
        border: 1px solid var(--borde);
        color: var(--texto-principal);
        padding: 0.4rem 0.6rem;
        font-family: 'EB Garamond', serif;
        font-size: 0.8rem;
        text-transform: uppercase;
        border-radius: 3px;
    }
    .status-select-inline:focus { border-color: var(--acento); outline: none; }
    .product-list { list-style: none; margin: 0; padding: 0; }
    .product-list li {
        font-size: 0.8rem;
        color: var(--texto-secundario);
        margin-bottom: 0.25rem;
        font-family: 'EB Garamond', serif;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .product-list li strong { color: var(--texto-principal); font-weight: 700; }
</style>
@endpush
@section('contenido')
<div class="admin-section-header reveal">
    <div>
        <h1 class="admin-section-title">GESTIÓN DE PEDIDOS</h1>
        <p class="title-section" style="margin-top: 0.25rem;">CONTROL DE EXPEDICIONES Y ESTADOS</p>
    </div>
    <a href="{{ route('admin.panel') }}" class="btn">← PANEL</a>
</div>
@if(session('exito'))
    <div style="border: 1px solid var(--borde); padding: 1rem; margin-bottom: 2rem; color: #10b981; font-family: 'EB Garamond', serif; font-variant: small-caps;">
        [✓] {{ session('exito') }}
    </div>
@endif
<form action="{{ route('admin.pedidos') }}" method="GET" class="filtros-bar reveal">
    <div class="filtro-grupo">
        <label>BUSCAR</label>
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="NOMBRE, EMAIL O ID...">
    </div>
    <div class="filtro-grupo">
        <label>ESTADO</label>
        <select name="estado">
            <option value="todos">TODOS</option>
            @foreach(['pending','processing','shipped','delivered','cancelled'] as $st)
                <option value="{{ $st }}" {{ request('estado') == $st ? 'selected' : '' }}>{{ strtoupper($st) }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn">FILTRAR</button>
</form>
<div style="border: 2px solid var(--borde); background: rgba(250, 246, 237, 0.5); overflow: hidden;" class="reveal">
    <table class="admin-table">
        <thead>
            <tr>
                <th>REF</th>
                <th>CLIENTE</th>
                <th>FECHA</th>
                <th>ARTÍCULOS</th>
                <th>IMPORTE</th>
                <th>ESTADO / ACCIÓN</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
            <tr>
                <td style="font-family: 'EB Garamond', serif; font-weight: 700; color: var(--rojo);">#{{ $pedido->id }}</td>
                <td>
                    <div style="font-weight: 600;">{{ $pedido->user->name ?? 'INVITADO' }}</div>
                    <div style="font-size: 0.7rem; color: var(--texto-secundario);">{{ $pedido->user->email ?? '' }}</div>
                </td>
                <td style="font-family: 'EB Garamond', serif; font-size: 0.75rem; color: var(--texto-secundario);">
                    {{ $pedido->created_at->format('d.m.Y') }}<br>{{ $pedido->created_at->format('H:i') }}
                </td>
                <td>
                    <ul class="product-list">
                        @foreach($pedido->orderItems as $item)
                            <li>{{ $item->quantity }}× <strong>{{ $item->product->name ?? '—' }}</strong> ({{ strtoupper($item->size) }})</li>
                        @endforeach
                    </ul>
                </td>
                <td style="font-family: 'EB Garamond', serif; font-weight: 700; font-size: 1rem;">
                    {{ number_format($pedido->total_amount ?? 0, 2) }}€
                </td>
                <td>
                    <form method="POST" action=""
                          onsubmit="actualizarRutaPedido(event, this, {{ $pedido->id }})"
                          style="display: flex; gap: 0.5rem; align-items: center;">
                        @csrf @method('PATCH')
                        <select name="estado" class="status-select-inline">
                            @foreach(['pending','processing','shipped','delivered','cancelled'] as $st)
                                <option value="{{ $st }}" {{ $pedido->status == $st ? 'selected' : '' }}>{{ strtoupper($st) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn" style="padding: 0.4rem 0.85rem; font-size: 0.7rem;">OK</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; color: var(--texto-secundario); padding: 3rem; font-family: 'EB Garamond', serif; text-transform: uppercase; letter-spacing: 0.1em;">
                    NO SE ENCONTRARON PEDIDOS
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top: 2rem; margin-bottom: 4rem;">
    {{ $pedidos->links('components.pagination') }}
</div>
@push('scripts')
<script>
function actualizarRutaPedido(event, form, pedidoId) {
    event.preventDefault();
    const estado = form.querySelector('select[name="estado"]').value;
    if (!estado) return;
    form.action = `{{ url('admin/pedidos') }}/${pedidoId}/estado/${estado}`;
    form.submit();
}
</script>
@endpush
@endsection