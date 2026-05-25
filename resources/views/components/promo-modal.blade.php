@php
    /* Lógica en PHP para decidir si mostramos la promo. 
       Por ejemplo, solo se muestra si el usuario no tiene pedidos previos. */
    $mostrarPromo = true;
    if (auth()->check()) {
        $mostrarPromo = !\App\Models\Order::where('user_id', auth()->id())->exists();
    }
@endphp
@if($mostrarPromo)
{{-- Usamos Alpine.js (x-data) para controlar la visibilidad del modal en el cliente --}}
<div x-data="{ showPromo: false }"
     {{-- Escuchamos un evento global para activar el modal con un pequeño retraso --}}
     x-on:show-atleti-promo.window="setTimeout(() => { showPromo = true }, 500)"
     x-show="showPromo"
     x-cloak
     class="promo-overlay"
>
    <div class="promo-card-vintage" @click.away="showPromo = false">
        {{-- Botón para cerrar el modal cambiando la variable de Alpine.js a false --}}
        <button @click="showPromo = false" class="close-btn-vintage">✕</button>
        <div class="promo-grid">
            <div class="promo-image-wall">
                <img src="https://images.unsplash.com/photo-1522778119026-d647f0596c20?auto=format&fit=crop&q=80&w=1000"
                     alt="Afición Atleti"
                     onerror="this.src='https://placehold.co/800x600/111/444?text=FORZA+ATLETI'">
                <div class="promo-sepia-overlay"></div>
            </div>
            <div class="promo-body-vintage">
                <div class="promo-header-editorial">
                    <span class="editorial-tag">❦ INVITACIÓN EXCLUSIVA</span>
                    <h2 class="promo-title">Bienvenido a la<br>Familia.</h2>
                </div>
                <p class="promo-text-vintage">
                    Agradecemos su interés en nuestra selección. Como muestra de cortesía, le otorgamos un certificado de descuento aplicable en su primera adquisición.
                </p>
                <div class="code-container-vintage">
                    <span class="code-label">CERTIFICADO NÚM.</span>
                    <div class="code-value">FORZAATLETI10</div>
                </div>
                <div style="margin-top: 2.5rem;">
                    <form action="{{ route('cliente.carrito.descuento') }}" method="POST">
                        @csrf
                        <input type="hidden" name="codigo" value="FORZAATLETI10">
                        <button type="submit" class="btn-primary" style="display: block; width: 100%; text-align: center; border: none; cursor: pointer; padding: 1.5rem; border-radius: 50px;">
                            RECLAMAR MI BENEFICIO
                        </button>
                    </form>
                </div>
                <div class="promo-footer-vintage">
                    <span>VÁLIDEZ: INDETERMINADA</span>
                    <span>NUNCA DEJES DE CREER — {{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<style>
    .promo-overlay {
        position: fixed;
        inset: 0;
        background: rgba(62, 39, 35, 0.4);
        backdrop-filter: blur(8px);
        z-index: 100000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }
    .promo-card-vintage {
        background: var(--fondo);
        border: 4px double var(--borde);
        width: 100%;
        max-width: 900px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    }
    .close-btn-vintage {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: var(--blanco-roto);
        border: 1px solid var(--borde);
        color: var(--texto-principal);
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer !important;
        z-index: 999;
        font-family: 'EB Garamond';
        font-size: 1.25rem;
        transition: all 0.3s;
        border-radius: 50%;
    }
    .close-btn-vintage:hover {
        background: var(--acento);
        color: var(--fondo);
        border-color: var(--acento);
        transform: rotate(90deg);
    }
    .promo-grid {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        min-height: 550px;
    }
    @media (max-width: 800px) {
        .promo-grid { grid-template-columns: 1fr; }
        .promo-image-wall { display: none; }
    }
    .promo-image-wall {
        position: relative;
        background: #000;
        border-right: 2px solid var(--borde);
    }
    .promo-image-wall img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.8;
        filter: sepia(1) contrast(1.1) brightness(0.9);
    }
    .promo-sepia-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(245, 238, 220, 0), var(--fondo));
    }
    .promo-body-vintage {
        padding: 4rem 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: var(--fondo);
    }
    .editorial-tag {
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
        color: var(--acento);
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-bottom: 1rem;
        display: block;
        font-weight: 700;
    }
    .promo-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 900;
        line-height: 1.05;
        color: var(--texto-principal);
        font-style: italic;
    }
    .promo-text-vintage {
        margin-top: 1.5rem;
        font-family: 'EB Garamond', serif;
        font-size: 1.15rem;
        color: var(--texto-secundario);
        line-height: 1.6;
        font-style: italic;
    }
    .code-container-vintage {
        margin-top: 2.5rem;
        border: 2px dashed var(--borde);
        padding: 1.5rem;
        background: var(--blanco-roto);
        position: relative;
        text-align: center;
    }
    .code-label {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--fondo);
        padding: 0 15px;
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        letter-spacing: 0.1em;
        color: var(--texto-secundario);
        font-variant: small-caps;
    }
    .code-value {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 900;
        color: var(--texto-principal);
        letter-spacing: 0.05em;
    }
    .promo-footer-vintage {
        margin-top: auto;
        padding-top: 2.5rem;
        display: flex;
        justify-content: space-between;
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        color: var(--borde);
        font-variant: small-caps;
        letter-spacing: 0.1em;
    }
</style>