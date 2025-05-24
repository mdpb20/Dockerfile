<?php
/**
 * Plugin Name:     MiPlugin PG4WP
 * Description:     Ejemplo de plugin dentro de pg4wp.
 * Version:         1.0.0
 * Author:          Moisés Pino
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mipg4wp_init() {
    load_plugin_textdomain( 'mipg4wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'mipg4wp_init' );
