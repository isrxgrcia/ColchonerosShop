<style>
    .navbar {
        background: var(--fondo);
        background-image: url('{{ asset('images/pattern_paper_bg.png') }}');
        border-bottom: 3px double var(--borde);
        padding: 1.5rem 0 0.5rem;
        position: sticky;
        top: 0;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 0;
        width: 100%;
    }
    .navbar-inner {
        width: 100%;
        max-width: 1800px;
        margin: 0 auto;
        padding: 0 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0;
    }
    .navbar-top-row {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    .brand {
        font-family: 'Playfair Display', serif, serif;
        font-style: italic;
        font-weight: 900;
        font-size: 2.2rem;
        color: var(--acento);
        text-decoration: none;
        letter-spacing: -0.01em;
        line-height: 1;
        text-transform: capitalize;
    }
    .brand span { font-size: 1.4rem; color: var(--texto-secundario); font-family: 'EB Garamond', serif; letter-spacing: 0.2rem; text-transform: uppercase; margin-left: 0.3rem; }
    @media (min-width: 768px) {
        .navbar-inner { padding: 0 4rem; }
        .brand { font-size: 3rem; }
        .brand span { font-size: 2rem; }
    }
    .nav-main {
        display: flex;
        list-style: none;
        align-items: center;
        border-top: 1px solid var(--borde);
        border-bottom: 1px solid var(--borde);
        padding: 0.75rem 0;
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
    }
    .nav-item {
        position: relative;
        display: flex;
        align-items: center;
    }
    .nav-divider {
        color: var(--borde);
        font-size: 0.8rem;
        padding: 0 0.5rem;
        opacity: 0.8;
    }
    @media (min-width: 768px) {
        .nav-divider { padding: 0 1rem; }
    }
    .nav-link {
        padding: 0 0.5rem;
        color: var(--texto-principal);
        text-decoration: none;
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: color 0.3s;
        height: 100%;
        display: flex;
        align-items: center;
        white-space: nowrap;
    }
    @media (min-width: 768px) {
        .nav-link { padding: 0 1rem; font-size: 1rem; }
    }
    .nav-link:hover, .nav-item:hover .nav-link { color: var(--acento); }
    .nav-link.active { color: var(--acento); }
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: var(--blanco-roto);
        border: 1px solid var(--borde);
        box-shadow: 4px 4px 15px rgba(0,0,0,0.08);
        min-width: 200px;
        padding: 0.75rem 0;
        display: none;
        z-index: 2000;
        border-top: 3px solid var(--acento);
    }
    .nav-item:hover .dropdown-menu, .nav-item.show-mobile .dropdown-menu { display: block; }
    .dropdown-link {
        display: block;
        padding: 0.75rem 1.5rem;
        color: var(--texto-secundario);
        text-decoration: none;
        font-family: 'EB Garamond', serif;
        font-size: 0.85rem;
        font-weight: 600;
        font-variant: small-caps;
        letter-spacing: 0.05em;
        transition: all 0.3s;
        text-align: center;
    }
    .dropdown-link:hover {
        background: var(--fondo);
        color: var(--texto-principal);
    }
    .user-profile {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.3rem;
        border: 2px solid var(--acento);
        background: var(--blanco-roto);
        transition: all 0.3s;
        text-decoration: none;
        border-radius: 40px;
        padding-right: 0.75rem;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    }
    .user-profile:hover { border-color: var(--texto-principal); background: var(--blanco-roto); }
    .user-avatar { width: 30px; height: 30px; border-radius: 50%; background: var(--acento); display: flex; align-items: center; justify-content: center; font-weight: 800; font-family: 'Playfair Display', serif; color: #fff; font-size: 0.8rem; }
    .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .user-name { font-family: 'EB Garamond', serif; font-size: 0.75rem; font-weight: 600; color: var(--texto-principal); text-transform: uppercase; letter-spacing: 0.05em; }
    @media (max-width: 767px) { .user-name { display: none; } }
    .badge-cart {
        background: var(--acento);
        color: var(--fondo);
        font-size: 0.65rem;
        font-weight: 600;
        font-family: 'Playfair Display', serif, serif;
        padding: 2px 6px;
        margin-left: 5px;
        border-radius: 50%;
        border: 1px solid var(--fondo);
    }
    .nav-actions { display: flex; align-items: center; gap: 0.75rem; }
    @media (min-width: 768px) { .nav-actions { gap: 1.5rem; } }
    .btn-logout-nav { border: 1px solid var(--borde); background: none; color: var(--texto-secundario); padding: 0.4rem 0.75rem; border-radius: 40px; font-family: 'EB Garamond'; cursor: pointer; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; transition: all 0.3s; }
    .btn-logout-nav:hover { background: var(--blanco-roto); color: var(--texto-principal); border-color: var(--texto-principal); }
    .hamburger {
        display: flex;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: 1px solid var(--borde);
        padding: 0.6rem;
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.3s;
    }
    .hamburger:hover { border-color: var(--acento); }
    .hamburger span {
        display: block;
        width: 22px;
        height: 2px;
        background: var(--texto-principal);
        transition: all 0.3s;
    }
    .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }
    @media (min-width: 768px) { .hamburger { display: none; } }
    .nav-main-wrapper {
        width: 100%;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        max-height: 0;
    }
    .nav-main-wrapper.open { max-height: 500px; }
    @media (min-width: 768px) {
        .nav-main-wrapper { max-height: none !important; overflow: visible; }
    }
    @media (max-width: 767px) {
        .nav-main { flex-direction: column; gap: 0.5rem; padding: 0.75rem; }
        .nav-main .nav-divider { display: none; }
        .nav-item { width: 100%; justify-content: center; }
        .dropdown-menu {
            position: static;
            transform: none;
            box-shadow: none;
            border-top: none;
            border-left: 3px solid var(--acento);
            margin: 0.25rem 0 0 1rem;
            width: calc(100% - 1rem);
        }
    }
