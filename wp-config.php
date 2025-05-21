<?php
/**
 * Ajustes de PG4WP y Postgres
 */
define( 'WP_USE_EXT_MYSQL', false );   // Usar Postgres en lugar de MySQL
define( 'PG4WP_LOG', false );          // Desactiva el logging interno de PG4WP

/**
 * Credenciales desde variables de entorno
 */
define( 'DB_NAME',     getenv( 'WORDPRESS_DB_NAME' ) );
define( 'DB_USER',     getenv( 'WORDPRESS_DB_USER' ) );
define( 'DB_PASSWORD', getenv( 'WORDPRESS_DB_PASSWORD' ) );
define( 'DB_HOST',     getenv( 'WORDPRESS_DB_HOST' ) );
define( 'DB_PORT',     getenv( 'WORDPRESS_DB_PORT' ) );
define( 'DB_CHARSET',  'utf8' );
define( 'DB_COLLATE',  '' );

/**
 * Prefijo de las tablas de la base de datos
 */
$table_prefix = 'wp_';

/**
 * Modo debug
 */
define( 'WP_DEBUG',         true );
define( 'WP_DEBUG_LOG',     true );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * Carga del drop-in de PG4WP
 * (debe existir wp-content/db.php que apunta al core de PG4WP)
 */
if ( file_exists( __DIR__ . '/wp-content/db.php' ) ) {
    // Esto le indica a WP que use nuestro driver de Postgres
    define( 'DB_DROPINS', 'wp-content/db.php' );
}

/* ¡Eso es todo, deja de editar aquí! */

/** Directorio absoluto de WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Carga los ajustes de WordPress y arranca. */
require_once ABSPATH . 'wp-settings.php';

