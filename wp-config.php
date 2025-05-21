<?php
define('WP_USE_EXT_MYSQL', false);   // fuerza PostgreSQL

// Usamos directamente DATABASE_URL que Render inyecta
putenv('WORDPRESS_DB_HOST=' . parse_url(getenv('DATABASE_URL'), PHP_URL_HOST));
putenv('WORDPRESS_DB_PORT=' . parse_url(getenv('DATABASE_URL'), PHP_URL_PORT));
putenv('WORDPRESS_DB_USER=' . parse_url(getenv('DATABASE_URL'), PHP_URL_USER));
putenv('WORDPRESS_DB_PASSWORD=' . parse_url(getenv('DATABASE_URL'), PHP_URL_PASS));
putenv('WORDPRESS_DB_NAME=' . ltrim(parse_url(getenv('DATABASE_URL'), PHP_URL_PATH), '/'));

// Wordpress espera estas constantes:
define('DB_NAME',     getenv('WORDPRESS_DB_NAME'));
define('DB_USER',     getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST',     getenv('WORDPRESS_DB_HOST') . ':' . getenv('WORDPRESS_DB_PORT'));
define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

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
