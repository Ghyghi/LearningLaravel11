FROM php:8.3-apache

# Install system dependencies, Apache rewrite module, and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo pdo_mysql exif

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Enable PHP's exif extension
RUN docker-php-ext-enable exif

# Set Apache DocumentRoot to /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy the application code into the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Configure Git to treat this directory as safe
RUN git config --global --add safe.directory /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Verify Composer installation
RUN composer --version

# Set permissions for /var/www/html to ensure www-data can access it
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Remove existing vendor directory and composer.lock file
RUN rm -rf vendor composer.lock

# Allow Composer to run as a superuser and install dependencies with no interaction
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install -vvv --no-interaction --prefer-dist --optimize-autoloader

# Final permissions
RUN chown -R www-data:www-data /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
