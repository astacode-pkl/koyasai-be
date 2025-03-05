FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    nginx \
    gnupg

# Install node
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# dependencies for php 
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . .

# Install npm dependencies and build assets
RUN npm install  && \
    npm run build && \
    npm cache clean --force


RUN npm ci --only=production && npm run build
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache public
RUN chmod -R 775 /var/www/html/public/storage

# Expose port 9000 for PHP-FPM and 80 for Nginx
EXPOSE 9000 80