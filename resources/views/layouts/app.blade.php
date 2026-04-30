<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Título que sale en la pestaña del navegador --}}
    <title>@yield('titulo', 'COLCHONEROS SHOP')</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">


    <style>
        
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --fondo: #F5EEDC; 
            --texto-principal: #3E2723; 
            --texto-secundario: #5D4037; 
            --acento: #4A0E0E; 
            --acento-secundario: #1B3022; 
            --bronce: #A67C52; 
            --borde: #D0C5B0; 
            --blanco-roto: #FAF6ED;
        }

        .main-header {
            width: 100%;
            background-color: var(--fondo);
            background-image: url('{{ asset('images/pattern_paper_bg.png') }}');
            border-bottom: 3px double var(--borde);
            position: relative;
            z-index: 1000;
        }

        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
        }

        body {
            background-color: var(--fondo);
            background-image: url('{{ asset('images/pattern_paper_bg.png') }}');
            background-attachment: fixed;
            background-size: 800px auto;
            color: var(--texto-principal);
            font-family: 'EB Garamond', serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            cursor: none; 
            position: relative;
        }

        .cursor-dot {
            width: 8px;
            height: 8px;
            background: var(--bronce);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 999999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
        }
        .cursor-dot-outline {
            width: 30px;
            height: 30px;
            border: 1px solid var(--bronce);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 999999;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease, width 0.3s, height 0.3s;
            opacity: 0.5;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.04;
            mix-blend-mode: overlay;
        }

        .scanlines::before {
            content: " ";
            display: block;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.05) 50%), 
                        linear-gradient(90deg, rgba(255, 0, 0, 0.02), rgba(0, 255, 0, 0.01), rgba(0, 0, 255, 0.02));
            z-index: 2;
            background-size: 100% 3px, 3px 100%;
            pointer-events: none;
            animation: scanline 10s linear infinite;
        }
        @keyframes scanline { 0% { background-position: 0 0; } 100% { background-position: 0 100%; } }

        @keyframes typewriter { from { width: 0; } to { width: 100%; } }
        @keyframes blink { from, to { border-color: transparent; } 50% { border-color: var(--texto-principal); } }
        @keyframes pulse-slow { 0%, 100% { opacity: 0.03; } 50% { opacity: 0.15; } }
        @keyframes flicker {
            0% { opacity: 0.9; }
            5% { opacity: 0.5; }
            10% { opacity: 0.9; }
            15% { opacity: 1; }
            20% { opacity: 0.8; }
            25% { opacity: 0.9; }
            100% { opacity: 1; }
        }
        @keyframes neon-flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { color: #1b4d3e; text-shadow: 0 0 5px #1b4d3e; }
            20%, 22%, 24%, 55% { color: #14362b; text-shadow: none; }
        }

        .cursor-dot {
            position: fixed;
            width: 8px;
            height: 8px;
            background: var(--blanco);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999999;
            transform: translate(-50%, -50%);
            transition: transform 0.04s linear;
        }
        .cursor-ring {
            position: fixed;
            width: 32px;
            height: 32px;
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999998;
            transform: translate(-50%, -50%);
            transition: all 0.15s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .container {
            width: 95%;
            max-width: 1800px;
            margin: 0 auto;
            flex: 1;
            padding: 0 1rem;
        }

        main { flex-grow: 1; }

        
        .title-serif {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 900;
            letter-spacing: -0.01em;
            color: var(--texto-principal);
        }
        .title-slab {
            font-family: 'Alfa Slab One', serif;
            font-weight: 400;
            color: var(--acento);
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }
        .title-script {
            font-family: 'Playfair Display', serif; 
            font-style: italic;
            font-weight: 900;
            font-size: 3rem;
            color: var(--acento);
            letter-spacing: -0.02em;
        }
        .title-section-vintage {
            font-family: 'EB Garamond', serif;
            font-weight: 700;
            font-variant: small-caps;
            font-size: 1.5rem;
            letter-spacing: 0.3em;
            color: var(--acento);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            width: 100%;
        }
        .title-section-vintage::before, .title-section-vintage::after {
            content: '';
            height: 4px;
            flex-grow: 1;
            background-image: radial-gradient(circle, var(--bronce) 1.5px, transparent 1.5px);
            background-size: 10px 10px; 
            opacity: 0.5;
        }

        
        .btn, .btn-accent, .btn-primary {
            display: inline-block;
            font-family: 'EB Garamond', serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            text-decoration: none;
            padding: 0.65rem 1.75rem;
            border: 1px solid var(--texto-principal);
            border-radius: 40px; 
            color: var(--texto-principal);
            background: transparent;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.05);
        }
        .btn:hover { background: var(--blanco-roto); }
        .btn-accent, .btn-primary { 
            background: var(--acento); 
            border-color: var(--acento); 
            color: var(--fondo); 
        }
        .btn-accent:hover, .btn-primary:hover { 
            background: var(--acento-hover); 
            border-color: var(--acento-hover); 
        }
        .btn[disabled], button[disabled] { opacity: 0.4; pointer-events: none; }

        
        .form-control, select, input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            background: var(--blanco-roto);
            border: 1px solid var(--borde);
            color: var(--texto-principal);
            padding: 0.75rem 1rem;
            font-family: 'EB Garamond', serif;
            font-size: 1rem;
            width: 100%;
            outline: none;
            transition: border-color 0.3s;
            border-radius: 2px;
        }
        .form-control:focus, select:focus, input:focus {
            border-color: var(--acento);
            background: var(--fondo);
        }
        select option { background: var(--blanco-roto); }

        
        .toast {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: var(--blanco-roto);
            color: var(--texto-principal);
            padding: 1.25rem 2rem;
            border: 1px solid var(--borde);
            border-left: 6px solid var(--acento);
            font-family: 'EB Garamond', serif;
            font-variant: small-caps;
            font-size: 1.1rem;
            transform: translateX(120%);
            transition: transform 0.6s cubic-bezier(0.19, 1, 0.22, 1);
            z-index: 999999;
            box-shadow: 4px 4px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
            border-radius: 3px;
        }
        .toast.show { transform: translateX(0); }
        .toast.error { border-left-color: var(--acento); color: var(--acento); }
        .toast-icon { font-size: 1.2rem; }

        
        .border-top    { border-top: 1px solid var(--borde); }
        .border-bottom { border-bottom: 1px solid var(--borde); }
        .text-muted    { color: var(--texto-secundario); }
        .text-rojo     { color: #8b0000; }
        .uppercase     { text-transform: uppercase; }
        .padding-section { padding: 4rem 0; }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .pagination { list-style: none; display: flex; gap: 0.5rem; justify-content: center; margin-top: 2rem; }
        .page-item { border: 1px solid var(--borde); background: var(--blanco-roto); border-radius: 50%; overflow: hidden; }
        .page-link { 
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            font-family: 'Playfair Display', serif; 
            font-size: 1rem;
            color: var(--texto-principal); 
            text-decoration: none; 
            transition: all 0.3s;
        }
        .page-link:hover { background: var(--borde); }
        .page-item.active .page-link { background: var(--acento); color: var(--fondo); }
        .page-item.disabled .page-link { color: var(--borde); cursor: not-allowed; }

        [x-cloak] { display: none !important; }
    </style>

    @stack('styles')
</head>


<body>

    


    
    {{-- Incluimos la barra de navegación --}}
    @include('components.navbar')

    
    <main class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
        {{-- Aquí se mete el contenido de cada página --}}
        @yield('contenido')
    </main>

    
    {{-- El pie de página --}}
    @include('components.footer')

    
    
    <div class="cursor-dot"></div>
    <div class="cursor-dot-outline"></div>

    <script>
        const dot = document.querySelector('.cursor-dot');
        const outline = document.querySelector('.cursor-dot-outline');
        window.addEventListener('mousemove', (e) => {
            dot.style.left = e.clientX + 'px';
            dot.style.top = e.clientY + 'px';
            outline.style.left = e.clientX + 'px';
            outline.style.top = e.clientY + 'px';
        });
        document.querySelectorAll('a, button').forEach(el => {
            el.addEventListener('mouseenter', () => { outline.style.width = '50px'; outline.style.height = '50px'; });
            el.addEventListener('mouseleave', () => { outline.style.width = '30px'; outline.style.height = '30px'; });
        });
    </script>

    <div id="toast" class="toast">
        <span class="toast-icon"></span>
        <span class="toast-text">MENSAJE</span>
    </div>

    
    <audio id="click-sound" src="https://assets.mixkit.co/active_storage/sfx/2568/2568-preview.mp3"></audio>
    <audio id="slide-sound" src="https://assets.mixkit.co/active_storage/sfx/2571/2571-preview.mp3"></audio>

    <script>
        function getConfiguracionPeticion(metodo, cuerpo = null) {
            const token = document.querySelector('meta[name="csrf-token"]').content;
            const headers = { 'Accept': 'application/json', 'X-CSRF-TOKEN': token };
            const config  = { method: metodo, headers };
            if (cuerpo) config.body = cuerpo;
            return config;
        }

        function mostrarNotificacion(mensaje, tipo = 'success') {
            const toast = document.getElementById('toast');
            const icon = toast.querySelector('.toast-icon');
            const text = toast.querySelector('.toast-text');
            
            text.innerText = mensaje.toUpperCase();
            icon.innerText = tipo === 'success' ? '✓' : '✕';
            
            toast.className = 'toast' + (tipo === 'error' ? ' error' : '');
            toast.classList.add('show');
            
            setTimeout(() => toast.classList.remove('show'), 4000);
        }

        async function peticionAgregarCarrito(productoId) {
            const form = document.getElementById(`form-${productoId}`);
            if (!form) return;
            
            const formData = new FormData(form);

            if (!formData.get('talla')) {
                mostrarNotificacion('SELECCIONA UNA TALLA', 'error');
                return;
            }

            try {
                const url = '{{ route("cliente.carrito.agregar") }}';
                const res = await fetch(url, getConfiguracionPeticion('POST', formData));
                const data = await res.json();

                if (!res.ok) throw new Error(data.error || data.razon_concreta || 'ERROR AL AÑADIR');

                mostrarNotificacion(data.notificacion || 'AÑADIDO AL CARRITO');
                

                
                const cartBadge = document.getElementById('cart-badge');
                if (cartBadge) {
                    cartBadge.innerText = data.total_items;
                    cartBadge.style.display = 'inline-block';
                } else if (data.total_items > 0) {
                    location.reload(); 
                }
            } catch (err) {
                mostrarNotificacion(err.message, 'error');
            }
        }

        document.querySelectorAll('a, button, .modulo-link, .btn-save-stock').forEach(el => {
            el.addEventListener('click', () => {
                const snd = document.getElementById('click-sound');
                if (snd) { snd.currentTime = 0; snd.play(); }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.05, rootMargin: '0px 0px -50px 0px' }); 

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });

        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroBg = document.querySelector('.hero-bg');
            const heroShield = document.querySelector('.hero-shield-bg');
            if (heroBg) heroBg.style.transform = `translateY(${scrolled * 0.4}px)`;
            if (heroShield) heroShield.style.transform = `translateY(${scrolled * -0.2}px)`;
        });
    </script>

    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
</body>
</html>
