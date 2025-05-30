# ----------------------------------------
# Usa la última imagen oficial de WordPress
# ----------------------------------------
FROM wordpress:latest

# ----------------------------------------
# 1) Instala dependencias: Postgres + unzip/curl
# ----------------------------------------
RUN apt-get update \
 && apt-get install -y libpq-dev unzip curl \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

# ----------------------------------------
# 2) Copia tu uploads.ini para límites de subida
# ----------------------------------------
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# ----------------------------------------
# 3) Fija el directorio de trabajo
# ----------------------------------------
WORKDIR /var/www/html

# ----------------------------------------
# 4) Crea carpetas vacías
# ----------------------------------------
RUN mkdir -p wp-content/plugins wp-content/languages wp-content/uploads

# ----------------------------------------
# 5) Copia tu wp-config y db.php
# ----------------------------------------
COPY --chown=www-data:www-data wp-config.php     wp-config.php
COPY --chown=www-data:www-data wp-content/db.php wp-content/db.php

# ----------------------------------------
# 6) Instala Elementor Free desde wordpress.org
# ----------------------------------------
RUN curl -L https://downloads.wordpress.org/plugin/elementor.latest-stable.zip -o elementor.zip \
 && unzip elementor.zip -d wp-content/plugins/ \
 && rm elementor.zip

# ----------------------------------------
# 7) Copia tu plugin “elementor-pro” (antes pro-elements)
# ----------------------------------------
COPY --chown=www-data:www-data \
     wp-content/plugins/elementor-pro \
     wp-content/plugins/elementor-pro

# ----------------------------------------
# 8) Copia pg4wp y tu miplugin
# ----------------------------------------
COPY --chown=www-data:www-data wp-content/plugins/pg4wp   wp-content/plugins/pg4wp
COPY --chown=www-data:www-data wp-content/plugins/miplugin wp-content/plugins/miplugin

# ----------------------------------------
# 9) Copia traducciones
# ----------------------------------------
COPY --chown=www-data:www-data wp-content/languages wp-content/languages

# ----------------------------------------
# 10) Ajusta permisos finales
# ----------------------------------------
RUN chown -R www-data:www-data wp-content
