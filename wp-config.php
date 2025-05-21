<?php
/**
 * The base configuration for WordPress
 * https://es.wordpress.org/documentacion/article/editando_wp-config-php/
 */

// Evita usar la extensión MySQL nativa
define( 'WP_USE_EXT_MYSQL', false );

/**
 * Conexión a la base de datos
 *
 * Prioriza DATABASE_URL (p. ej. "postgresql://user:pass@host:port/dbname"),
 * y si no existe, usa variables individuales.
 */
if ( getenv('DATABASE_URL') ) {
    // Parseamos DATABASE_URL
    $url = parse_url( getenv('DATABASE_URL') );

    define( 'DB_NAME',     ltrim( $url['path'], '/' ) );
    define( 'DB_USER',     $url['user'] );
    define( 'DB_PASSWORD', $url['pass'] );
    define( 'DB_HOST',     $url['host'] . ( isset($url['port']) ? ':' . $url['port'] : '' ) );
} else {
    // Variables por separado (si las tienes definidas en Environment)
    define( 'DB_NAME',     getenv('WORDPRESS_DB_NAME') );
    define( 'DB_USER',     getenv('WORDPRESS_DB_USER') );
    define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );
    define( 'DB_HOST',     getenv('WORDPRESS_DB_HOST') . ':' . getenv('WORDPRESS_DB_PORT') );
}

// Codificación de caracteres
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**#@+
 * Claves únicas de autenticación y salado.
 * Colócalas a gusto en https://api.wordpress.org/secret-key/1.1/salt/
 */
define( 'AUTH_KEY',         'pon-aquí-tu-frase-aleatoria' );
define( 'SECURE_AUTH_KEY',  'pon-aquí-tu-frase-aleatoria' );
define( 'LOGGED_IN_KEY',    'pon-aquí-tu-frase-aleatoria' );
define( 'NONCE_KEY',        'pon-aquí-tu-frase-aleatoria' );
define( 'AUTH_SALT',        'pon-aquí-tu-frase-aleatoria' );
define( 'SECURE_AUTH_SALT', 'pon-aquí-tu-frase-aleatoria' );
define( 'LOGGED_IN_SALT',   'pon-aquí-tu-frase-aleatoria' );
define( 'NONCE_SALT',       'pon-aquí-tu-frase-aleatoria' );
/**#@-*/

/**
 * Prefijo de las tablas de la base de datos
 */
$table_prefix = 'wp_';

/**
 * Modo debug
 */
define( 'WP_DEBUG',       true );
define( 'WP_DEBUG_LOG',   true );
define( 'WP_DEBUG_DISPLAY', false );

/* ¡Eso es todo, deja de editar! */

/** Ruta absoluta al directorio de WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Carga las variables de WordPress y archivos de configuración. */
require_once ABSPATH . 'wp-settings.php';
