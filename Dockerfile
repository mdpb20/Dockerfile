# Dockerfile
FROM wordpress:latest

# 1) Extensiones de Postgres + curl + unzip
RUN apt-get update \
 && apt-get install -y libpq-dev curl unzip \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# 2) Carpeta de plugins y de idiomas
RUN mkdir -p wp-content/plugins \
 && mkdir -p wp-content/languages

# 3) Copia configuración y plugin PG4WP
COPY --chown=www-data:www-data wp-config.php           wp-config.php
COPY --chown=www-data:www-data wp-content/db.php        wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp wp-content/plugins/pg4wp

# 4) Descarga y descompresión del paquete de español
RUN curl -fSL https://downloads.wordpress.org/translation/core/latest/es_ES.zip \
      -o es_ES.zip \
 && unzip es_ES.zip -d wp-content/languages \
 && rm es_ES.zip



