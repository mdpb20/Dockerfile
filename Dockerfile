FROM wordpress:latest

# instala pgsql...
RUN apt-get update && apt-get install -y libpq-dev \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# crea carpetas
RUN mkdir -p wp-content/plugins wp-content/languages wp-content/uploads

# copia configuraciones y sube uploads.ini
COPY --chown=www-data:www-data wp-config.php ./
COPY --chown=www-data:www-data uploads.ini /usr/local/etc/php/conf.d/uploads.ini
COPY --chown=www-data:www-data wp-content/db.php wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp wp-content/plugins/pg4wp
COPY --chown=www-data:www-data wp-content/languages wp-content/languages

# Asegura permisos para todos los contenidos
RUN chown -R www-data:www-data wp-content

# entrypoint por defecto de WP

