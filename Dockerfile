FROM wordpress:latest

# 1) Copiamos la configuración de WordPress
COPY wp-config.php /usr/src/wordpress/wp-config.php

# 2) Copiamos el drop-in para PG4WP
COPY wp-content/db.php /usr/src/wordpress/wp-content/db.php

# 3) Copiamos todo el plugin pg4wp
COPY wp-content/plugins/pg4wp /usr/src/wordpress/wp-content/plugins/pg4wp

# 4) Ajustamos permisos para Apache
RUN chown www-data:www-data /usr/src/wordpress/wp-config.php \
 && chown www-data:www-data /usr/src/wordpress/wp-content/db.php \
 && chown -R www-data:www-data /usr/src/wordpress/wp-content/plugins/pg4wp
