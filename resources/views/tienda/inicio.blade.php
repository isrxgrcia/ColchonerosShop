@extends('layouts.app')
@section('titulo', 'COLCHONEROS — TOP SALES 2026')

@push('styles')
<style>
    .hero {
        position: relative;
        overflow: hidden;
        min-height: 85vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center; 
        padding-bottom: 6rem;
        margin-top: 0; 
        margin-bottom: 4rem;
        background: #000;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    .hero-bg {
        position: absolute;
        inset: 0;
        background: url('{{ asset('images/el_legado_striped.jpg') }}') center center / cover no-repeat;
        filter: contrast(1) brightness(1); 
        z-index: 1;
    }
    .hero-bg::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, 
            rgba(0,0,0,0.05) 0%, 
            rgba(0,0,0,0) 50%, 
            rgba(245, 238, 220, 0) 80%, 
            var(--fondo) 100%
        );
        z-index: 2;
    }

    .hero-content { 
        position: relative; 
        z-index: 2; 
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
 
    .section-header {
        margin-top: 6rem;
        margin-bottom: 4rem;
    }
    .section-title-vintage {
        font-family: 'EB Garamond', serif;
        font-variant: small-caps;
        font-size: 1.8rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        color: var(--texto-principal);
        text-align: center;
        display: flex;
        align-items: center;
        gap: 2rem;
    }
    .section-title-vintage::before, .section-title-vintage::after {
        content: '';
        height: 1px;
        flex-grow: 1;
        background: linear-gradient(to right, transparent, var(--borde), transparent);
    }
    .section-link {
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--texto-secundario);
        text-decoration: underline;
        transition: color 0.3s;
    }
    .section-link:hover { color: var(--acento); }

    .grid-productos {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        background: transparent;
    }
    @media(min-width: 768px)  { .grid-productos { grid-template-columns: repeat(3,1fr); } }
    @media(min-width: 1200px) { .grid-productos { grid-template-columns: repeat(5,1fr); } }

    .marquee-wrapper {
        border-bottom: 2px solid var(--borde);
        border-top: 2px solid var(--borde);
        overflow: hidden;
        white-space: nowrap;
        background: var(--blanco-roto);
        padding: 1rem 0;
        margin-top: 2rem;
    }
    .marquee-track {
        display: inline-block;
        animation: marquee-slide 30s linear infinite;
    }
    .marquee-track span {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--texto-secundario);
        margin-right: 4rem;
    }
    @keyframes marquee-slide {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>
@endpush

@section('contenido')

    {{-- Banner de arriba --}}
    <div class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            
        </div>
    </div>

    
    {{-- Texto que se mueve --}}
    <div class="marquee-wrapper">
        <div class="marquee-track">
            @for($i = 0; $i < 4; $i++)
                <span>NUNCA DEJES DE CREER</span>
                <span>PARTIDO A PARTIDO</span>
                <span>ATLETI HASTA LA MUERTE</span>
                <span>SENTIMIENTO ROJIBLANCO</span>
                <span>FORZA ATLETI</span>
                <span>AÚPA ATLETI</span>
            @endfor
        </div>
    </div>

    {{-- Bloque de productos de hombre --}}
    <div class="section-header reveal">
        <h2 class="section-title-vintage">DESTACADOS HOMBRE</h2>
    </div>
    <div class="grid-productos reveal">
        @foreach($destacadosHombre as $producto)
            @include('components.product-card', ['producto' => $producto])
        @endforeach
    </div>

    {{-- Bloque de productos de mujer --}}
    <div class="section-header reveal">
        <h2 class="section-title-vintage">DESTACADOS MUJER</h2>
    </div>
    <div class="grid-productos reveal">
        @foreach($destacadosMujer as $producto)
            @include('components.product-card', ['producto' => $producto])
        @endforeach
    </div>

    <div class="reveal" style="margin-top: 6rem; text-align: center; border-top: 2px dashed var(--borde); padding: 4rem 1rem;">
        <p class="title-section" style="margin-bottom: 2rem; font-size: 1rem;">¿Buscas artículos específicos?</p>
        <a href="{{ route('productos.index') }}" class="btn" style="background: var(--texto-secundario); color: var(--fondo); border-radius: 4px; padding: 1.25rem 3rem;">EXAMINAR CATÁLOGO COMPLETO</a>
    </div>

@endsection

