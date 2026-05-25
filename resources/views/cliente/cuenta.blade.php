@extends('layouts.app')
@section('titulo', 'Mi Cuenta — Colchoneros Shop')
@push('styles')
<style>
    .page-title {
        font-family: 'Playfair Display', serif, serif;
        font-weight: 900;
        font-size: 3rem;
        color: var(--acento);
        border-bottom: 3px double var(--borde);
        padding-bottom: 1.5rem;
        margin-bottom: 3rem;
        text-align: center;
        letter-spacing: -0.02em;
    }
    .cuenta-container { display: grid; grid-template-columns: 1fr 340px; gap: 3rem; }
    @media(max-width: 900px) { .cuenta-container { grid-template-columns: 1fr; } }
    .cuenta-box { border: 4px double var(--borde); padding: 2.5rem; background: var(--blanco-roto); }
    .box-title {
        font-family: 'EB Garamond', serif;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--acento);
        margin-bottom: 2rem;
        border-bottom: 1px dashed var(--borde);
        padding-bottom: 0.75rem;
        font-weight: 700;
    }
    .avatar-upload-section { text-align: center; border: 1px solid var(--borde); padding: 2.5rem; background: var(--blanco-roto); position: relative; }
    .avatar-preview {
        width: 160px; height: 160px; border-radius: 50%; border: 2px solid var(--acento);
        margin: 0 auto 2rem; overflow: hidden; background: var(--fondo);
        display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display', serif; font-size: 3.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        color: var(--texto-principal);
    }
    .avatar-preview img { width: 100%; height: 100%; object-fit: cover; filter: sepia(0.2); }
    .custom-file-upload {
        display: inline-block; padding: 0.85rem 1.5rem; border: 1px solid var(--texto-principal);
        font-family: 'EB Garamond'; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; cursor: pointer; transition: all 0.3s;
        border-radius: 4px;
    }
    .custom-file-upload:hover { background: var(--acento); color: var(--fondo); border-color: var(--acento); }
    .form-group { margin-bottom: 2rem; }
    .form-group label { display: block; font-family: 'EB Garamond'; font-size: 0.9rem; color: var(--texto-secundario); text-transform: uppercase; margin-bottom: 0.75rem; font-weight: 700; letter-spacing: 0.05em; }
    .form-input {
        width: 100%; background: var(--fondo); border: 1px solid var(--borde); color: var(--texto-principal); padding: 1.25rem;
        font-family: 'EB Garamond', serif; font-size: 1.1rem; outline: none; transition: border-color 0.3s;
        border-radius: 4px;
    }
    .form-input:focus { border-color: var(--acento); box-shadow: 0 0 10px rgba(27,77,62,0.05); }
    .btn-save {
        background: var(--acento);
        color: var(--fondo);
        border: none;
        padding: 1.25rem 2.5rem;
        font-family: 'EB Garamond';
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
        border-radius: 50px;
        box-shadow: 4px 4px 0px rgba(0,0,0,0.1);
    }
    .btn-save:hover { background: var(--acento-hover); transform: translateY(-2px); box-shadow: 6px 6px 0px rgba(0,0,0,0.1); }
</style>
@endpush
@section('contenido')
    <h1 class="page-title">CONFIGURACIÓN_DE_CUENTA</h1>
    @if(session('exito'))
        <div style="border: 1px dashed var(--acento); padding: 1rem; margin-bottom: 2rem; color: var(--acento); font-family: 'EB Garamond'; font-weight: 700;">
            ✓ {{ session('exito') }}
        </div>
    @endif
    {{-- Este formulario permite al usuario actualizar su información y subir una nueva foto de perfil --}}
    <form action="{{ route('cliente.cuenta.actualizar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="cuenta-container">
            <div class="cuenta-box">
                <div class="box-title">INFORMACIÓN PERSONAL</div>
                <div class="form-group">
                    <label>NOMBRE COMPLETO</label>
                    <input type="text" name="name" value="{{ $usuario->name }}" class="form-input" required>
                </div>
                <div class="form-group">
                    <label>CORREO ELECTRÓNICO (No editable)</label>
                    <input type="email" value="{{ $usuario->email }}" class="form-input" style="color: #444;" readonly>
                </div>
                <div class="form-group">
                    <label>DIRECCIÓN DE ENVÍO PREDETERMINADA</label>
                    <textarea name="address" class="form-input" rows="3">{{ $usuario->address }}</textarea>
                </div>
                <div style="margin-top: 3rem;">
                    <button type="submit" class="btn-save">GUARDAR CAMBIOS EN EL PERFIL</button>
                </div>
            </div>
            <div class="avatar-upload-section">
                <div class="box-title">FOTO DE PERFIL</div>
                <div class="avatar-preview">
                    @if($usuario->profile_photo_url)
                        <img src="{{ $usuario->profile_photo_url }}" alt="{{ $usuario->name }}" id="preview-img">
                    @else
                        <span id="preview-placeholder">{{ strtoupper(substr($usuario->name, 0, 1)) }}</span>
                        <img src="" id="preview-img" style="display:none; width:100%; height:100%; object-fit:cover;">
                    @endif
                </div>
                <label class="custom-file-upload">
                    <input type="file" name="foto" id="foto-input" style="display: none;" onchange="previewFile()">
                    SELECCIONAR NUEVA IMAGEN
                </label>
                <p style="font-size: 0.6rem; color: var(--texto-secundario);">
                    Recomendado: 500x500px<br>Formatos: JPG, PNG, GIF
                </p>
                <div style="border-top: 1px dashed var(--borde); margin-top: 2.5rem; padding-top: 2.5rem; text-align: center;">
                    <div style="font-family: 'EB Garamond'; font-size: 0.85rem; color: var(--texto-secundario); text-transform: uppercase; font-variant: small-caps; letter-spacing: 0.1em;">MIEMBRO DESDE EL ORIGEN</div>
                    <div style="font-family: 'Playfair Display', serif; color: var(--texto-principal); margin-top: 0.5rem; font-weight: 700; font-size: 1.2rem;">{{ $usuario->created_at->format('M Y') }}</div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
<script>
    function previewFile() {
        const preview = document.getElementById('preview-img');
        const placeholder = document.getElementById('preview-placeholder');
        const file = document.getElementById('foto-input').files[0];
        const reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
            if (placeholder) placeholder.style.display = 'none';
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush