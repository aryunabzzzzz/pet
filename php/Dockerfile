FROM php:8.3-fpm

# Устанавливаем необходимые пакеты и утилиты
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    cron \
    supervisor \
    libpq-dev \
    && pecl install \
    redis \
    xdebug \
    && docker-php-ext-enable \
    redis \
    xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем расширение PDO для работы с MySQL
RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/log/php-fpm
COPY supervisor/* /etc/supervisor/conf.d/

# Add crontab file in the cron directory
ADD crontab /etc/cron.d/hello-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/hello-cron

# Apply cron job
RUN crontab /etc/cron.d/hello-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

EXPOSE 9000

WORKDIR /var/www/html

CMD /usr/bin/supervisord -c /etc/supervisor/supervisord.conf
