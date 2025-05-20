FROM wordpress:latest

# Copia tu wp-config y PG4WP al contenedor
COPY wp-config.php /var/www/html/wp-config.php
COPY wp-content/db.php /var/www/html/wp-content/db.php
COPY wp-content/plugins/pg4wp /var/www/html/wp-content/plugins/pg4wp

# Ajusta permisos
RUN chown www-data:www-data /var/www/html/wp-config.php \
 && chown www-data:www-data /var/www/html/wp-content/db.php \
 && chown -R www-data:www-data /var/www/html/wp-content/plugins/pg4wp
