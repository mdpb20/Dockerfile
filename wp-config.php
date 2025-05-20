<?php
// Deshabilita el driver MySQL nativo
define('WP_USE_EXT_MYSQL', false);

// Le dices a WP que use PG4WP
define('DB_DRIVER', 'pgsql');

// Las credenciales y el host/puerto los toma de las env vars de Render
define('DB_NAME',     getenv('WORDPRESS_DB_NAME'));
define('DB_USER',     getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));

// host y puerto por separado
define('DB_HOST',     getenv('WORDPRESS_DB_HOST'));
define('DB_PORT',     getenv('WORDPRESS_DB_PORT'));

// Charset y collate estándar
define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

// Prefijo de tablas
$table_prefix = 'wp_';

// Debug de WP
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
require_once( ABSPATH . 'wp-settings.php' );


