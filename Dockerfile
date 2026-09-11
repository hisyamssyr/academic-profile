# Stage 1: Build Frontend Assets (Vite)
FROM node:22-alpine AS node-builder
WORKDIR /app
COPY package*.json .npmrc* ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: PHP Environment
FROM php:8.3-cli-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    curl \
    git \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    icu-dev \
    && docker-php-ext-install \
    mbstring \
    bcmath \
    gd \
    opcache \
    intl \
    sqlite3 \
    pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files (respects .dockerignore)
COPY . .

# Copy built frontend assets from node-builder stage
COPY --from=node-builder /app/public/build ./public/build

# Install PHP dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Runtime environment: app ini tanpa database, jadi jangan bergantung pada sqlite
ENV APP_ENV=production \
    APP_DEBUG=false \
    SESSION_DRIVER=cookie \
    CACHE_STORE=array \
    QUEUE_CONNECTION=sync \
    BROADCAST_CONNECTION=log \
    DB_CONNECTION=sqlite \
    LOG_CHANNEL=stderr

# Generate .env from example + APP_KEY, lalu precompile semua Blade views
RUN cp .env.example .env \
    && php artisan key:generate --force \
    && php artisan view:cache

# Ensure storage & sqlite are writable
RUN mkdir -p storage/framework/views storage/framework/cache storage/framework/sessions storage/logs \
    && chmod -R 777 storage bootstrap/cache database/database.sqlite

# Port configuration (Render uses 10000 or $PORT)
EXPOSE 10000

ENV PORT=10000

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]