</style>
<nav class="navbar" x-data="{ openMobile: false }">
    <div class="navbar-inner">
        <div class="navbar-top-row">
            <div class="nav-actions">
                @auth
                    <a href="{{ route('cliente.cuenta') }}" class="user-profile">
                        <div class="user-avatar">
                            @if(auth()->user()->profile_photo_url)
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </div>
                        <span class="user-name">{{ auth()->user()->name }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn" style="font-size: 0.7rem; padding: 0.4rem 0.75rem;">ACCESO</a>
                @endauth
            </div>
            <a href="{{ route('inicio') }}" class="brand">
                Colchoneros<span>Shop</span>
            </a>
            <div class="nav-actions">
                <a href="{{ route('cliente.carrito') }}" class="nav-link" style="padding: 0;">
                    CARRITO
                    @auth
                        @php $n = \App\Models\ItemCarrito::where('usuario_id', auth()->id())->count(); @endphp
                        @if($n > 0)<span class="badge-cart" id="cart-badge">{{ $n }}</span>@endif
                    @endauth
                </a>
                <button class="hamburger" :class="openMobile ? 'active' : ''" @click="openMobile = !openMobile" aria-label="Abrir menú de navegación">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                @auth
                <form action="{{ route('logout') }}" method="POST" style="margin: 0; display: none;" class="logout-desktop">
                    @csrf
                    <button type="submit" class="btn-logout-nav">SALIR</button>
                </form>
                @endauth
            </div>
        </div>
        <div class="nav-main-wrapper" :class="openMobile ? 'open' : ''">
            <ul class="nav-main">
                <li class="nav-item">
                    <a href="{{ route('inicio') }}" class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}" @click="openMobile = false">INICIO</a>
                </li>
                <span class="nav-divider">❧</span>
                <li class="nav-item" x-data="{ showDrop: false }" @click.outside="showDrop = false">
                    <a href="{{ route('productos.index', ['genero' => 'hombre']) }}" class="nav-link" @click="openMobile = false">HOMBRE</a>
                    <div class="dropdown-menu" @click="showDrop = !showDrop">
                        <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'camisetas']) }}" class="dropdown-link" @click="openMobile = false">CAMISETAS</a>
                        <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'sudaderas']) }}" class="dropdown-link" @click="openMobile = false">SUDADERAS</a>
                        <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'polos']) }}" class="dropdown-link" @click="openMobile = false">POLOS</a>
                        <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'pantalones']) }}" class="dropdown-link" @click="openMobile = false">PANTALONES</a>
                        <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'abrigos']) }}" class="dropdown-link" @click="openMobile = false">ABRIGOS</a>
                    </div>
                </li>
                <span class="nav-divider">❧</span>
                <li class="nav-item" x-data="{ showDrop: false }" @click.outside="showDrop = false">
                    <a href="{{ route('productos.index', ['genero' => 'mujer']) }}" class="nav-link" @click="openMobile = false">MUJER</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'camisetas']) }}" class="dropdown-link" @click="openMobile = false">CAMISETAS</a>
                        <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'sudaderas']) }}" class="dropdown-link" @click="openMobile = false">SUDADERAS</a>
                        <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'pantalones']) }}" class="dropdown-link" @click="openMobile = false">PANTALONES</a>
                        <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'punto']) }}" class="dropdown-link" @click="openMobile = false">PUNTO</a>
                        <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'abrigos']) }}" class="dropdown-link" @click="openMobile = false">ABRIGOS</a>
                    </div>
                </li>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <span class="nav-divider">❧</span>
                        <li class="nav-item"><a href="{{ route('admin.panel') }}" class="nav-link {{ request()->routeIs('admin.panel') ? 'active' : '' }}" @click="openMobile = false">ADMIN</a></li>
                    @endif
                    <span class="nav-divider">❧</span>
                    <li class="nav-item"><a href="{{ route('cliente.mis-compras') }}" class="nav-link" @click="openMobile = false">COMPRAS</a></li>
                    <span class="nav-divider">❧</span>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                            @csrf
                            <button type="submit" class="btn-logout-nav" style="font-size:0.85rem;">SALIR</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>