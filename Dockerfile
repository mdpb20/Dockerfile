FROM wordpress:latest

# 1) Instala extensiones de Postgres
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# 2) Prepara plugins y traducciones
RUN mkdir -p wp-content/plugins wp-content/languages

# 3) Copia configuraciones, plugin y traducciones
COPY --chown=www-data:www-data wp-config.php              wp-config.php
COPY --chown=www-data:www-data .user.ini                  .user.ini
COPY --chown=www-data:www-data wp-content/db.php          wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp   wp-content/plugins/pg4wp
COPY --chown=www-data:www-data wp-content/languages       wp-content/languages

# 4) Entrypoint estándar de WordPress
#    (no necesitas nada más)
