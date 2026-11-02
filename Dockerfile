############################
# Stage 1: build frontend assets (Vite + Tailwind)
############################
FROM node:20-alpine AS node-assets

WORKDIR /app

COPY package.json package-lock.json vite.config.js tailwind.config.js ./
COPY resources ./resources

RUN npm ci && npm run build

############################
# Stage 2: PHP application
############################
FROM php:8.3-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        unzip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies first (cached unless composer files change)
COPY composer.json composer.lock .env.example ./
RUN cp .env.example .env \
    && composer install \
        --no-dev \
        --no-interaction \
        --no-scripts \
        --prefer-dist \
        --optimize-autoloader

# Copy the application code + built assets
COPY . .
COPY --from=node-assets /app/public/build ./public/build

RUN rm -f bootstrap/cache/packages.php \
    && mkdir -p storage/framework/cache/data storage/framework/sessions \
        storage/framework/views storage/logs/storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && php artisan storage:link

# Pre-compile routes/views (config is cached at runtime instead, after env vars are injected)
RUN php artisan route:cache && php artisan view:cache

COPY --chmod=755 docker/start.sh /usr/local/bin/start.sh

EXPOSE 8000

CMD ["start.sh"]
