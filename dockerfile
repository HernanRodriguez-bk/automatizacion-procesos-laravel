FROM richarvey/nginx-php-fpm:3.1.6

# Copiar proyecto al directorio correcto
COPY . /var/www/html

# Variables necesarias
ENV SKIP_COMPOSER=0
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composeer install --no-dev --optimize-autoloader

# Crear SQLite y dar permisos
RUN touch /var/www/html/database/database.sqlite \
    && chmod -R 775 /var/www/html/database \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Dar permiso al script de inicio
RUN chmod +x /var/www/html/start.sh

EXPOSE 80

CMD ["/var/www/html/start.sh"]
