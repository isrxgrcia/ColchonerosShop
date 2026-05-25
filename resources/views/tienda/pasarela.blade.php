@extends('layouts.app')
@section('titulo', 'PASARELA DE PAGO SEGURA — Colchoneros Shop')
@push('styles')
<style>
    .gateway-container {
        max-width: 500px;
        margin: 4rem auto;
        border: 1px solid var(--gris-borde);
        padding: 3rem;
        background: var(--negro);
        position: relative;
    }
    .status-badge { font-family: 'EB Garamond', serif; font-size: 0.65rem; color: #10b981; margin-bottom: 0.5rem; }
    .method-title { font-family: 'EB Garamond', serif; font-size: 1.5rem; text-transform: uppercase; margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; font-family: 'EB Garamond', serif; font-size: 0.7rem; color: var(--gris-texto); margin-bottom: 0.5rem; text-transform: uppercase; }
    .form-input {
        width: 100%;
        background: transparent;
        border: 1px solid var(--gris-borde);
        color: white;
        padding: 1rem;
        font-family: 'EB Garamond', serif;
        font-size: 1rem;
        outline: none;
    }
    .form-input:focus { border-color: var(--blanco); }
    .loader-overlay {
        position: absolute; inset: 0; background: var(--negro); z-index: 10;
        display: none; flex-direction: column; align-items: center; justify-content: center;
        text-align: center;
    }
    .spinner { border: 4px solid rgba(255,255,255,0.1); border-left-color: var(--rojo); border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin-bottom: 1rem; }
    @keyframes spin { 100% { transform: rotate(360deg); } }
</style>
@endpush
@section('contenido')
<div class="gateway-container" x-data="{ loading: false, metodo: '{{ $metodo }}' }">
    <div class="loader-overlay" :style="loading ? 'display: flex' : 'display: none'">
        <div class="spinner"></div>
        <div class="title-serif" style="font-size: 1.5rem; color: white;">PROCESANDO {{ $metodo }}...</div>
        <p class="text-muted" style="font-size: 0.8rem; margin-top: 0.5rem;">Validando transacción con tu entidad bancaria.</p>
    </div>
    <div class="status-badge">✓ TRANSACCIÓN ENCRIPTADA (AES-256)</div>
    @if ($errors->any())
        <div style="background: rgba(255,0,0,0.1); border: 1px solid var(--rojo); padding: 1rem; margin-bottom: 2rem; color: var(--rojo); font-family: 'EB Garamond', serif; font-size: 0.75rem;">
            @foreach ($errors->all() as $error)
                <div>✕ {{ $error }}</div>
            @endforeach
        </div>
    @endif
    <div class="method-title">
        @if($metodo == 'TARJETA') 💳 @elseif($metodo == 'BIZUM') 📱 @else 🅿️ @endif
        PAGO CON {{ $metodo }}
    </div>
    <form x-on:submit.prevent="loading = true; setTimeout(() => $el.submit(), 2500)" action="{{ route('cliente.pagar') }}" method="POST">
        @csrf
        <input type="hidden" name="metodo_pago" value="{{ $metodo }}">
        <input type="hidden" name="direccion_envio" value="{{ $direccion }}">
        @if($metodo == 'TARJETA')
            <div class="form-group">
                <label>NÚMERO DE TARJETA</label>
                <input type="text" name="numero_tarjeta" class="form-input" placeholder="XXXX XXXX XXXX XXXX" required>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label>CADUCIDAD</label>
                    <input type="text" name="caducidad" class="form-input" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label>CVV</label>
                    <input type="text" name="cvv" class="form-input" placeholder="***" required>
                </div>
            </div>
        @elseif($metodo == 'BIZUM')
            <div class="form-group">
                <label>NÚMERO DE TELÉFONO ASOCIADO</label>
                <input type="text" name="telefono_bizum" class="form-input" placeholder="600 000 000" required>
            </div>
            <p class="text-muted" style="font-size: 0.75rem; margin-bottom: 1.5rem;">Recibirás una notificación en tu app bancaria para autorizar el cargo de <strong>{{ $total }}€</strong>.</p>
        @else
            <div class="form-group">
                <label>EMAIL DE PAYPAL</label>
                <input type="email" name="email_paypal" class="form-input" placeholder="usuario@email.com" required>
            </div>
        @endif
        <div style="background: rgba(255,255,255,0.05); padding: 1.5rem; margin-bottom: 2rem; border: 1px solid var(--gris-borde);">
            <div style="display: flex; justify-content: space-between; font-family: 'EB Garamond', serif; font-size: 0.8rem;">
                <span>TOTAL A PAGAR:</span>
                <span style="color: var(--rojo); font-size: 1.25rem; font-weight: 700;">{{ $total }} €</span>
            </div>
        </div>
        <button type="submit" class="btn-primary" style="width: 100%; padding: 1.25rem;">
            PAGAR AHORA_
        </button>
        <a href="{{ route('cliente.carrito') }}" style="display: block; text-align: center; margin-top: 1.5rem; color: #666; font-family: 'EB Garamond', serif; font-size: 0.8rem; text-decoration: none;">CANCELAR Y VOLVER AL CARRITO</a>
    </form>
</div>
@endsection