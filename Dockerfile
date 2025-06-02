# ------------------------------------------------------------------
#  Usa WordPress 6.x con Apache y PHP 8.2
#  (👉 Puedes subir a php8.3-apache si lo prefieres)
# ------------------------------------------------------------------
FROM wordpress:6-php8.2-apache

# ------------------------------------------------------------------
# 1) Instala extensiones y utilidades: Postgres + unzip + curl
# ------------------------------------------------------------------
RUN apt-get update \
 && apt-get install -y libpq-dev unzip curl \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

# ------------------------------------------------------------------
# 2) Configuración de PHP (límite de subida, etc.)
# ------------------------------------------------------------------
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# ------------------------------------------------------------------
# 3) Directorio de trabajo
# ------------------------------------------------------------------
WORKDIR /var/www/html

# ------------------------------------------------------------------
# 4) Carpetas vacías necesarias
# ------------------------------------------------------------------
RUN mkdir -p wp-content/plugins wp-content/languages wp-content/uploads

# ------------------------------------------------------------------
# 5) wp-config y db.php (PG4WP)
# ------------------------------------------------------------------
COPY --chown=www-data:www-data wp-config.php     wp-config.php
COPY --chown=www-data:www-data wp-content/db.php wp-content/db.php

# ------------------------------------------------------------------
# 6) Instala Elementor Free (última versión estable)
# ------------------------------------------------------------------
RUN curl -L https://downloads.wordpress.org/plugin/elementor.latest-stable.zip -o elementor.zip \
 && unzip elementor.zip -d wp-content/plugins/ \
 && rm elementor.zip

# ------------------------------------------------------------------
# 7) Copia tu plugin «elementor-pro»
# ------------------------------------------------------------------
COPY --chown=www-data:www-data \
     wp-content/plugins/elementor-pro \
     wp-content/plugins/elementor-pro

# ------------------------------------------------------------------
# 8) Copia PG4WP y tu plugin de ejemplo
# ------------------------------------------------------------------
COPY --chown=www-data:www-data wp-content/plugins/pg4wp   wp-content/plugins/pg4wp
COPY --chown=www-data:www-data wp-content/plugins/miplugin wp-content/plugins/miplugin

# ------------------------------------------------------------------
# 9) Copia archivos de traducción (opcional)
# ------------------------------------------------------------------
COPY --chown=www-data:www-data wp-content/languages wp-content/languages

# ------------------------------------------------------------------
# 10) Permisos finales
# ------------------------------------------------------------------
RUN chown -R www-data:www-data wp-content
