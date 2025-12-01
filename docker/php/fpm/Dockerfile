FROM php:8.3-fpm

WORKDIR /app
RUN apt-get update -y

# Install required dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --chown=appuser:appgroup ./api /app

WORKDIR /app

