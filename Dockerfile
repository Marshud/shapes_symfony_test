# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Install necessary system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libicu-dev \
    && docker-php-ext-install intl

# Enable Apache mod_rewrite (used for routing)
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy the app files to the container
COPY . /var/www/html

# Set proper permissions for the /var/www/html folder
RUN chown -R www-data:www-data /var/www/html

# Install dependencies
RUN composer install --no-scripts --no-interaction

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
