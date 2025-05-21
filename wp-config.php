<?php
/**
 * Configuración básica de WordPress + PG4WP (PostgreSQL)
 */

/** Evita el uso de MySQL nativo en WP */
define( 'WP_USE_EXT_MYSQL', false );

/** Control de logs internos de PG4WP */
define( 'PG4WP_LOG', false );

/** Nombre de la base de datos */
define( 'DB_NAME', getenv( 'WORDPRESS_DB_NAME' ) );

/** Usuario de la base de datos */
define( 'DB_USER', getenv( 'WORDPRESS_DB_USER' ) );

/** Contraseña de la base de datos */
define( 'DB_PASSWORD', getenv( 'WORDPRESS_DB_PASSWORD' ) );

/** Host y puerto de la base de datos */
define( 'DB_HOST', getenv( 'WORDPRESS_DB_HOST' ) . ':' . getenv( 'WORDPRESS_DB_PORT' ) );

/** Codificación y colación */
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/** Prefijo de tablas */
$table_prefix = 'wp_';

/** Modo depuración */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * Carga el drop-in de PG4WP (db.php debe estar en wp-content/db.php)
 * para que WordPress use el driver de PostgreSQL.
 */
if ( file_exists( __DIR__ . '/wp-content/db.php' ) ) {
    define( 'DB_DROPINS', 'wp-content/db.php' );
}

/* ¡Eso es todo! No edites más abajo. */

/** Ruta absoluta al directorio de WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Carga el entorno de WordPress. */
require_once ABSPATH . 'wp-settings.php';


