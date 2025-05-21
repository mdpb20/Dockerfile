FROM wordpress:latest

WORKDIR /var/www/html

# 1) Asegúrate de que exista la carpeta plugins
RUN mkdir -p wp-content/plugins

# 2) Copia wp-config y db.php (nótese el --chown para asignar dueño)
COPY --chown=www-data:www-data wp-config.php        wp-config.php
COPY --chown=www-data:www-data wp-content/db.php     wp-content/db.php

# 3) Copia el plugin pg4wp entero con dueño www-data
COPY --chown=www-data:www-data \
     wp-content/plugins/pg4wp \
     wp-content/plugins/pg4wp

