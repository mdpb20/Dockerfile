<?php
/**
 * Plugin Name:     MiPlugin PG4WP
 * Plugin URI:      https://tu-site-ejemplo.com/
 * Description:     Ejemplo de plugin dentro de PG4WP.
 * Version:         1.0.0
 * Author:          Moisés Pino
 * Author URI:      https://tu-site-ejemplo.com/author
 * Text Domain:     mipg4wp
 * Domain Path:     /languages
 */

// Si alguien intenta cargarlo directamente, aborta.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mipg4wp_init() {
    // Carga el archivo de traducciones (si tienes PO/MO en /wp-content/plugins/miplugin/languages/)
    load_plugin_textdomain( 'mipg4wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'mipg4wp_init' );

// Aquí puedes enganchar más acciones o filtros...
