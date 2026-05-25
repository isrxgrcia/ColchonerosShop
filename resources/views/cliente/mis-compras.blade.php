@extends('layouts.app')
@section('titulo', 'Mis Compras — Colchoneros Shop')
@push('styles')
<style>
    .page-title {
        font-family: 'Playfair Display', serif;
        font-weight: 900;
        font-size: 3rem;
        color: var(--acento);
        border-bottom: 3px double var(--borde);
        padding-bottom: 1.5rem;
        margin-bottom: 3rem;
        text-align: center;
        letter-spacing: -0.02em;
    }
    .pedidos-list { border: 1px solid var(--borde); background: var(--blanco-roto); box-shadow: 4px 4px 0px rgba(0,0,0,0.05); }
    .pedido-row { border-bottom: 1px dashed var(--borde); transition: background 0.3s; }
    .pedido-row:last-child { border-bottom: none; }
    .pedido-row:hover { background: var(--fondo); }
    .pedido-trigger {
        display: flex; justify-content: space-between; align-items: center;
        padding: 2rem; width: 100%; background: none; border: none;
        cursor: pointer; text-align: left; color: var(--texto-principal);
    }
    .pedido-id { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 900; color: var(--texto-principal); }
    .pedido-meta { font-size: 0.95rem; color: var(--texto-secundario); font-family: 'EB Garamond', serif; margin-top: 0.4rem; font-style: italic; }
    .pedido-price { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; color: var(--texto-principal); }
    .invoice-wrapper {
        background: #fdfaf3;
        padding: 4rem;
        color: #3e2723;
        border-top: 2px solid var(--borde);
        font-family: 'EB Garamond', serif;
        overflow: hidden;
        position: relative;
        box-shadow: inset 0 0 50px rgba(0,0,0,0.02);
    }
    .invoice-header { display: flex; justify-content: space-between; border-bottom: 2px solid #3e2723; padding-bottom: 2rem; margin-bottom: 2rem; }
    .brand-invoice { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 2.2rem; color: #1b4d3e; }
    .brand-invoice span { font-family: 'EB Garamond', serif; font-size: 1rem; text-transform: uppercase; color: #3e2723; }
    .invoice-seal {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-15deg);
        border: 4px solid rgba(27,77,62,0.1); color: rgba(27,77,62,0.1);
        padding: 1rem 3rem; font-family: 'Playfair Display', serif; font-size: 5rem; font-weight: 900;
        text-transform: uppercase; letter-spacing: 0.2em; pointer-events: none;
    }
    .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 2rem; }
    .invoice-table th { text-align: left; font-family: 'EB Garamond', serif; font-size: 0.9rem; text-transform: uppercase; font-weight: 700; padding: 0.75rem 0.5rem; border-bottom: 1px solid #3e2723; }
    .invoice-table td { padding: 1rem 0.5rem; border-bottom: 1px solid #eee; }
    .btn-download {
        display: inline-flex; align-items: center; gap: 0.75rem; background: var(--acento); color: var(--fondo);
        padding: 1rem 2rem; font-family: 'EB Garamond', serif; font-size: 0.9rem; font-weight: 700; text-decoration: none;
        text-transform: uppercase; margin-top: 2rem; border-radius: 50px; transition: all 0.3s;
    }
    .btn-download:hover { background: var(--acento-hover); transform: translateY(-2px); }
    [x-cloak] { display: none !important; }
</style>
@endpush
@section('contenido')
    <h1 class="page-title">HISTORIAL_DE_COMPRAS</h1>
    @if($pedidos->isEmpty())
        <div style="border: 1px solid var(--gris-borde); padding: 5rem; text-align: center;">
            <p style="font-family:'EB Garamond', serif; color:#666;">TODAVÍA NO HAS REALIZADO NINGÚN PEDIDO</p>
            <a href="{{ route('cliente.novedades') }}" class="btn" style="margin-top: 2rem;">IR A COMPRAR →</a>
        </div>
    @else
        {{-- Listamos todas las compras del usuario; al hacer clic se despliega el detalle --}}
        <div class="pedidos-list" x-data="{ openPedido: null }">
            @foreach($pedidos as $pedido)
            <div class="pedido-row">
                <button class="pedido-trigger" @click="openPedido === {{ $pedido->id }} ? openPedido = null : openPedido = {{ $pedido->id }}">
                    <div>
                        <div class="pedido-id">ORDEN</div>
                        <div class="pedido-meta">REALIZADO EL {{ $pedido->created_at->format('d/m/Y') }} · {{ $pedido->items_count ?? $pedido->orderItems->count() }} ARTÍCULOS</div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 2rem;">
                        <div class="pedido-price">{{ number_format($pedido->total_amount, 2, ',', '.') }} €</div>
                        <span style="font-family: 'EB Garamond', serif; font-size: 1.2rem; transform: rotate(0deg); transition: transform 0.3s;" :style="openPedido === {{ $pedido->id }} ? 'transform: rotate(180deg)' : ''">↓</span>
                    </div>
                </button>
                {{-- Esta sección contiene la factura detallada que se muestra u oculta con Alpine.js --}}
                <div x-show="openPedido === {{ $pedido->id }}" x-collapse x-cloak>
                    <div class="invoice-wrapper">
                        <div class="invoice-seal">VERIFICADO</div>
                                    <div class="invoice-header">
                            <div>
                                <div class="brand-invoice">Colchoneros<span>Shop</span></div>
                                <div style="font-size: 0.85rem; color: #3e2723;">CALLE DE LA PASIÓN, 1903 · MADRID</div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-family:'EB Garamond'; font-size:0.9rem; color:#5d4037; font-variant: small-caps;">Nº de Asiento</div>
                                <div style="font-family:'Playfair Display', serif; font-size:1.2rem; font-weight: 700;">REG-{{ str_pad($pedido->id, 8, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;">
                            <div>
                                <h4 style="font-family:'EB Garamond'; font-size:0.9rem; border-bottom:1px solid #3e2723; margin-bottom:1rem; padding-bottom:0.5rem;">CLIENTE REGISTRADO</h4>
                                <div style="font-size:1.05rem; line-height:1.5;">
                                    <strong>{{ auth()->user()->name }}</strong><br>
                                    {{ auth()->user()->email }}<br>
                                    {{ $pedido->shipping_address }}
                                </div>
                            </div>
                            <div>
                                <h4 style="font-family:'EB Garamond'; font-size:0.9rem; border-bottom:1px solid #3e2723; margin-bottom:1rem; padding-bottom:0.5rem;">DETALLES DEL PAGO</h4>
                                <div style="font-size:1.05rem; line-height:1.5;">
                                    <strong>Sistema de Pago:</strong> {{ strtoupper($pedido->payment_method) }}<br>
                                    <strong>Situación:</strong> <span style="color:#1b4d3e; font-weight: 700;">FORMALIZADO</span><br>
                                    <strong>Envío:</strong> Servicio Gratuito Especial
                                </div>
                            </div>
                        </div>
                        <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th>DESCRIPCIÓN DEL ARTÍCULO</th>
                                    <th style="text-align: center;">CANT.</th>
                                    <th style="text-align: right;">VALOR UNID.</th>
                                    <th style="text-align: right;">VALOR TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedido->orderItems as $linea)
                                <tr>
                                    <td>
                                        <div style="font-weight:700;">{{ $linea->product->name ?? 'PRODUCTO' }}</div>
                                        <div style="font-size:0.9rem; color:#5d4037; font-style: italic;">Medida Seleccionada: {{ strtoupper($linea->size) }}</div>
                                    </td>
                                    <td style="text-align:center;">{{ $linea->quantity }}</td>
                                    <td style="text-align:right;">{{ number_format($linea->unit_price, 2) }}€</td>
                                    <td style="text-align:right; font-weight:700;">{{ number_format($linea->unit_price * $linea->quantity, 2) }}€</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="width: 280px; margin-left: auto;">
                            <div style="display:flex; justify-content:space-between; font-size:1rem; padding:0.5rem 0; border-bottom: 1px dashed #3e2723;">
                                <span>Base Imponible</span>
                                <span>{{ number_format($pedido->total_amount / 1.21, 2) }}€</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; font-size:1rem; padding:0.5rem 0; border-bottom: 1px dashed #3e2723;">
                                <span>Tasa IVA (21%)</span>
                                <span>{{ number_format($pedido->total_amount - ($pedido->total_amount/1.21), 2) }}€</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; font-family:'Playfair Display', serif; font-size:1.5rem; font-weight:900; border-top:3px double #3e2723; padding-top:0.5rem;">
                                <span>TOTAL FINAL</span>
                                <span>{{ number_format($pedido->total_amount, 2, ',', '.') }}€</span>
                            </div>
                        </div>
                        <a href="javascript:window.print()" class="btn-download">
                            ❧ IMPRIMIR REGISTRO OFICIAL
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
@endsection