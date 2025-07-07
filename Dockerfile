# Use official PHP image with Apache and PHP 8.2
FROM php:8.2-apache

# Install system dependencies and PHP extensions needed by Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip exif pcntl bcmath gd

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory inside container
WORKDIR /var/www/html

# Copy your application files to the container
COPY . /var/www/html

# Set permissions for Laravel storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install PHP dependencies via Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Copy your Laravel environment file
# (Ensure you have .env in your build context or adjust as needed)
COPY .env /var/www/html/.env

# Generate application key (optional, you can do this on your host and copy .env)
RUN php artisan key:generate

# Expose port 80
EXPOSE 80

# Start Apache server (default CMD in php:apache image)
CMD ["apache2-foreground"]
