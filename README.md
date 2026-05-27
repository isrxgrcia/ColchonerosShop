# 🛍️ COLCHONEROS — Tienda Online

Tienda online de ropa y complementos desarrollada con Laravel 12. Catálogo, carrito, pedidos y panel de administración.

## 🚀 Tecnologías

| Capa | Tecnología |
|---|---|
| Backend | PHP 8.2+, Laravel 12 |
| Base de datos | SQLite (no necesita MySQL/Postgres) |
| Frontend | Blade + Tailwind CSS 4 + Vite |
| JavaScript | Vanilla (sin framework) |
| Contenedores | Docker con Laravel Sail (PHP 8.5, Ubuntu, Node 24) |

## ✨ Funcionalidades

### Público (sin login)
- Página de inicio con productos destacados por género
- Catálogo completo con filtros por género (`hombre`/`mujer`) y categoría
- Ficha de detalle de producto con imágenes y selección de talla

### Cliente (requiere registro/login)
- Novedades: últimos productos añadidos
- Carrito de compras: añadir/eliminar productos por talla
- Código de descuento (10% de descuento vía sesión)
- Pasarela de pago y finalización de pedido
- Historial de pedidos (`mis-compras`)
- Perfil de usuario con foto

### Administrador
- Panel principal con resumen
- Gestión de pedidos: cambiar estado (pendiente/enviado/entregado/cancelado)
- Gestión de stock: actualizar cantidades por talla
- Listado de usuarios registrados

## 📦 Instalación

### Requisitos

| Recurso | Versión |
|---|---|
| PHP | 8.2 o superior |
| Composer | 2.x |
| Node.js | 20 o superior |
| npm | 9+ |
| Docker (opcional) | 24+ con Docker Compose |

---

### Arranque rápido (Linux/Mac)

```bash
# 1. Clonar y entrar
git clone <repo> && cd Nacho_Israel_DAW_Tienda

# 2. Usa el script setup (instala dependencias, .env, key, migra BD, compila assets)
composer setup

# 3. Crea el enlace para las imágenes de productos (OBLIGATORIO)
php artisan storage:link

# 4. Arrancar servidor de desarrollo
php artisan serve
# http://localhost:8000
```

Si lo prefieres separado:
```bash
composer install --ignore-platform-req=ext-iconv
cp .env.example .env
php artisan key:generate
php artisan migrate --seed   # crea admin y 154 productos
php artisan storage:link
npm install && npm run build
php artisan serve
```



---

### Arranque rápido con Docker

```bash
git clone <repo> && cd Nacho_Israel_DAW_Tienda
cp .env.example .env
php artisan key:generate
docker compose up -d
docker compose exec laravel.test php artisan migrate --seed
docker compose exec laravel.test php artisan storage:link
# http://localhost
```

---

### Windows (XAMPP / WSL)

**Con XAMPP:**
```bash
# Clonar dentro de C:\xampp\htdocs\
git clone <repo>
cd Nacho_Israel_DAW_Tienda
composer install --ignore-platform-req=ext-iconv
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install && npm run build
php artisan serve
# http://localhost:8000
```

**Con WSL:** seguir los pasos de Linux.

---

## 🔐 Credenciales por defecto

| Rol | Email | Contraseña |
|---|---|---|
| Administrador | admin@tienda.test | password |
| Cliente | Registrarse en `/registro` | (la que elijas) |

## 🗂️ Estructura del proyecto

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/AdminController.php    # Panel, pedidos, stock, usuarios
│   │   │   ├── Auth/AuthController.php      # Login/registro/logout
│   │   │   ├── Cliente/ClienteController.php # Novedades, carrito, perfil
│   │   │   ├── InicioController.php         # Página principal
│   │   │   ├── PedidoController.php         # Pasarela de pago
│   │   │   └── ProductoController.php       # Catálogo y detalle
│   │   └── Middleware/
│   │       └── EsAdmin.php                  # role === 'admin'
│   ├── Models/
│   │   ├── Product.php                      # SoftDeletes
│   │   ├── User.php                         # role (admin|cliente), SoftDeletes
│   │   ├── Category.php                     # name, gender
│   │   ├── Inventory.php                    # product_id, size, stock
│   │   ├── Order.php / OrderItem.php        # SoftDeletes
│   │   └── ItemCarrito.php                  # Carrito en BD
│   └── Services/
│       └── PedidoService.php                # Lógica transaccional de pedidos
├── database/
│   ├── migrations/                          # 9 migraciones
│   ├── seeders/
│   │   ├── DatabaseSeeder.php               # Crea admin + llama WebDataSeeder
│   │   └── WebDataSeeder.php                # Crea categorías, productos e inventario
│   └── database.sqlite                      # BD (ya incluida con datos)
├── resources/views/
│   ├── auth/                                 # login, registro
│   ├── admin/                                # panel, pedidos, stock, usuarios
│   ├── cliente/                              # carrito, mis-compras, cuenta
│   ├── tienda/                               # inicio, catalogo, detalle, pasarela
│   ├── layouts/app.blade.php                 # Layout principal
│   └── components/                           # navbar, footer, product-card, etc.
├── routes/web.php                           # Todas las rutas web
├── compose.yaml                             # Docker Compose (Sail 8.5)
├── storage/app/public/products/             # Imágenes de productos (~328 archivos)
└── AGENTS.md                                # Instrucciones para OpenCode
```

## 🌐 Rutas principales

| Método | URI | Acceso |
|---|---|---|
| GET | `/` | Público |
| GET | `/catalogo/{genero?}/{categoria?}` | Público |
| GET | `/producto/{id}` | Público |
| GET/POST | `/login` / `/registro` | Invitados |
| POST | `/logout` | Authenticado |
| GET/POST | `/tienda/*` | Cliente (auth) |
| GET/PATCH | `/admin/*` | Administrador (auth + es_admin) |

## 🧪 Tests

```bash
composer test
# o: php artisan test
# Usa SQLite :memory:, suites Unit y Feature
```

## 🖼️ Imágenes de productos

Las imágenes se almacenan en `storage/app/public/products/` y se sirven vía el enlace simbólico `public/storage` → `storage/app/public`.

**IMPORTANTE:** Si las imágenes no se ven, ejecuta:
```bash
php artisan storage:link
```

Cada producto puede tener varias imágenes:
- `camiseta1.png` → imagen principal
- `camiseta1_2.png` → imagen secundaria/variante

## 🐳 Comandos Docker útiles

```bash
# Iniciar contenedores
docker compose up -d

# Detener
docker compose down

# Ver logs
docker compose logs -f

# Ejecutar comandos dentro del contenedor
docker compose exec laravel.test php artisan migrate
docker compose exec laravel.test php artisan tinker
docker compose exec laravel.test npm run dev
```

## 📝 Notas para desarrolladores

- El carrito se guarda en base de datos (modelo `ItemCarrito`), no en sesión.
- Los descuentos se aplican vía sesión: `session('codigo_descuento')` = 10% off.
- Los pedidos se procesan dentro de una transacción de BD con bloqueo de filas (`lockForUpdate`).
- Tailwind CSS 4 se configura desde `vite.config.js` (sin `tailwind.config.js`).
- No hay framework JS ni librería de UI externa.
- Hay un comando `composer dev` que lanza artisan serve + queue:listen + logs + vite en paralelo (usando `concurrently`).
