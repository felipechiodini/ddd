FROM php:8.5-fpm

# Instala dependências
RUN apt-get update && apt-get install -y && docker-php-ext-install \
    pdo \
    pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Caddy
RUN curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/gpg.key' \
    | gpg --dearmor -o /usr/share/keyrings/caddy-stable-archive-keyring.gpg \
    && curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/debian.deb.txt' \
    | tee /etc/apt/sources.list.d/caddy-stable.list \
    && apt-get update \
    && apt-get install -y caddy

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

COPY Caddyfile /etc/caddy/Caddyfile
COPY start.sh /start.sh

RUN chmod +x /start.sh

EXPOSE 80 443

CMD ["/start.sh"]