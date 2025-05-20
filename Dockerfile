FROM wordpress:latest

# 1) Copia tu wp-config.php y el override de db.php directamente en la fuente de WP
COPY wp-config.php                             /usr/src/wordpress/wp-config.php
COPY wp-content/db.php                         /usr/src/wordpress/wp-content/db.php

# 2) Copia el plugin PG4WP dentro de la fuente de WP
COPY wp-content/plugins/pg4wp                  /usr/src/wordpress/wp-content/plugins/pg4wp

# 3) Ajusta permisos
RUN chown www-data:www-data /usr/src/wordpress/wp-config.php \
 && chown www-data:www-data /usr/src/wordpress/wp-content/db.php \
 && chown -R www-data:www-data /usr/src/wordpress/wp-content/plugins/pg4wp
