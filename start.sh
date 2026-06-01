#!/bin/sh

php-fpm -D

exec caddy run --config /etc/caddy/Caddyfile