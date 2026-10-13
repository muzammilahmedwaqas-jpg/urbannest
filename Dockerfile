# ---------------------------------------------------------------
# Stage 1: build frontend assets (Vite + Tailwind)
# ---------------------------------------------------------------
FROM node:22-alpine AS assets
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
RUN npm run build

# ---------------------------------------------------------------
# Stage 2: install PHP dependencies with Composer
# ---------------------------------------------------------------
FROM composer:2 AS vendor
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-scripts \
    --no-autoloader --prefer-dist --ignore-platform-reqs

# ---------------------------------------------------------------
# Stage 3: final runtime image (PHP-FPM + Nginx)
# ---------------------------------------------------------------
FROM php:8.3-fpm-alpine

# System packages + PHP extensions Laravel needs
RUN apk add --no-cache nginx libzip-dev oniguruma-dev icu-dev \
 && docker-php-ext-install pdo_mysql mbstring zip intl bcmath opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Application code, then dependencies and built assets from earlier stages
COPY . .
COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build

RUN composer dump-autoload --optimize --no-dev \
 && php artisan package:discover --ansi \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Nginx site config
COPY nginx.conf /etc/nginx/http.d/default.conf

EXPOSE 80

# Run PHP-FPM in the background and Nginx in the foreground
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
