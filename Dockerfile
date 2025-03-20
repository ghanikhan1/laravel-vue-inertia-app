FROM php:8.2-fpm

# Set working directory inside container
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    pkg-config \
    gnupg \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js 20 instead of 18
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs


# ✅ Expose Vite port for development
EXPOSE 5174

# Copy all project files into container
COPY . .

# Install PHP dependencies
RUN composer install

# Install Node.js dependencies
RUN npm install

# Fix permissions
RUN chmod -R 777 storage bootstrap/cache

# Default command
CMD ["php-fpm"]
