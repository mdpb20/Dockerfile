<?php
/**
 * Configuración de WordPress para Postgres vía PG4WP.
 *
 * Copia este archivo en la raíz de tu repositorio y Render lo copiará a /var/www/html/wp-config.php
 */

// Deshabilita el driver MySQL interno y fuerza PG4WP
define( 'WP_USE_EXT_MYSQL', false );
define( 'DB_DRIVER',        'pgsql' );

// Credenciales de la base de datos (traídas de variables de entorno en Render)
define( 'DB_NAME',     getenv('WORDPRESS_DB_NAME') );
define( 'DB_USER',     getenv('WORDPRESS_DB_USER') );
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );
define( 'DB_HOST',     getenv('WORDPRESS_DB_HOST') . ':' . getenv('WORDPRESS_DB_PORT') );
define( 'DB_CHARSET',  'utf8' );
define( 'DB_COLLATE',  '' );

// ** Claves y sales únicas de autenticación ** //
// Genera las tuyas en: https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',         'pon-aquí-tu-auth-key' );
define( 'SECURE_AUTH_KEY',  'pon-aquí-tu-secure-auth-key' );
define( 'LOGGED_IN_KEY',    'pon-aquí-tu-logged-in-key' );
define( 'NONCE_KEY',        'pon-aquí-tu-nonce-key' );
define( 'AUTH_SALT',        'pon-aquí-tu-auth-salt' );
define( 'SECURE_AUTH_SALT', 'pon-aquí-tu-secure-auth-salt' );
define( 'LOGGED_IN_SALT',   'pon-aquí-tu-logged-in-salt' );
define( 'NONCE_SALT',       'pon-aquí-tu-nonce-salt' );

// Prefijo de las tablas de la base de datos
$table_prefix = 'wp_';

// Control de depuración
define( 'WP_DEBUG', false );

/* ¡Eso es todo, deja de editar! Feliz blogging. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';

