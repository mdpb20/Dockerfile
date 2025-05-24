FROM wordpress:latest

# 1) Instala curl, libs de Postgres y construye extensiones PHP
RUN apt-get update \
 && apt-get install -y libpq-dev curl \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# 2) Crea carpeta de plugins y de idiomas
RUN mkdir -p wp-content/plugins \
 && mkdir -p wp-content/languages

# 3) Copia tu wp-config.php, db.php y el plugin PG4WP
COPY --chown=www-data:www-data wp-config.php               wp-config.php
COPY --chown=www-data:www-data wp-content/db.php            wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp     wp-content/plugins/pg4wp

# 4) Descarga la traducción al español de WordPress core
RUN curl -fSL https://downloads.wordpress.org/translation/core/latest/es_ES.mo \
      -o wp-content/languages/es_ES.mo \
 && curl -fSL https://downloads.wordpress.org/translation/core/latest/es_ES.po \
      -o wp-content/languages/es_ES.po

# 5) (Opcional) Copia tu configuración PHP custom, p.ej. upload limits
#    Si no lo necesitas, puedes eliminar esta línea.
COPY --chown=www-data:www-data .user.ini /usr/local/etc/php/conf.d/uploads.ini

# 6) ¡Listo!


