<?php
// ** Ajustes de PG4WP y Postgres ** //
define('WP_USE_EXT_MYSQL', false);

// Intentamos primero leer la URL única de la base externa
$database_url = getenv('DATABASE_URL');

if ( $database_url ) {
    // parseamos: postgresql://user:pass@host:port/dbname
    $parts = parse_url( $database_url );
    define('DB_NAME',     ltrim($parts['path'], '/') );
    define('DB_USER',     $parts['user'] );
    define('DB_PASSWORD', $parts['pass'] );
    // DB_HOST SIN puerto, y DB_PORT aparte:
    define('DB_HOST',     $parts['host'] );
    define('DB_PORT',     $parts['port'] );
} else {
    // Fallback a las 5 vars por separado
    define('DB_NAME',     getenv('WORDPRESS_DB_NAME'));
    define('DB_USER',     getenv('WORDPRESS_DB_USER'));
    define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
    define('DB_HOST',     getenv('WORDPRESS_DB_HOST'));
    define('DB_PORT',     getenv('WORDPRESS_DB_PORT'));
}

define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

/** Prefijo de tablas **/
$table_prefix = 'wp_';

/** Debug **/
define('WP_DEBUG',         true);
define('WP_DEBUG_LOG',     true);
define('WP_DEBUG_DISPLAY', false);

/* ¡Eso es todo! */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
require_once( ABSPATH . 'wp-settings.php' );

