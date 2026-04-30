# 🛒 ColchonerosShop

Tienda online de camisetas y ropa desarrollada con **Laravel 12**.

## 🛠️ Tecnologías

- **Backend:** Laravel 12 (PHP 8.4+)
- **Frontend:** Blade Templates + Vite
- **Base de datos:** MySQL (Docker) + SQLite (para desarrollo local)
- **Docker:** Laravel Sail

## 📦 Requisitos previos

- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Composer](https://getcomposer.org/)

## 🚀 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/TU_USUARIO/ColchonerosShop.git
cd ColchonerosShop
```

### 2. Instalar dependencias
```bash
composer install
npm install
```

### 3. Levantar el proyecto con Docker
```bash
./vendor/bin/sail up -d
```

### 4. Generar clave de aplicación
```bash
./vendor/bin/sail artisan key:generate
```

### 5. Crear enlace simbólico para imágenes
```bash
./vendor/bin/sail artisan storage:link
```

### 6. Compilar recursos frontend
```bash
./vendor/bin/sail npm run dev
```

## 🌐 Acceso

Una vez levantado, accede a: **http://localhost**

## 📝 Comandos útiles

| Comando | Descripción |
|---------|-------------|
| `./vendor/bin/sail up -d` | Iniciar servicios Docker |
| `./vendor/bin/sail down` | Detener servicios Docker |
| `./vendor/bin/sail artisan migration:fresh --seed` | Regenerar base de datos con datos de ejemplo |
| `./vendor/bin/sail npm run dev` | Desarrollo frontend con Vite |
| `./vendor/bin/sail npm run build` | Build de producción |

## 📂 Estructura del proyecto

```
├── app/                 # Código de la aplicación
├── database/
│   ├── migrations/      # Migraciones de base de datos
│   ├── seeders/        # Seeders para datos iniciales
│   └── database.sqlite  # Base de datos SQLite (desarrollo)
├── resources/
│   ├── views/         # Vistas Blade
│   └── css/          # Estilos CSS
├── storage/
│   └── app/
│       └── public/
│           └── products/ # Imágenes de productos
├── docker/             # Configuración Docker
└── vendor/             # Dependencias de Composer
```

## 📄 Licencia

Este proyecto es para fines educativos.