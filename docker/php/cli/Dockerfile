FROM php:8.3-cli

ARG UID
ARG GID

RUN apt-get update -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
&& php composer-setup.php \
&& php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

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

RUN groupadd -g $GID appgroup \
    && useradd -u $UID -g $GID -m appuser

RUN mkdir /app && chown $UID:$GID /app

USER appuser

COPY --chown=appuser:appgroup ./api /app

WORKDIR /app
