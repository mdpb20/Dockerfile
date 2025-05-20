<?php
// ** Ajustes de PG4WP y Postgres ** //
define('WP_USE_EXT_MYSQL', false);
define('DB_DRIVER', 'pgsql');

// ** Credenciales desde variables de entorno ** //
define('DB_NAME',     getenv('WORDPRESS_DB_NAME'));
define('DB_USER',     getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST',     getenv('WORDPRESS_DB_HOST') . ':' . getenv('WORDPRESS_DB_PORT'));
define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

/**#@+
 * Prefijos de tablas de WordPress.
 */
$table_prefix = 'wp_';

/** Activa el modo de depuración de WordPress */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
require_once( ABSPATH . 'wp-settings.php' );
