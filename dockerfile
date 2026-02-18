FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

# Configuración para Laravel
ENV SKIP_COMPOSER 0
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configuración de Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Permitir que Composer corra como root
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN chmod -R 777 storage bootstrap/cache

RUN touch /var/www/html/database/database.sqlite \
    && chmod -R 775 /var/www/html/database \
    && chmod -R 775 storage bootstrap/cache


EXPOSE 8080
