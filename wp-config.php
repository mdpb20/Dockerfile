<?php
define('WP_USE_EXT_MYSQL', false);
define('DB_DRIVER', 'pgsql');

// Si hay un DATABASE_URL (opcional), úsalo para derivar credenciales
if ( getenv('DATABASE_URL') ) {
  $url = parse_url(getenv('DATABASE_URL'));
  define('DB_HOST',   $url['host'] . ':' . ($url['port'] ?? 5432) );
  define('DB_USER',   $url['user']);
  define('DB_PASSWORD', $url['pass']);
  define('DB_NAME',   ltrim($url['path'], '/'));
} else {
  // Usa tus WORDPRESS_* vars
  define('DB_HOST',      getenv('WORDPRESS_DB_HOST') . ':' . getenv('WORDPRESS_DB_PORT'));
  define('DB_USER',      getenv('WORDPRESS_DB_USER'));
  define('DB_PASSWORD',  getenv('WORDPRESS_DB_PASSWORD'));
  define('DB_NAME',      getenv('WORDPRESS_DB_NAME'));
}

define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');
$table_prefix = 'wp_';
define('WP_DEBUG', false);

if ( ! defined('ABSPATH') ) {
  define('ABSPATH', dirname(__FILE__) . '/');
}
require_once ABSPATH . 'wp-settings.php';

