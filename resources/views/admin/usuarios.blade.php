@extends('layouts.app')
@section('titulo', 'CRM — COLCHONEROS SHOP')
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
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--borde);
        font-size: 0.9rem;
        vertical-align: middle;
        color: var(--texto-principal);
    }
    .admin-table tr:last-child td { border-bottom: none; }
    .admin-table tbody tr:hover td { background: rgba(166, 124, 82, 0.08); }
    .user-avatar {
        width: 40px;
        height: 40px;
        border: 2px solid var(--borde);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Playfair Display', serif;
        font-weight: 900;
        font-size: 1.1rem;
        color: var(--fondo);
        background: var(--acento);
        flex-shrink: 0;
    }
    .rol-badge {
        font-family: 'EB Garamond', serif;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        padding: 3px 12px;
        border: 1px solid;
        display: inline-block;
        border-radius: 2px;
    }
    .rol-admin   { color: var(--acento); border-color: var(--acento); background: rgba(74,14,14,0.06); }
    .rol-cliente { color: var(--texto-secundario); border-color: var(--borde); }
    .status-dot {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: 'EB Garamond', serif;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--acento-secundario);
    }
    .status-dot::before {
        content: '';
        width: 7px;
        height: 7px;
        background: var(--acento-secundario);
        display: inline-block;
        border-radius: 50%;
    }
</style>
@endpush
@section('contenido')
<div class="admin-section-header reveal">
    <div>
        <h1 class="admin-section-title">ADMINISTRACIÓN CRM</h1>
        <p class="title-section" style="margin-top: 0.25rem;">PERFILES, PERMISOS Y COMUNIDAD</p>
    </div>
    <a href="{{ route('admin.panel') }}" class="btn">← PANEL</a>
</div>
<form action="{{ route('admin.usuarios') }}" method="GET" class="filtros-bar reveal">
    <div class="filtro-grupo">
        <label>BUSCAR PERFIL</label>
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="NOMBRE, EMAIL O ID">
    </div>
    <div class="filtro-grupo">
        <label>ROL</label>
        <select name="rol">
            <option value="todos">TODOS LOS ROLES</option>
            <option value="admin"   {{ request('rol') == 'admin'   ? 'selected' : '' }}>ADMIN</option>
            <option value="cliente" {{ request('rol') == 'cliente' ? 'selected' : '' }}>CLIENTE</option>
        </select>
    </div>
    <button type="submit" class="btn">FILTRAR</button>
</form>
<div style="border: 2px solid var(--borde); background: rgba(250, 246, 237, 0.5); overflow: hidden;" class="reveal">
    <table class="admin-table">
        <thead>
            <tr>
                <th>IDENTIDAD</th>
                <th>CORREO ELECTRÓNICO</th>
                <th>ROL</th>
                <th>FECHA DE ALTA</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $user)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        <div>
                            <div style="font-weight: 600;">{{ $user->name }}</div>
                            <div class="title-section">#{{ $user->id }}</div>
                        </div>
                    </div>
                </td>
                <td style="font-family: 'EB Garamond', serif; font-size: 0.8rem; color: var(--texto-secundario);">
                    {{ $user->email }}
                </td>
                <td>
                    <span class="rol-badge rol-{{ strtolower($user->role) }}">
                        {{ strtoupper($user->role) }}
                    </span>
                </td>
                <td style="font-family: 'EB Garamond', serif; font-size: 0.8rem; color: var(--texto-secundario);">
                    {{ $user->created_at->format('d.m.Y') }}<br>
                    {{ $user->created_at->format('H:i') }}
                </td>
                <td>
                    <span class="status-dot">ACTIVO</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: var(--texto-secundario); padding: 3rem; font-family: 'EB Garamond', serif; text-transform: uppercase; letter-spacing: 0.1em;">
                    NO SE ENCONTRARON USUARIOS
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top: 2rem; margin-bottom: 4rem;">
    {{ $usuarios->links('components.pagination') }}
</div>
@endsection