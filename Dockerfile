# Usa la última imagen oficial de WordPress
FROM wordpress:latest

# 1) Instala las libs de Postgres y construye las extensiones de PHP
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# 2) Crea el folder de plugins (pg4wp) y ajusta permisos
RUN mkdir -p wp-content/plugins

# 3) Copia tu wp-config.php, el plugin PG4WP y el db.php
COPY --chown=www-data:www-data wp-config.php                         wp-config.php
COPY --chown=www-data:www-data wp-content/db.php                      wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp               wp-content/plugins/pg4wp

# 4) Copia los archivos de traducción al español
#    (asegúrate de tener en el contexto de build estos archivos)
COPY --chown=www-data:www-data wp-content/languages/es_ES.po           wp-content/languages/es_ES.po
COPY --chown=www-data:www-data wp-content/languages/es_ES.mo           wp-content/languages/es_ES.mo

# 5) Sobrescribe valores de PHP (opcionalmente, si necesitas más upload_max_filesize)
#    (coloca un .user.ini en tu contexto de build si quieres personalizar estos valores)
COPY --chown=www-data:www-data .user.ini                               /usr/local/etc/php/conf.d/uploads.ini

# Fin del Dockerfile

