FROM wyveo/nginx-php-fpm:php82

ENV TZ="America/Sao_Paulo"

WORKDIR /var/www/html

COPY . .

RUN mv .deploy/default.conf /etc/nginx/conf.d/ \
    && mv .deploy/supervisord.conf /etc/

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --optimize-autoloader

RUN chown nginx:nginx . -R && chmod 755 -R . && chmod 777 -R storage
