<style>
    .site-footer {
        margin-top: 5rem;
        background: var(--fondo);
        color: var(--texto-principal);
        position: relative;
        z-index: 10000 !important;
        overflow-x: hidden;
        padding: 1rem !important;
        margin: 0 !important;
        width: 100% !important;
        display: block;
        box-sizing: border-box;
    }
    .site-footer::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='18' height='18' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0 h10 v10 h-10 z M10 10 h10 v10 h-10 z' fill='%233E2723' fill-opacity='0.02'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 0;
    }
    .gaceta-frame {
        border: 4px solid var(--texto-principal);
        position: relative;
        padding: 4px;
        background: transparent;
        z-index: 1;
    }
    .gaceta-frame-inner {
        border: 1px solid var(--texto-principal);
        padding: 4rem 3rem;
        background: transparent;
    }
    .footer-newsletter-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid var(--borde);
        padding-bottom: 3rem;
        margin-bottom: 4rem;
        gap: 3rem;
        flex-wrap: wrap;
    }
    .newsletter-headline h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 900;
        font-size: 2.8rem;
        color: var(--acento);
        text-transform: uppercase;
        line-height: 0.9;
        margin-bottom: 0.75rem;
    }
    .newsletter-headline p {
        font-family: monospace;
        font-size: 0.95rem;
        color: var(--texto-secundario);
        letter-spacing: 0.05em;
    }
    .newsletter-form-stadium {
        display: flex;
        background: var(--blanco-roto);
        border: 2px solid var(--borde);
        padding: 5px;
        max-width: 550px;
        flex: 1;
    }
    .newsletter-form-stadium input {
        flex: 1;
        border: none;
        padding: 0.8rem 1.2rem;
        font-family: monospace;
        background: transparent;
        outline: none;
        color: var(--texto-principal);
        font-size: 0.9rem;
    }
    .btn-ticket {
        background: var(--acento);
        color: var(--fondo);
        border: none;
        padding: 0.8rem 2.5rem;
        font-family: 'Playfair Display', serif; font-weight: 900;
        font-size: 0.85rem;
        cursor: pointer;
        text-transform: uppercase;
        clip-path: polygon(8% 0%, 92% 0%, 100% 20%, 100% 80%, 92% 100%, 8% 100%, 0% 80%, 0% 20%);
        transition: transform 0.2s;
    }
    .btn-ticket:hover { transform: scale(1.05); }
    .brand-patch {
        background: var(--acento);
        color: var(--fondo);
        display: inline-block;
        padding: 1.25rem 2.5rem;
        font-family: 'Playfair Display', serif; font-weight: 900;
        font-size: 1.8rem;
        text-transform: uppercase;
        text-decoration: none;
        box-shadow: 6px 6px 0px var(--bronce);
        margin-bottom: 2rem;
    }
    .footer-grid-industrial {
        display: grid;
        grid-template-columns: 2.5fr 1fr 1fr 1.5fr;
        gap: 0;
        width: 100%;
    }
    .column-news {
        padding: 0 3rem;
        border-right: 1px solid var(--borde);
    }
    .column-news:last-child { border-right: none; }
    .column-news h4 {
        font-family: 'Playfair Display', serif; font-weight: 900;
        font-size: 1.1rem;
        color: var(--texto-principal);
        text-transform: uppercase;
        margin-bottom: 2rem;
        border-bottom: 4px solid var(--bronce);
        display: inline-block;
    }
    .column-news ul { list-style: none; margin: 0; padding: 0; }
    .column-news ul li { margin-bottom: 1rem; }
    .column-news ul li a {
        font-family: monospace;
        font-size: 0.95rem;
        color: var(--texto-secundario);
        text-decoration: none;
        text-transform: uppercase;
        font-weight: bold;
    }
    .column-news ul li a:hover { color: var(--acento); }
    .stamps-container { display: flex; flex-direction: column; gap: 1.5rem; }
    .stamp-item { display: flex; align-items: center; gap: 1.2rem; }
    .stamp-box {
        width: 55px; height: 55px;
        border: 2px solid var(--bronce);
        display: flex; align-items: center; justify-content: center;
        font-family: 'Playfair Display', serif; font-weight: 900;
        font-size: 1.1rem;
        color: var(--acento);
        transform: rotate(-4deg);
    }
    .stamp-info strong { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 0.7rem; display: block; color: var(--texto-principal); }
    .stamp-info span { font-family: monospace; font-size: 0.8rem; opacity: 0.8; }
    .footer-print-credits {
        margin-top: 5rem;
        padding-top: 2rem;
        border-top: 1px solid var(--borde);
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: monospace;
        font-size: 0.8rem;
    }
    .social-print {
        border: 1px solid var(--borde);
        padding: 0.6rem 2rem;
        display: flex;
        gap: 2rem;
    }
    .social-print a { color: var(--texto-principal); }
    @media (max-width: 1024px) {
        .footer-grid-industrial { grid-template-columns: 1fr 1fr; }
        .column-news { border-right: none; border-bottom: 1px solid var(--borde); }
    }
