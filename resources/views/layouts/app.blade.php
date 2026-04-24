<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tienda DAW')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; color: #333; }
        header { background: #1a1a2e; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        header a { color: white; text-decoration: none; font-size: 1.4rem; font-weight: bold; }
        nav a { color: #ccc; margin-left: 1.5rem; text-decoration: none; }
        nav a:hover { color: white; }
        main { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        footer { text-align: center; padding: 2rem; color: #888; font-size: 0.85rem; margin-top: 4rem; border-top: 1px solid #ddd; }
    </style>
    @stack('styles')
</head>
<body>

    <header>
        <a href="{{ route('inicio') }}">🛍️ Tienda DAW</a>
        <nav>
            <a href="{{ route('inicio') }}">Inicio</a>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Nacho Robledo &amp; Israel García — DAW</p>
    </footer>

    @stack('scripts')
</body>
</html>
