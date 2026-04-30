#!/bin/sh

set -e

# Install composer dependencies
if [ ! -d "vendor/laravel" ]; then
    echo "Installing dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Generate app key if not set
php artisan key:generate --no-interaction

# Create storage symbolic link if not exists
if [ ! -L public/storage ]; then
    php artisan storage:link --no-interaction
fi

# Clear and cache config
php artisan config:clear
php artisan cache:clear

# Run migrations in development
php artisan migrate --no-interaction --force

# Start PHP-FPM
exec docker-php-entrypoint "$@"