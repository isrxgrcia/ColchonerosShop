@extends('layouts.app')
@section('titulo', 'Crear Cuenta — Colchoneros Shop')
@section('contenido')
<div style="display:flex; justify-content:center; padding:4rem 2rem;">
    <div style="width:100%; max-width:580px; border:4px double var(--borde); background:var(--blanco-roto);">
        <div style="padding:2.5rem 2rem 1.5rem; text-align:center; border-bottom:3px double var(--borde);">
            <h1 style="font-family:'Playfair Display',serif; font-size:2.5rem; font-weight:900; color:var(--acento); font-style:italic; margin:0; text-transform:uppercase;">
                Nuevo Registro
            </h1>
            <p style="font-family:'EB Garamond',serif; color:var(--texto-secundario); margin:0.5rem 0 0; letter-spacing:0.1em; text-transform:uppercase; font-size:0.8rem;">
            Únase a Colchoneros Shop
            </p>
        </div>
        <div style="padding:2.5rem 2rem 2rem;">
            <form action="{{ route('registro.procesar') }}" method="POST">
                @csrf
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem 1rem;">
                    <div style="grid-column:1/-1;">
                        <label for="name" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                            Nombre Completo *
                        </label>
                        <input type="text" id="name" name="name"
                               class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                               value="{{ old('name') }}" placeholder="Su nombre completo" required
                               style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                        @error('name') <div style="color:var(--rojo); font-size:0.8rem; margin-top:0.35rem; font-weight:600;">{{ $message }}</div> @enderror
                    </div>
                    <div style="grid-column:1/-1;">
                        <label for="email" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                            Correo Electrónico *
                        </label>
                        <input type="email" id="email" name="email"
                               class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                               value="{{ old('email') }}" placeholder="correo@ejemplo.com" required
                               style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                        @error('email') <div style="color:var(--rojo); font-size:0.8rem; margin-top:0.35rem; font-weight:600;">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label for="password" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                            Contraseña *
                        </label>
                        <input type="password" id="password" name="password"
                               class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                               placeholder="Mínimo 8 caracteres" required
                               style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                        @error('password') <div style="color:var(--rojo); font-size:0.8rem; margin-top:0.35rem; font-weight:600;">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                            Repetir Contraseña *
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-control" placeholder="••••••••" required
                               style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                    </div>
                    <div>
                        <label for="phone" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                            Teléfono
                        </label>
                        <input type="text" id="phone" name="phone"
                               class="form-control" value="{{ old('phone') }}" placeholder="600 000 000"
                               style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                    </div>
                    <div>
                        <label for="address" style="display:block; font-family:'EB Garamond',serif; font-size:0.8rem; letter-spacing:0.05em; color:var(--texto-principal); margin-bottom:0.5rem; text-transform:uppercase; font-weight:700;">
                            Dirección de Envío
                        </label>
                        <input type="text" id="address" name="address"
                               class="form-control" value="{{ old('address') }}" placeholder="Calle, Ciudad"
                               style="background:var(--fondo); border:1px solid var(--borde); color:var(--texto-principal);">
                    </div>
                </div>
                <button type="submit" class="btn-primary" style="width:100%; padding:1.25rem; font-size:1.1rem; margin-top:1.5rem; border-radius:50px; cursor:pointer; border:none;">
                    CREAR CUENTA GRATIS →
                </button>
            </form>
        </div>
        <div style="text-align:center; padding:1.5rem 2rem; border-top:3px double var(--borde); font-family:'EB Garamond',serif; font-size:0.9rem; color:var(--texto-secundario);">
            ¿Ya tiene credenciales? <a href="{{ route('login') }}" style="color:var(--acento); font-weight:700; text-decoration:underline; text-decoration-thickness:2px; text-underline-offset:4px;">Inicie sesión</a>
        </div>
    </div>
</div>
@endsection