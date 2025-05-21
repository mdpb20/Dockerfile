<?php
// PG4WP: usa Postgres en vez de MySQL
define('WP_USE_EXT_MYSQL', false);

// Si existe DATABASE_URL, la parseamos:
if ( getenv('DATABASE_URL') ) {
    $url = parse_url( getenv('DATABASE_URL') );
    define('DB_NAME',     ltrim( $url['path'], '/' ) );
    define('DB_USER',     $url['user'] );
    define('DB_PASSWORD', $url['pass'] );
    define('DB_HOST',     $url['host'] );
    define('DB_PORT',     isset($url['port']) ? $url['port'] : 5432 );
} else {
    // Fallback: variables individuales
    define('DB_NAME',     getenv('WORDPRESS_DB_NAME') );
    define('DB_USER',     getenv('WORDPRESS_DB_USER') );
    define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );
    define('DB_HOST',     getenv('WORDPRESS_DB_HOST') );
    define('DB_PORT',     getenv('WORDPRESS_DB_PORT') );
}

// Codificación
define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

// Prefijo de tablas
$table_prefix = 'wp_';

// Debug
define('WP_DEBUG',         true);
define('WP_DEBUG_LOG',     true);
define('WP_DEBUG_DISPLAY', false);

/* ¡Eso es todo! */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
require_once( ABSPATH . 'wp-settings.php' );


