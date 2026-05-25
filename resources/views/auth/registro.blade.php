@extends('layouts.app')
@section('titulo', 'Crear Cuenta — Colchoneros Shop')
@push('styles')
<style>
    .auth-wrapper {
        display:flex; justify-content:center; align-items:flex-start;
        min-height:70vh; padding:4rem 2rem;
    }
    .auth-card {
        background: var(--negro);
        border: 1px solid var(--gris-borde);
        color: var(--blanco);
        width: 100%; max-width: 580px;
    }
    .auth-header {
        padding: 2.5rem 2rem 1.5rem;
        text-align: center;
        border-bottom: 1px solid var(--gris-borde);
    }
    .auth-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
        font-style: italic;
    }
    .auth-header p {
        font-family: 'EB Garamond', serif;
        color: var(--gris-texto);
        margin: 0.5rem 0 0;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-size: 0.8rem;
    }
    .auth-body { padding: 2.5rem 2rem 2rem; }
    .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:1.25rem 1rem; }
    .form-group.full { grid-column:1/-1; }
    .form-group label {
        display:block;
        font-family: 'EB Garamond', serif;
        font-size: 0.8rem;
        letter-spacing: 0.05em;
        color: var(--blanco);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }
    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 0.75rem 1rem;
        background: var(--negro);
        border: 1px solid var(--gris-borde);
        color: var(--blanco);
        font-family: 'EB Garamond', serif;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
    }
    .form-control:focus { border-color: var(--blanco); }
    .form-control.error { border-color: var(--rojo); }
    .form-control::placeholder { color: var(--gris-texto); }
    .error-msg { color: var(--rojo); font-size: 0.8rem; margin-top: 0.35rem; font-weight: 600; }
    .btn-submit {
        width: 100%;
        background: var(--blanco);
        color: var(--negro);
        border: none;
        padding: 1.25rem;
        font-family: 'EB Garamond', serif;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.2s;
        margin-top: 1.5rem;
        display: block;
    }
    .btn-submit:hover { background: var(--gris-borde); }
    .auth-footer {
        text-align: center;
        padding: 1.5rem 2rem;
        border-top: 1px solid var(--gris-borde);
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        color: var(--gris-texto);
    }
    .auth-footer a {
        color: var(--blanco);
        font-weight: 700;
        text-decoration: underline;
        text-decoration-color: var(--rojo);
        text-decoration-thickness: 2px;
        text-underline-offset: 4px;
    }
    .auth-footer a:hover { color: var(--rojo); }
</style>
@endpush
@section('contenido')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <h1>✨ Crear Cuenta</h1>
            <p>Únete a Colchoneros Shop hoy mismo</p>
        </div>
        <div class="auth-body">
            <form action="{{ route('registro.procesar') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group full">
                        <label for="name">Nombre Completo *</label>
                        <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                               value="{{ old('name') }}" placeholder="Tu nombre completo" required>
                        @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group full">
                        <label for="email">Correo Electrónico *</label>
                        <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                               value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                        @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña *</label>
                        <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                               placeholder="Mínimo 8 caracteres" required>
                        @error('password') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Repetir Contraseña *</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                               placeholder="••••••••" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="form-control"
                               value="{{ old('phone') }}" placeholder="600 000 000">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección de Envío</label>
                        <input type="text" id="address" name="address" class="form-control"
                               value="{{ old('address') }}" placeholder="Calle, Ciudad">
                    </div>
                </div>
                <button type="submit" class="btn-submit">Crear Cuenta Gratis →</button>
            </form>
        </div>
        <div class="auth-footer">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>
</div>
@endsection