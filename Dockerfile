FROM wordpress:latest

# Copia PG4WP en el plugin folder
COPY wp-content/plugins/pg4wp /var/www/html/wp-content/plugins/pg4wp
# Copia db.php para override del driver
COPY wp-content/db.php /var/www/html/wp-content/db.php

# Ajusta permisos
RUN chown -R www-data:www-data /var/www/html/wp-content/plugins/pg4wp \
    && chown www-data:www-data /var/www/html/wp-content/db.php
