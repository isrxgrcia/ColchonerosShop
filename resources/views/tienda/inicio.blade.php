@extends('layouts.app')

@section('title', 'Bienvenido — Tienda DAW')

@section('contenido')
<div style="text-align:center; padding: 5rem 2rem;">
    <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">¡Bienvenido a la Tienda!</h1>
    <div style="margin-top: 2rem; font-size: 1.1rem; color: #000; font-weight: 500;">
        Laravel {{ app()->version() }} operativo
    </div>
</div>
@endsection
