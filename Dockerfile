FROM wordpress:latest

# 1) Instala las libs de Postgres y construye las extensiones de PHP
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# 2) Crea el folder de plugins (pg4wp) y ajusta permisos
RUN mkdir -p wp-content/plugins

# 3) Copia tu wp-config y el plugin pg4wp
COPY --chown=www-data:www-data wp-config.php        wp-config.php
COPY --chown=www-data:www-data wp-content/db.php     wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp  wp-content/plugins/pg4wp
