FROM php:8.3-fpm

# Install dependencies and configure as needed
RUN apt-get update && apt-get install -y \
    iputils-ping \
    git \
    cron \
    zlib1g-dev \
    libzip-dev \
    procps \
    supervisor \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libc-client-dev libkrb5-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
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

# Create necessary directories
RUN mkdir -p /var/log/supervisor \
    && mkdir -p /var/log/php-fpm

# Copy supervisor configuration
COPY supervisor/* /etc/supervisor/conf.d/

# Add crontab file in the cron directory
ADD crontab /etc/cron.d/hello-cron

# Give execution rights on the cron job and apply cron job
RUN chmod 0644 /etc/cron.d/hello-cron \
    && crontab /etc/cron.d/hello-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

EXPOSE 9000

WORKDIR /var/www/html

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
