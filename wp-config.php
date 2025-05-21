<?php
// ** Ajustes de PG4WP y Postgres ** //
define('WP_USE_EXT_MYSQL', false);

// Si existe DATABASE_URL, la parseamos y sobreescribimos DB_*
if (getenv('DATABASE_URL')) {
    $url = parse_url(getenv('DATABASE_URL'));

    // host
    define('DB_HOST', $url['host'] . (isset($url['port']) ? ':' . $url['port'] : ''));

    // usuario y contraseña
    define('DB_USER', $url['user']);
    define('DB_PASSWORD', $url['pass']);

    // nombre de la base (la parte de path viene con slash delante)
    define('DB_NAME', ltrim($url['path'], '/'));
} else {
    // Caída segura: si no hay DATABASE_URL, leemos las individuales
    define('DB_HOST',     getenv('WORDPRESS_DB_HOST'));
    define('DB_USER',     getenv('WORDPRESS_DB_USER'));
    define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
    define('DB_NAME',     getenv('WORDPRESS_DB_NAME'));
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

