<?php
// Forzar WordPress en español
define( 'WPLANG', 'es_ES' );

// ** Ajusta esto si cambias el prefijo de las tablas ** //
$table_prefix = 'wp_';

// Carga SSL/HTTPs correcto si estás detrás de un proxy
if ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}

// ----------------------------------------------------------------------
// Parámetros de conexión a la base de datos (usando DATABASE_URL)
// ----------------------------------------------------------------------
if ( getenv('DATABASE_URL') ) {
    $url = parse_url( getenv('DATABASE_URL') );
    define( 'DB_NAME',     ltrim( $url['path'], '/' ) );
    define( 'DB_USER',     $url['user'] );
    define( 'DB_PASSWORD', $url['pass'] );
    define( 'DB_HOST',     $url['host'] . ':' . (isset($url['port']) ? $url['port'] : 5432) );
} else {
    // Valores de reserva (local o manual)
    define( 'DB_NAME',     'tu_basedatos' );
    define( 'DB_USER',     'tu_usuario' );
    define( 'DB_PASSWORD', 'tu_contraseña' );
    define( 'DB_HOST',     'localhost:5432' );
}

// Esta constante le indica a PG4WP que use Postgres
if ( ! defined('DB_DRIVER') ) {
    define( 'DB_DRIVER', 'pgsql' );
}

// Charset y collate
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ----------------------------------------------------------------------
// Llaves únicas de autenticación y sales.
// Genera nuevas en https://api.wordpress.org/secret-key/1.1/salt/
// ----------------------------------------------------------------------
define( 'AUTH_KEY',         'pon-aquí-tu-frase-aleatoria' );
define( 'SECURE_AUTH_KEY',  'pon-aquí-tu-frase-aleatoria' );
define( 'LOGGED_IN_KEY',    'pon-aquí-tu-frase-aleatoria' );
define( 'NONCE_KEY',        'pon-aquí-tu-frase-aleatoria' );
define( 'AUTH_SALT',        'pon-aquí-tu-frase-aleatoria' );
define( 'SECURE_AUTH_SALT', 'pon-aquí-tu-frase-aleatoria' );
define( 'LOGGED_IN_SALT',   'pon-aquí-tu-frase-aleatoria' );
define( 'NONCE_SALT',       'pon-aquí-tu-frase-aleatoria' );

// Debug (prod = false)
define( 'WP_DEBUG', false );

// Carga la capa de abstracción de BD de PG4WP
define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

// ** ¡Eso es todo, deja de editar! Feliz blogging. ** //
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';

