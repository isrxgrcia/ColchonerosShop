@extends('layouts.app')
@section('titulo', 'PANEL DE CONTROL — COLCHONEROS SHOP')
@push('styles')
<style>
    .admin-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 3px double var(--borde);
        border-bottom: 3px double var(--borde);
        padding: 2rem 0;
        margin-top: 4rem;
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
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1px;
        background: var(--borde);
        border: 1px solid var(--borde);
        margin-bottom: 0;
    }
    @media (max-width: 900px) { .kpi-grid { grid-template-columns: repeat(2, 1fr); } }
    .kpi-card {
        background: var(--blanco-roto);
        border: 1px solid var(--borde);
        padding: 2.5rem 1.5rem;
    }
    .kpi-label {
        font-family: 'EB Garamond', serif;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: var(--texto-secundario);
        display: block;
        margin-bottom: 1rem;
    }
    .kpi-value {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 900;
        color: var(--acento);
        line-height: 1;
        display: block;
    }
    .kpi-card.alerta .kpi-value { color: var(--rojo); }
    .charts-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1px;
        background: var(--borde);
        border: 1px solid var(--borde);
        border-top: none;
    }
    @media (max-width: 900px) { .charts-grid { grid-template-columns: 1fr; } }
    .chart-panel {
        background: var(--blanco-roto);
        padding: 2rem;
        border: 1px solid var(--borde);
    }
    .chart-panel-label {
        font-family:  'EB Garamond', sans-serif;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--texto-secundario);
        margin-bottom: 1.5rem;
        display: block;
    }
    .modulos-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        background: transparent;
        position: relative;
    }
    @media (max-width: 768px) { .modulos-grid { grid-template-columns: 1fr; } }
    .modulo-link {
        background: var(--blanco-roto);
        padding: 3rem 2rem;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        border: 1px solid var(--borde);
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
    }
    .modulo-link::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(205, 127, 50, 0.05), transparent);
        opacity: 0;
        transition: opacity 0.4s;
    }
    .modulo-link:hover {
        transform: translateY(-8px);
        box-shadow: 15px 15px 0px rgba(62, 39, 35, 0.1);
        border-color: var(--acento);
    }
    .modulo-link:hover::before { opacity: 1; }
    .modulo-icon {
        font-size: 2.5rem;
        margin-bottom: 2rem;
        color: var(--acento);
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .modulo-link:hover .modulo-icon { transform: rotate(360deg) scale(1.1); }
    .modulo-tag {
        font-family: 'monospace';
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: var(--texto-secundario);
        display: block;
        margin-bottom: 0.5rem;
    }
    .modulo-nombre {
        font-family: 'monospace';
        font-size: 1.6rem;
        font-weight: 900;
        text-transform: uppercase;
        color: var(--texto-principal);
        display: block;
        line-height: 1;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid var(--borde);
        padding-bottom: 0.75rem;
        animation: flicker 2s infinite alternate;
    }
    .modulo-desc-wrapper {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        position: relative;
    }
    .modulo-desc {
        font-size: 0.9rem;
        color: var(--texto-secundario);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-family: 'EB Garamond', serif;
        font-style: italic;
        display: inline-block;
        padding-left: 0;
    }
    .modulo-link:hover .modulo-desc {
        animation: ticker 5s linear infinite;
        padding-left: 100%;
    }
    @keyframes ticker {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
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
        padding: 1rem;
        border-bottom: 1px solid var(--borde);
        font-size: 0.85rem;
        vertical-align: middle;
        color: var(--texto-principal);
    }
    .admin-table tr:last-child td { border-bottom: none; }
    .admin-table tbody tr:hover td { background: rgba(166, 124, 82, 0.08); }
    .status-badge {
        font-family:  'EB Garamond', sans-serif;
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
</style>
@endpush
@section('contenido')
<div class="admin-section-header reveal">
    <div>
        <h1 class="admin-section-title">PANEL DE CONTROL</h1>
        <p class="title-section" style="margin-top: 0.25rem;">SISTEMA DE ADMINISTRACIÓN — COLCHONEROS SHOP</p>
    </div>
    <div style="text-align: right;">
        <span id="reloj-admin">--:--:--</span>
        <span class="admin-section-link" style="margin-left: 1.5rem;">{{ now()->format('d.m.Y') }}</span>
    </div>
</div>
<div class="kpi-grid reveal">
    <div class="kpi-card">
        <span class="kpi-label">PEDIDOS TOTALES</span>
        <span class="kpi-value">{{ $stats['totalPedidos'] ?? 0 }}</span>
    </div>
    <div class="kpi-card">
        <span class="kpi-label">CATÁLOGO ACTIVO</span>
        <span class="kpi-value">{{ $stats['totalProductos'] ?? 0 }}</span>
    </div>
    <div class="kpi-card">
        <span class="kpi-label">USUARIOS REGISTRADOS</span>
        <span class="kpi-value">{{ $stats['totalUsuarios'] ?? 0 }}</span>
    </div>
    <div class="kpi-card alerta">
        <span class="kpi-label">ALERTAS STOCK</span>
        <span class="kpi-value">{{ $stats['bajoStock'] ?? 0 }}</span>
    </div>
</div>
<div class="charts-grid reveal">
    <div class="chart-panel">
        <span class="chart-panel-label">VENTAS — ÚLTIMOS 7 DÍAS</span>
        <canvas id="salesChart" height="130"></canvas>
    </div>
    <div class="chart-panel" style="border-left: 1px solid var(--borde);">
        <span class="chart-panel-label">STOCK POR CATEGORÍA</span>
        <canvas id="categoryChart"></canvas>
    </div>
</div>
<div class="admin-section-header reveal">
    <span class="admin-section-title">MÓDULOS DE GESTIÓN</span>
</div>
<div class="modulos-grid reveal scanlines">
    <a href="{{ route('admin.pedidos') }}" class="modulo-link">
        <div class="modulo-icon">📦</div>
        <span class="modulo-tag">SISTEMA_LOG</span>
        <span class="modulo-nombre">LOGÍSTICA</span>
        <div class="modulo-desc-wrapper">
            <span class="modulo-desc">Gestión de transacciones y estados de expedición.</span>
        </div>
    </a>
    <a href="{{ route('admin.stock') }}" class="modulo-link">
        <div class="modulo-icon">📁</div>
        <span class="modulo-tag">INV_CONTROL</span>
        <span class="modulo-nombre">INVENTARIO</span>
        <div class="modulo-desc-wrapper">
            <span class="modulo-desc">Control paramétrico de existencias por talla.</span>
        </div>
    </a>
    <a href="{{ route('admin.usuarios') }}" class="modulo-link">
        <div class="modulo-icon">👥</div>
        <span class="modulo-tag">CRM_CLIENTS</span>
        <span class="modulo-nombre">CRM</span>
        <div class="modulo-desc-wrapper">
            <span class="modulo-desc">Administración de registros y perfiles de usuario.</span>
        </div>
    </a>
</div>
<div class="admin-section-header reveal">
    <span class="admin-section-title">ÚLTIMAS TRANSACCIONES</span>
    <a href="{{ route('admin.pedidos') }}" class="admin-section-link">VER HISTORIAL COMPLETO ↗</a>
</div>
<div style="border: 2px solid var(--borde); background: rgba(250, 246, 237, 0.5); overflow: hidden;" class="reveal">
    <table class="admin-table">
        <thead>
            <tr>
                <th>REF</th>
                <th>CLIENTE</th>
                <th>IMPORTE</th>
                <th>ESTADO</th>
                <th>FECHA</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidosRecientes ?? [] as $pedido)
            <tr>
                <td style="font-family:  'EB Garamond'; font-weight: 700; color: var(--rojo);">#{{ $pedido->id }}</td>
                <td>
                    <div style="font-weight: 600;">{{ $pedido->user->name ?? 'INVITADO' }}</div>
                    <div style="font-size: 0.7rem; color: var(--texto-secundario);">{{ $pedido->user->email ?? '' }}</div>
                </td>
                <td style="font-family:  'EB Garamond'; font-weight: 700; font-size: 1.1rem;">
                    {{ number_format($pedido->total_price ?? $pedido->total_amount ?? 0, 2) }}€
                </td>
                <td>
                    <span class="status-badge status-{{ $pedido->status }}">{{ $pedido->status }}</span>
                </td>
                <td style="color: var(--texto-secundario); font-size: 0.75rem; font-family: 'EB Garamond', serif;">
                    {{ $pedido->created_at->format('d.m.Y — H:i') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: var(--texto-secundario); padding: 3rem; font-family: 'EB Garamond', serif; text-transform: uppercase; letter-spacing: 0.1em;">
                    NO HAY PEDIDOS RECIENTES
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function tick() {
        const now = new Date();
        const pad = n => String(n).padStart(2, '0');
        document.getElementById('reloj-admin').textContent =
            pad(now.getHours()) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds());
        setTimeout(tick, 1000);
    })();
    const chartDefaults = {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: {
                grid:  { color: 'rgba(208,197,176,0.5)' },
                ticks: { color: '#5D4037', font: { family: 'EB Garamond', size: 11 } }
            },
            y: {
                grid:  { color: 'rgba(208,197,176,0.5)' },
                ticks: { color: '#5D4037', font: { family: 'EB Garamond', size: 11 } },
                beginAtZero: true
            }
        }
    };
    new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: ['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB', 'DOM'],
            datasets: [{
                data: [12, 19, 13, 15, 22, 30, 25],
                borderColor: '#4A0E0E',
                borderWidth: 2,
                pointBackgroundColor: '#4A0E0E',
                pointRadius: 4,
                tension: 0.3,
                fill: true,
                backgroundColor: 'rgba(74,14,14,0.06)'
            }]
        },
        options: chartDefaults
    });
    new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: ['HOMBRE', 'MUJER', 'ACCESORIOS'],
            datasets: [{
                data: [45, 35, 20],
                backgroundColor: ['#4A0E0E', '#A67C52', '#1B3022'],
                borderWidth: 2,
                borderColor: '#FAF6ED'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        color: '#5D4037',
                        font: { family: 'EB Garamond', size: 11 },
                        padding: 16
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection