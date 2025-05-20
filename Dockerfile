FROM wordpress:latest

# Copia configuración y pg4wp en la carpeta correcta
COPY wp-config.php /var/www/html/wp-config.php
COPY wp-content/db.php /var/www/html/wp-content/db.php
COPY wp-content/plugins/pg4wp /var/www/html/wp-content/pg4wp

# Ajusta permisos
RUN chown www-data:www-data /var/www/html/wp-config.php \
 && chown www-data:www-data /var/www/html/wp-content/db.php \
 && chown -R www-data:www-data /var/www/html/wp-content/pg4wp
