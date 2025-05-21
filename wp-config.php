<?php
/**
 * Configuración básica de WordPress + PG4WP (PostgreSQL)
 */

// Para que WordPress no intente cargar la extensión MySQL nativa
define( 'WP_USE_EXT_MYSQL', false );

// Desactivar logs internos de PG4WP (se usa más abajo)
define( 'PG4WP_LOG', false );

/** Nombre de la base de datos de PostgreSQL */
define( 'DB_NAME',     getenv( 'WORDPRESS_DB_NAME' ) );

/** Nombre de usuario de la base de datos */
define( 'DB_USER',     getenv( 'WORDPRESS_DB_USER' ) );

/** Contraseña de la base de datos */
define( 'DB_PASSWORD', getenv( 'WORDPRESS_DB_PASSWORD' ) );

/** Host de la base de datos (incluye puerto) */
define( 'DB_HOST',     getenv( 'WORDPRESS_DB_HOST' ) . ':' . getenv( 'WORDPRESS_DB_PORT' ) );

/** Codificación de la base de datos */
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/** Prefijo de las tablas */
$table_prefix = 'wp_';

/** Modo debugging */
define( 'WP_DEBUG',         true );
define( 'WP_DEBUG_LOG',     true );
define( 'WP_DEBUG_DISPLAY', false );

/** Absolute path al directorio de WordPress */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Carga las variables y ajustes de WordPress */
require_once ABSPATH . 'wp-settings.php';
