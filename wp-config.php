<?php
/**
 * wp-config.php optimizado para:
 *  - Contenedores / Render (DATABASE_URL)
 *  - PostgreSQL vía PG4WP
 *  - Idiomas en wp-content/languages
 *  - Forzar HTTPS detrás de proxy
 *  - Debug limpio a /wp-content/debug.log
 */

/* ---------------------------------------------------------------------
 * 0) Prefijo de tablas
 * -------------------------------------------------------------------*/
$table_prefix = 'wp_';

/* ---------------------------------------------------------------------
 * 1) Forzar HTTPS si pasamos por Cloudflare / proxy inverso
 * -------------------------------------------------------------------*/
if ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* ---------------------------------------------------------------------
 * 2) Parámetros de conexión a la base de datos
 *    (a) Con DATABASE_URL        → Render / Docker Compose
 *    (b) Sin DATABASE_URL        → Ajusta valores locales
 * -------------------------------------------------------------------*/
if ( $database_url = getenv('DATABASE_URL') ) {
	$url = parse_url( $database_url );

	define( 'DB_NAME', ltrim( $url['path'], '/' ) );
	define( 'DB_USER', $url['user'] );
	define( 'DB_PASSWORD', $url['pass'] );
	define( 'DB_HOST', $url['host'] . ':' . ( $url['port'] ?? 5432 ) );
} else {
	// --- AJUSTA ESTOS DATOS PARA TU ENTORNO LOCAL ---
	define( 'DB_NAME',     'TU_BD_LOCAL' );
	define( 'DB_USER',     'TU_USUARIO_LOCAL' );
	define( 'DB_PASSWORD', 'TU_PASSWORD_LOCAL' );
	define( 'DB_HOST',     'localhost:5432' );
}

// Tipo de driver utilizado por PG4WP
define( 'DB_DRIVER', 'pgsql' );

// Charset & collate
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/* ---------------------------------------------------------------------
 * 3) Claves y SALTs (genera nuevas aquí):
 *    https://api.wordpress.org/secret-key/1.1/salt/
 * -------------------------------------------------------------------*/
define( 'AUTH_KEY',         'PON_AQUÍ_CLAVE_UNICA' );
define( 'SECURE_AUTH_KEY',  'PON_AQUÍ_CLAVE_UNICA' );
define( 'LOGGED_IN_KEY',    'PON_AQUÍ_CLAVE_UNICA' );
define( 'NONCE_KEY',        'PON_AQUÍ_CLAVE_UNICA' );
define( 'AUTH_SALT',        'PON_AQUÍ_CLAVE_UNICA' );
define( 'SECURE_AUTH_SALT', 'PON_AQUÍ_CLAVE_UNICA' );
define( 'LOGGED_IN_SALT',   'PON_AQUÍ_CLAVE_UNICA' );
define( 'NONCE_SALT',       'PON_AQUÍ_CLAVE_UNICA' );

/* ---------------------------------------------------------------------
 * 4) Modo DEBUG
 * -------------------------------------------------------------------*/
define( 'WP_DEBUG',         true );     // ← pon false en producción
define( 'WP_DEBUG_LOG',     true );     // log a /wp-content/debug.log
define( 'WP_DEBUG_DISPLAY', false );    // nada en pantalla para evitar leaks

/* ---------------------------------------------------------------------
 * 5) Directorios personalizados
 * -------------------------------------------------------------------*/
// Ruta/URL de wp-content
define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL',
	( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://' ) .
	$_SERVER['HTTP_HOST'] . '/wp-content'
);

// Carpeta de idiomas fuera del core
define( 'WP_LANG_DIR', WP_CONTENT_DIR . '/languages' );

/* ---------------------------------------------------------------------
 * 6) (Opcional) Forzar método de escritura directa en contenedor
 * -------------------------------------------------------------------*/
// define( 'FS_METHOD', 'direct' );

/* ---------------------------------------------------------------------
 * 7) ¡No edites nada a partir de aquí!
 * -------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
