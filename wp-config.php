<?php
// ** Ajusta esto si cambias el prefijo de las tablas ** //
$table_prefix = 'wp_';

// Fuerza HTTPS si estás detrás de un proxy
if (
    isset($_SERVER['HTTP_X_FORWARDED_PROTO'])
    && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'
) {
    $_SERVER['HTTPS'] = 'on';
}

// ----------------------------------------------------------------------
// PARÁMETROS DE CONEXIÓN A LA BASE DE DATOS
// ----------------------------------------------------------------------
// Si pasamos DATABASE_URL (recomendado con Docker Compose o Render)
if ( $database_url = getenv('DATABASE_URL') ) {
    $url = parse_url( $database_url );
    define( 'DB_NAME',     ltrim( $url['path'], '/' ) );
    define( 'DB_USER',     $url['user'] );
    define( 'DB_PASSWORD', $url['pass'] );
    define( 'DB_HOST',     $url['host'] . ':' . (isset($url['port']) ? $url['port'] : 5432) );
} else {
    // Fallback para entornos donde no usemos DATABASE_URL:
    // Cambia estos valores por tu configuración local si es necesario.
    define( 'DB_NAME',     'tu_basedatos' );
    define( 'DB_USER',     'tu_usuario' );
    define( 'DB_PASSWORD', 'tu_contraseña' );
    define( 'DB_HOST',     'localhost:5432' );
}

// Driver PG4WP (no suele cambiar)
if ( ! defined('DB_DRIVER') ) {
    define( 'DB_DRIVER', 'pgsql' );
}

// Charset y collate
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ----------------------------------------------------------------------
// LLAVES ÚNICAS DE AUTENTICACIÓN Y SALT
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

// Modo debug (producción = false)
define( 'WP_DEBUG', false );

// Carpeta de idiomas personalizada (para que recoja wp-content/languages)
define( 'WP_LANG_DIR', __DIR__ . '/wp-content/languages' );

// Content dir/url para PG4WP
define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/wp-content' );

// ¡No edites más allá de esto!
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
