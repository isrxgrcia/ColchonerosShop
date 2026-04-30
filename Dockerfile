FROM php:8.4-fpm-alpine

ARG WWWGROUP=1000
ARG NODE_VERSION=20
ARG POSTGRES_VERSION=15-alpine

WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    freetype \
    freetype-dev \
    libzip \
    libzip-dev \
    oniguruma \
    oniguruma-dev \
    zlib \
    zlib-dev \
    libssh2 \
    libssh2-dev \
    yaml \
    openjdk17 \
    cronie \
    fcgi \
    && apk del --no-cache .*
    && docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd zip intl

# Install PHP extensions
RUN docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install redis extension
RUN pecl install redis -o \
    && docker-php-ext-enable redis

# Install Node.js and npm
RUN apk add --no-cache nodejs npm

# Copy application files
COPY . /var/www/html

RUN mkdir -p \
    /var/www/html/storage/app/public \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/testing \
    /var/www/html/storage/framework/views \
    /var/www/html/bootstrap/cache \
    /var/www/html/bootstrap/providers \
    /var/www/html/storage/logs \
    /var/www/html/storage/pail

RUN chown -R www-data:www-data \
    /var/www/html \
    /var/www/html/storage/app/public \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/testing \
    /var/www/html/storage/framework/views \
    /var/www/html/bootstrap/cache \
    /var/www/html/bootstrap/providers \
    /var/www/html/storage/pail \
    /var/www/html/vendor

RUN chmod -R 775 /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/bootstrap/providers

RUN mkdir -p /var/www/html/storage/app/public/products

# Fix symlink and permissions
RUN rm -f /var/www/html/public/storage && \
    ln -s /var/www/html/storage/app/public /var/www/html/public/storage && \
    chown -R sail:sail /var/www/html/storage/app/public && \
    chmod -R 755 /var/www/html/storage/app/public

EXPOSE 80

ENTRYPOINT ["sh", "/var/www/html/docker/entrypoint.sh"]