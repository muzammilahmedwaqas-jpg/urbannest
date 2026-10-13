FROM php:8.4-fpm

# Install system dependencies & Nginx
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application files
COPY . /var/www

# Install Composer dependencies without running artisan scripts during build
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copy custom Nginx configuration
COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 80

# Run migrations, clear caches, start Nginx and PHP-FPM
CMD php artisan config:clear \
    && php artisan cache:clear \
    && php artisan migrate --force \
    && service nginx start \
    && php-fpm