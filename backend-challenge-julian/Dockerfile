# Use the official PHP image with PHP 8.1.0
FROM php:8.1.0-fpm

WORKDIR /var/www

# Install PHP extensions and dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Laravel project files to the container
COPY . /var/www

# Install Laravel dependencies
RUN composer install

# Run Laravel database migrations and seeders
RUN php artisan migrate --seed

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
