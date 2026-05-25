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
        gap: 1rem;
        width: 100%;
    }
    .navbar-inner {
        width: 100%;
        max-width: 1800px;
        margin: 0 auto;
        padding: 0 4rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    .navbar-top-row {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .brand {
        font-family: 'Playfair Display', serif, serif;
        font-style: italic;
        font-weight: 900;
        font-size: 3rem;
        color: var(--acento);
        text-decoration: none;
        letter-spacing: -0.01em;
        line-height: 1;
        text-transform: capitalize;
    }
    .brand span { font-size: 2rem; color: var(--texto-secundario); font-family: 'EB Garamond', serif; letter-spacing: 0.2rem; text-transform: uppercase; margin-left: 0.5rem; }
    .nav-main {
        display: flex;
        list-style: none;
        align-items: center;
        border-top: 1px solid var(--borde);
        border-bottom: 1px solid var(--borde);
        padding: 0.75rem 0;
        width: 100%;
        justify-content: center;
    }
    .nav-item {
        position: relative;
        display: flex;
        align-items: center;
    }
    .nav-divider {
        color: var(--borde);
        font-size: 0.8rem;
        padding: 0 1rem;
        opacity: 0.8;
    }
    .nav-link {
        padding: 0 1rem;
        color: var(--texto-principal);
        text-decoration: none;
        font-family: 'EB Garamond', serif;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: color 0.3s;
        height: 100%;
        display: flex;
        align-items: center;
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
        min-width: 220px;
        padding: 1rem 0;
        display: none;
        z-index: 2000;
        border-radius: 4px;
        border-top: 3px solid var(--acento);
    }
    .nav-item:hover .dropdown-menu { display: block; }
    .dropdown-link {
        display: block;
        padding: 0.75rem 1.5rem;
        color: var(--texto-secundario);
        text-decoration: none;
        font-family: 'EB Garamond', serif;
        font-size: 0.9rem;
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
        gap: 0.75rem;
        padding: 0.4rem;
        border: 2px solid var(--acento);
        background: var(--blanco-roto);
        transition: all 0.3s;
        text-decoration: none;
        border-radius: 40px;
        padding-right: 1.25rem;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    }
    .user-profile:hover { border-color: var(--texto-principal); background: var(--blanco-roto); }
    .user-avatar { width: 36px; height: 36px; border-radius: 50%; background: var(--acento); display: flex; align-items: center; justify-content: center; font-weight: 800; font-family: 'Playfair Display', serif; color: #fff; }
    .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .user-name { font-family: 'EB Garamond', serif; font-size: 0.85rem; font-weight: 600; color: var(--texto-principal); text-transform: uppercase; letter-spacing: 0.05em; margin-right: 0.5rem; }
    .badge-cart {
        background: var(--acento);
        color: var(--fondo);
        font-size: 0.7rem;
        font-weight: 600;
        font-family: 'Playfair Display', serif, serif;
        padding: 2px 6px;
        margin-left: 5px;
        border-radius: 50%;
        border: 1px solid var(--fondo);
    }
    .nav-actions { display: flex; align-items: center; gap: 1.5rem; }
    .btn-logout-nav { border: 1px solid var(--borde); background: none; color: var(--texto-secundario); padding: 0.5rem 1rem; border-radius: 40px; font-family: 'EB Garamond'; cursor: pointer; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; transition: all 0.3s; }
    .btn-logout-nav:hover { background: var(--blanco-roto); color: var(--texto-principal); border-color: var(--texto-principal); }
</style>
<nav class="navbar" x-data="{ openMobile: false }">
    <div class="navbar-inner">
        <div class="navbar-top-row">
            <div class="nav-actions">
                {{-- Usamos @auth para mostrar contenido solo a usuarios que han iniciado sesión --}}
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
                {{-- El @else aquí actúa como un @guest, mostrando el botón de acceso a los que no están logueados --}}
                @else
                    <a href="{{ route('login') }}" class="btn" style="font-size: 0.75rem; padding: 0.5rem 1rem;">ACCESO</a>
                @endauth
            </div>
            {{-- Enlace principal a la página de inicio --}}
            <a href="{{ route('inicio') }}" class="brand">
                Colchoneros<span>Shop</span>
            </a>
            <div class="nav-actions">
                {{-- Enlace al carrito de la compra --}}
                <a href="{{ route('cliente.carrito') }}" class="nav-link" style="padding: 0;">
                    CARRITO
                    @auth
                        {{-- Consultamos la base de datos para contar cuántos items tiene el usuario en su carrito --}}
                        @php $n = \App\Models\ItemCarrito::where('usuario_id', auth()->id())->count(); @endphp
                        {{-- Si hay productos (n > 0), mostramos el circulito con el número --}}
                        @if($n > 0)<span class="badge-cart" id="cart-badge">{{ $n }}</span>@endif
                    @endauth
                </a>
                @auth
                {{-- Formulario para cerrar sesión, es importante que sea un POST por seguridad --}}
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout-nav">SALIR</button>
                </form>
                @endauth
            </div>
        </div>
        {{-- Menú de navegación principal con categorías --}}
        <ul class="nav-main">
            <li class="nav-item">
                <a href="{{ route('inicio') }}" class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}">INICIO</a>
            </li>
            <span class="nav-divider">❧</span>
            <li class="nav-item">
                <a href="{{ route('productos.index', ['genero' => 'hombre']) }}" class="nav-link">HOMBRE</a>
                <div class="dropdown-menu">
                    <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'camisetas']) }}" class="dropdown-link">CAMISETAS</a>
                    <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'sudaderas']) }}" class="dropdown-link">SUDADERAS</a>
                    <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'polos']) }}" class="dropdown-link">POLOS</a>
                    <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'pantalones']) }}" class="dropdown-link">PANTALONES</a>
                    <a href="{{ route('productos.index', ['genero' => 'hombre', 'categoria' => 'abrigos']) }}" class="dropdown-link">ABRIGOS</a>
                </div>
            </li>
            <span class="nav-divider">❧</span>
            <li class="nav-item">
                <a href="{{ route('productos.index', ['genero' => 'mujer']) }}" class="nav-link">MUJER</a>
                <div class="dropdown-menu">
                    <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'camisetas']) }}" class="dropdown-link">CAMISETAS</a>
                    <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'sudaderas']) }}" class="dropdown-link">SUDADERAS</a>
                    <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'pantalones']) }}" class="dropdown-link">PANTALONES</a>
                    <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'punto']) }}" class="dropdown-link">PUNTO</a>
                    <a href="{{ route('productos.index', ['genero' => 'mujer', 'categoria' => 'abrigos']) }}" class="dropdown-link">ABRIGOS</a>
                </div>
            </li>
            @auth
                @if(auth()->user()->role === 'admin')
                    <span class="nav-divider">❧</span>
                    <li class="nav-item"><a href="{{ route('admin.panel') }}" class="nav-link {{ request()->routeIs('admin.panel') ? 'active' : '' }}">ADMIN</a></li>
                @endif
                <span class="nav-divider">❧</span>
                <li class="nav-item"><a href="{{ route('cliente.mis-compras') }}" class="nav-link">COMPRAS</a></li>
            @endauth
        </ul>
    </div>
</nav>