</style>
<footer class="site-footer">
    <div class="gaceta-frame">
        <div class="gaceta-frame-inner">
            <div class="footer-newsletter-row">
                <div class="newsletter-headline">
                    <h3>Última Hora</h3>
                    <p>REGISTRO OFICIAL — ACCESO PRIORITARIO A REBAJAS Y NUEVOS LANZAMIENTOS</p>
                </div>
                {{-- Formulario de newsletter. En este caso es solo estético, prevenimos el envío con preventDefault --}}
                <form class="newsletter-form-stadium" onsubmit="event.preventDefault();">
                    <input type="email" placeholder="CÓDIGO CLIENTE (E-MAIL)" required>
                    <button type="submit" class="btn-ticket">SUSCRIBIRSE</button>
                </form>
            </div>
            <div class="footer-grid-industrial">
                <div class="column-news">
                    <a href="{{ route('inicio') }}" class="brand-patch">
                        Colchoneros
                    </a>
                    <p style="font-family: monospace; font-size: 0.9rem; line-height: 1.5; color: var(--texto-secundario);">
                        SUMINISTROS OFICIALES DE ROPA DE CALIDAD PARA EL SECTOR DEPORTIVO Y URBANO. ESTABLECIDOS IN 1903. DISEÑO DE HERENCIA HISTÓRICA PARA EL AFICIONADO EXIGENTE.
                    </p>
                </div>
                <div class="column-news">
                    <h4>Catálogo</h4>
                    <ul>
                        <li><a href="{{ route('productos.index', ['genero' => 'hombre']) }}">Masculino</a></li>
                        <li><a href="{{ route('productos.index', ['genero' => 'mujer']) }}">Femenino</a></li>
                        <li><a href="{{ route('productos.index') }}">Inventario Total</a></li>
                        <li><a href="#">Drop Actual</a></li>
                    </ul>
                </div>
                <div class="column-news">
                    <h4>Administración</h4>
                    <ul>
                        @auth
                            <li><a href="{{ route('cliente.mis-compras') }}">Orden Pedidos</a></li>
                            <li><a href="{{ route('cliente.carrito') }}">Cesta</a></li>
                            <li><a href="{{ route('cliente.cuenta') }}">Perfil</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Acceso Socios</a></li>
                            <li><a href="{{ route('registro') }}">Nuevo Registro</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="column-news">
                    <h4>Control Calidad</h4>
                    <div class="stamps-container">
                        <div class="stamp-item">
                            <div class="stamp-box">EG</div>
                            <div class="stamp-info">
                                <strong>Logística Aprobada</strong>
                                <span>Envío gratuito > 100€</span>
                            </div>
                        </div>
                        <div class="stamp-item">
                            <div class="stamp-box">GZ</div>
                            <div class="stamp-info">
                                <strong>Garantía Sarto</strong>
                                <span>14 días cambio verificado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-print-credits">
                <div>
                    © 2026 COLCHONEROS SHOP — DISTRIBUCIÓN NACIONAL
                </div>
                {{-- Listado de redes sociales. Usamos enlaces simples que se pueden estilizar fácilmente --}}
                <div class="social-print">
                    <a href="#">INSTAGRAM</a>
                    <a href="#">TIKTOK</a>
                    <a href="#">TWITTER</a>
                </div>
            </div>
        </div>
    </div>
</footer>