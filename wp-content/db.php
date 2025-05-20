<?php
/*
Plugin Name: PostgreSQL for WordPress (PG4WP)
Plugin URI: http://www.hawkix.net
Description: PG4WP is a special 'plugin' enabling WordPress to use a PostgreSQL database.
Version: 1.3.0+
Author: Hawk__
Author URI: http://www.hawkix.net
License: GPLv2 or newer.
*/

if ( ! defined('PG4WP_ROOT') ) {

  // Sólo definimos el driver si no existe
  if ( ! defined('DB_DRIVER') ) {
    define('DB_DRIVER', 'pgsql'); // 'pgsql' or 'mysql'
  }

  // Debug logs
  if ( ! defined('PG4WP_DEBUG') ) {
    define('PG4WP_DEBUG', false);
  }
  if ( ! defined('PG4WP_LOG_ERRORS') ) {
    define('PG4WP_LOG_ERRORS', true);
  }

  // Configuración insegura
  if ( ! defined('PG4WP_INSECURE') ) {
    define('PG4WP_INSECURE', false);
  }

  // Esquema por defecto
  if ( ! defined('PG4WP_SCHEMA') ) {
    define('PG4WP_SCHEMA', 'public');
  }

  // Determina la carpeta raíz de PG4WP
  if ( file_exists(ABSPATH . '/wp-content/pg4wp') ) {
    if ( ! defined('PG4WP_ROOT') ) {
      define('PG4WP_ROOT', ABSPATH . '/wp-content/pg4wp');
    }
  } else {
    if ( ! defined('PG4WP_ROOT') ) {
      define('PG4WP_ROOT', ABSPATH . '/wp-content/plugins/pg4wp');
    }
  }

  // Carga el core
  require_once PG4WP_ROOT . '/core.php';
}

