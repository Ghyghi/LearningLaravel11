# Use Bitnami Laravel image as base
FROM bitnami/laravel:latest

# Install system dependencies
USER root

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions using the Bitnami PHP extensions manager
RUN /opt/bitnami/php/bin/php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && /opt/bitnami/php/bin/php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && /opt/bitnami/php/bin/php -m | grep pdo_mysql || /opt/bitnami/php/bin/php -d pdo_mysql

# Set working directory
WORKDIR /app

# Copy application files to the container
COPY . .

# Install Composer dependencies
RUN /opt/bitnami/php/bin/composer install --no-interaction --prefer-dist --optimize-autoloader

# Ensure permissions are set correctly for Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Expose port 8000 for Laravel development server
EXPOSE 8000

# Run Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
