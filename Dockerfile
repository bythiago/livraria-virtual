FROM php:8.3-alpine

RUN apk add --no-cache oniguruma-dev \
    && docker-php-ext-install mbstring pcntl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN adduser -D -u 1000 app

WORKDIR /var/www/html

COPY . .

RUN mv frankenphp /usr/local/bin/frankenphp \
    && chmod +x /usr/local/bin/frankenphp

RUN chown -R app:app /var/www/html \
    && composer install --no-interaction --prefer-dist --optimize-autoloader \
    && chmod +x docker/entrypoint.sh

USER app

ENTRYPOINT ["/bin/sh", "docker/entrypoint.sh"]

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=frankenphp", "--host=0.0.0.0", "--port=8000"]
