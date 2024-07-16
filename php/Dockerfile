FROM php:8.3-fpm

# Install dependencies
RUN apt-get update \
    && apt-get install -y \
    iputils-ping \
    git \
    cron \
    zlib1g-dev \
    libzip-dev \
    procps \
    supervisor \
    iputils-ping \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libc-client-dev libkrb5-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install \
    zip \
    pdo \
    pdo_mysql \
    mysqli \
    calendar \
    bcmath \
    exif \
    opcache \
    sockets \
    && pecl install \
    redis \
    xdebug \
    && docker-php-ext-enable \
    redis \
    xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создаем пользователя и группу
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
USER www
