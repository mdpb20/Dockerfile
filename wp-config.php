<?php
// Deshabilita el driver mysql nativo
define('WP_USE_EXT_MYSQL', false);
// Le dice a WP que use PG4WP
define('DB_DRIVER', 'pgsql');

// Credenciales desde env vars
define('DB_NAME',     getenv('WORDPRESS_DB_NAME'));
define('DB_USER',     getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));

// Host y puerto por separado
define('DB_HOST',     getenv('WORDPRESS_DB_HOST'));
define('DB_PORT',     getenv('WORDPRESS_DB_PORT'));

define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

$table_prefix = 'wp_';
define('WP_DEBUG', false);

if ( ! defined('ABSPATH') ) {
  define('ABSPATH', dirname(__FILE__) . '/');
}
require_once ABSPATH . 'wp-settings.php';



