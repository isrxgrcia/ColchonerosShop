# 🛍️ COLCHONEROS — Tienda Online

Tienda online de ropa y complementos desarrollada con Laravel 12. Proyecto original para Android (TFG) adaptado a web con catálogo, carrito, pedidos y panel de administración.

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

### 🐧 Linux

#### Opción A: Con Docker (recomendado)

```bash
# 1. Clonar y entrar
git clone <repo> && cd Nacho_Israel_DAW_Tienda

# 2. Configurar .env
cp .env.example .env
php artisan key:generate

# 3. Añadir variables para Docker al .env
echo "WWWUSER=1000" >> .env
echo "WWWGROUP=1000" >> .env

# 4. Levantar contenedor
docker compose up -d

# 5. Migrar BD y crear datos de prueba
docker compose exec laravel.test php artisan migrate --seed

# 6. Crear enlace para imágenes
docker compose exec laravel.test php artisan storage:link

# 7. ¡Abrir en el navegador!
# http://localhost
```

#### Opción B: Local (sin Docker)

```bash
# 1. Clonar y entrar
git clone <repo> && cd Nacho_Israel_DAW_Tienda

# 2. Dependencias PHP (si falla ext-iconv)
composer install --ignore-platform-req=ext-iconv

# 3. Configurar .env y clave
cp .env.example .env
php artisan key:generate

# 4. Base de datos y datos de prueba
php artisan migrate --seed

# 5. Enlace para imágenes de productos
php artisan storage:link

# 6. Dependencias frontend y compilar
npm install
npm run build

# 7. Servidor de desarrollo
php artisan serve
# http://localhost:8000
```

---

### 🪟 Windows

#### Opción A: Con Docker Desktop

```bash
# 1. Clonar y entrar
git clone <repo>
cd Nacho_Israel_DAW_Tienda

# 2. Copiar .env y generar key
copy .env.example .env
php artisan key:generate

# 3. Añadir variables Docker al .env
echo WWWUSER=1000>> .env
echo WWWGROUP=1000>> .env

# 4. Levantar contenedor
docker compose up -d

# 5. Migrar BD y seed
docker compose exec laravel.test php artisan migrate --seed

# 6. Enlace para imágenes
docker compose exec laravel.test php artisan storage:link

# 7. Abrir en el navegador
# http://localhost
```

#### Opción B: Con XAMPP / WSL

**Con XAMPP:**
```bash
# 1. Instalar PHP 8.2+, Composer, Node.js
# 2. Clonar dentro de C:\xampp\htdocs\
git clone <repo>
cd Nacho_Israel_DAW_Tienda

# 3. Dependencias
composer install --ignore-platform-req=ext-iconv
copy .env.example .env
php artisan key:generate

# 4. Base de datos
php artisan migrate --seed
php artisan storage:link

# 5. Frontend
npm install
npm run build

# 6. Servidor
php artisan serve
# http://localhost:8000
```

**Con WSL (Ubuntu en Windows):**
```bash
# Seguir los pasos de Linux (Opción B: Local)
# El proyecto funciona igual que en Linux nativo
```

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
│   │   ├── DatabaseSeeder.php               # Crea admin + llama AndroidDataSeeder
│   │   └── AndroidDataSeeder.php            # Importa JSON de proyecto Android
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
├── storage/app/public/products/             # Imágenes de productos (~370 archivos)
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

## 📱 Datos desde Android

Los datos de productos proceden de un proyecto Android externo (`../tfg_tienda/extracted_data.json`). Si ese archivo no está presente, el seeder `AndroidDataSeeder` muestra un aviso y continúa sin productos. En ese caso, la base de datos incluida (`database.sqlite`) ya contiene 154 productos, categorías e inventario.

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
