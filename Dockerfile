# ----------------------------------------
# Usa la última imagen oficial de WordPress
# ----------------------------------------
FROM wordpress:latest

# ----------------------------------------
# 1) Instala las extensiones de Postgres
# ----------------------------------------
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

# ----------------------------------------
# 2) Copia tu uploads.ini para aumentar límites de subida
# ----------------------------------------
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# ----------------------------------------
# 3) Fija el directorio de trabajo
# ----------------------------------------
WORKDIR /var/www/html

# ----------------------------------------
# 4) Prepara carpetas vacías
# ----------------------------------------
RUN mkdir -p wp-content/plugins wp-content/languages wp-content/uploads

# ----------------------------------------
# 5) Copia configuración y driver PG4WP
# ----------------------------------------
COPY --chown=www-data:www-data wp-config.php     wp-config.php
COPY --chown=www-data:www-data wp-content/db.php wp-content/db.php

# ----------------------------------------
# 6) Copia los plugins que quieres preinstalar
# ----------------------------------------
COPY --chown=www-data:www-data wp-content/plugins/pg4wp       wp-content/plugins/pg4wp
COPY --chown=www-data:www-data wp-content/plugins/pro-elements wp-content/plugins/pro-elements
COPY --chown=www-data:www-data wp-content/plugins/miplugin     wp-content/plugins/miplugin

# ----------------------------------------
# 7) Copia traducciones si las tuvieras
# ----------------------------------------
COPY --chown=www-data:www-data wp-content/languages wp-content/languages

# ----------------------------------------
# 8) Ajusta permisos finales
# ----------------------------------------
RUN chown -R www-data:www-data wp-content
