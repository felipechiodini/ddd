FROM php:8.5-fpm

RUN apt-get update && apt-get install -y && docker-php-ext-install \
    pdo \
    pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=caddy /usr/bin/caddy /usr/bin/caddy

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

COPY Caddyfile /etc/caddy/Caddyfile
COPY start.sh /start.sh

RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]