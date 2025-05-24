# Usa la última imagen oficial de WordPress
FROM wordpress:latest

# 1) Instala las extensiones de Postgres
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pgsql pdo_pgsql \
 && rm -rf /var/lib/apt/lists/*

# 2) Copia tu uploads.ini con la nueva configuración de PHP
#    (coloca este archivo en la raíz de tu repo junto al Dockerfile)
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# 3) Fija el directorio de trabajo
WORKDIR /var/www/html

# 4) Prepara carpetas para plugins y traducciones
RUN mkdir -p wp-content/plugins wp-content/languages

# 5) Copia configuración de WordPress, el driver PG4WP, y las traducciones
COPY --chown=www-data:www-data wp-config.php              wp-config.php
COPY --chown=www-data:www-data wp-content/db.php          wp-content/db.php
COPY --chown=www-data:www-data wp-content/plugins/pg4wp   wp-content/plugins/pg4wp
COPY --chown=www-data:www-data wp-content/languages       wp-content/languages

# 6) (opcional) expón el puerto y deja el entrypoint por defecto
#    no hace falta tocar nada más: la imagen de wordpress ya arranca Apache+PHP
