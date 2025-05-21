<?php
/**
 * Configuración básica de WordPress para PostgreSQL en Render
 */

// --------------------------------------------------
// 1. Parsear DATABASE_URL (o RENDER_DATABASE_URL) desde entorno
// --------------------------------------------------
$database_url = getenv('DATABASE_URL') ?: getenv('RENDER_DATABASE_URL');
if (!$database_url) {
    die('❌ No se encontró DATABASE_URL en las variables de entorno.');
}

$parts = parse_url($database_url);

if (!isset($parts['host'], $parts['port'], $parts['user'], $parts['pass'], $parts['path'])) {
    die('❌ La URL de la base de datos no tiene el formato esperado.');
}

// --------------------------------------------------
// 2. Definir constantes de conexión a Postgres
// --------------------------------------------------
define('DB_NAME',     ltrim($parts['path'], '/')); // elimina la “/” inicial
define('DB_USER',     $parts['user']);
define('DB_PASSWORD', $parts['pass']);
define('DB_HOST',     $parts['host']);
define('DB_PORT',     $parts['port']);

// Forzar uso de pg4wp en lugar de ext-mysql
define('WP_USE_EXT_MYSQL', false);

define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');

// --------------------------------------------------
// 3. Prefijo de tablas
// --------------------------------------------------
$table_prefix = 'wp_';

// --------------------------------------------------
// 4. Modo debug
// --------------------------------------------------
define('WP_DEBUG',         true);
define('WP_DEBUG_LOG',     true);
define('WP_DEBUG_DISPLAY', false);

// --------------------------------------------------
// 5. ¡Eso es todo! No editar por debajo de esta línea
// --------------------------------------------------
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';

