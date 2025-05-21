<?php
// 1) Procesamos DATABASE_URL (en formato: postgres://user:pass@host:port/dbname)
$database_url = getenv('DATABASE_URL');
if ( ! $database_url ) {
    die('Falta la variable de entorno DATABASE_URL');
}
$parts = parse_url( $database_url );

// 2) Constants de WP
define( 'DB_NAME',     ltrim( $parts['path'], '/' ) );
define( 'DB_USER',     $parts['user'] );
define( 'DB_PASSWORD', $parts['pass'] );
define( 'DB_HOST',     $parts['host'] . ':' . ( $parts['port'] ?? 5432 ) );

// 3) Le indicamos a WordPress que use Postgres, via PG4WP
define( 'DB_DRIVER',   'pgsql' );
define( 'DB_CHARSET',  'utf8' );
define( 'DB_COLLATE',  '' );

// 4) Salting y claves únicas (puedes generar las tuyas en https://api.wordpress.org/secret-key/1.1/salt/ )
define( 'AUTH_KEY',         'pon-aquí-tu-clave' );
define( 'SECURE_AUTH_KEY',  'pon-aquí-tu-clave' );
define( 'LOGGED_IN_KEY',    'pon-aquí-tu-clave' );
define( 'NONCE_KEY',        'pon-aquí-tu-clave' );
define( 'AUTH_SALT',        'pon-aquí-tu-clave' );
define( 'SECURE_AUTH_SALT', 'pon-aquí-tu-clave' );
define( 'LOGGED_IN_SALT',   'pon-aquí-tu-clave' );
define( 'NONCE_SALT',       'pon-aquí-tu-clave' );

// 5) Prefijos y modo debug
$table_prefix = 'wp_';
define( 'WP_DEBUG', false );

// 6) Carga de PG4WP (PLUGIN DROP-IN)
if ( file_exists( __DIR__ . '/wp-content/db.php' ) ) {
    define( 'DB_DROPINS', 'wp-content/db.php' );
}

// 7) ¡El resto estándar de wp-config!
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
