@extends('layouts.app')
@section('titulo', 'Iniciar Sesión — Colchoneros Shop')
@section('contenido')
<div style="display:flex; justify-content:center; padding:4rem 2rem;">
    <div style="width:100%; max-width:480px; border:4px double var(--borde); background:var(--blanco-roto);">
        <div style="padding:2.5rem 2rem 1.5rem; text-align:center; border-bottom:3px double var(--borde);">
            <h1 style="font-family:'Playfair Display',serif; font-size:2.5rem; font-weight:900; color:var(--acento); font-style:italic; margin:0; text-transform:uppercase;">
                Acceso Socios
            </h1>
            <p style="font-family:'EB Garamond',serif; color:var(--texto-secundario); margin:0.5rem 0 0; letter-spacing:0.1em; text-transform:uppercase; font-size:0.8rem;">
                Identifíquese para acceder a la tienda
            </p>
        </div>
        <div style="padding:2.5rem 2rem 2rem;">
            @if(session('mensaje_sesion'))
                <div style="border:1px dashed var(--acento-secundario); padding:1rem; margin-bottom:1.5rem; color:var(--acento-secundario); font-family:'EB Garamond',serif; text-align:center;">
                    ✓ {{ session('mensaje_sesion') }}
                </div>
            @endif
            <form action="{{ route('login.procesar') }}" method="POST">
                @csrf
                <div style="margin-bottom:1.5rem;">
                    <label for="email" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                        Correo Electrónico
                    </label>
                    <input type="email" id="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                           value="{{ old('email') }}" placeholder="tucorreo@ejemplo.com" required
                           style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                    @error('email') <div style="color:var(--rojo); font-size:0.8rem; margin-top:0.35rem; font-weight:600;">{{ $message }}</div> @enderror
                </div>
                <div style="margin-bottom:1.5rem;">
                    <label for="password" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                           placeholder="••••••••" required
                           style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                    @error('password') <div style="color:var(--rojo); font-size:0.8rem; margin-top:0.35rem; font-weight:600;">{{ $message }}</div> @enderror
                </div>
                <div style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
                    <input type="checkbox" id="recuerdame" name="recuerdame"
                           style="accent-color:var(--acento); width:1.1rem; height:1.1rem; margin:0;">
                    <label for="recuerdame" style="margin:0; font-family:'EB Garamond',serif; color:var(--texto-secundario); cursor:pointer;">Recuérdame</label>
                </div>
                <button type="submit" class="btn-primary" style="width:100%; padding:1.25rem; font-size:1.1rem; border-radius:50px; cursor:pointer; border:none;">
                    ENTRAR A LA TIENDA →
                </button>
            </form>
        </div>
        <div style="text-align:center; padding:1.5rem 2rem; border-top:3px double var(--borde); font-family:'EB Garamond',serif; font-size:0.9rem; color:var(--texto-secundario);">
            ¿No tiene credenciales? <a href="{{ route('registro') }}" style="color:var(--acento); font-weight:700; text-decoration:underline; text-decoration-thickness:2px; text-underline-offset:4px;">Regístrese aquí</a>
        </div>
    </div>
</div>
@endsection