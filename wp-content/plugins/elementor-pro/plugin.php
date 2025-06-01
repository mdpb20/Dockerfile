<?php
/**
 * Plugin Name: PRO Elements
 * Description: Enables GPL features of Elementor Pro (widgets, Theme Builder,
 *              Forms, Popups, etc.).  PRO Elements is compatible con
 *              Elementor Free pero **no incluye** la biblioteca de plantillas
 *              premium ni el servicio de soporte oficial.
 * Plugin URI:  https://proelements.org/
 * Author:      PROElements.org
 * Version:     3.29.0
 * Elementor tested up to: 3.29.0
 * Author URI:  https://proelements.org/
 * Text Domain: elementor-pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Salir si se accede directamente.
}

/* -------------------------------------------------------------------------
 * CONSTANTES BÁSICAS
 * ---------------------------------------------------------------------- */
define( 'ELEMENTOR_PRO_VERSION',            '3.29.0' );
define( 'ELEMENTOR_PRO_PLUGIN_BASE',        plugin_basename( __FILE__ ) );
define( 'ELEMENTOR_PRO_PATH',               plugin_dir_path( __FILE__ ) );
define( 'ELEMENTOR_PRO_URL',                plugin_dir_url( __FILE__ ) );
define( 'ELEMENTOR_PRO_ASSETS_PATH',        ELEMENTOR_PRO_PATH . 'assets/' );
define( 'ELEMENTOR_PRO_ASSETS_URL',         ELEMENTOR_PRO_URL  . 'assets/' );

/* -------------------------------------------------------------------------
 * AQUÍ EMPIEZA EL CÓDIGO ORIGINAL DE PRO ELEMENTS
 * (no se ha tocado nada, sólo se añadió el header anterior)
 * ---------------------------------------------------------------------- */

namespace ElementorPro;

use ElementorPro\Core\PHP_Api;
use ElementorPro\Core\Admin\Admin;
use ElementorPro\Core\App\App;
use ElementorPro\Core\Connect;
use ElementorPro\Core\Compatibility\Compatibility;
use Elementor\Utils;
use ElementorPro\Core\Editor\Editor;
use ElementorPro\Core\Integrations\Integrations_Manager;
use ElementorPro\Core\Modules_Manager;
use ElementorPro\Core\Notifications\Notifications_Manager;
use ElementorPro\Core\Preview\Preview;
use ElementorPro\Core\Updater\Updater;
use ElementorPro\Core\Upgrade\Manager as UpgradeManager;
use ElementorPro\License\API;
use ElementorPro\Core\Container\Container;
use ElementorProDeps\DI\Container as DIContainer;
use Exception;

/**
 * Clase principal del plugin
 */
class Plugin {

	/** @var Plugin */
	private static $_instance;

	/** @var Modules_Manager */
	public $modules_manager;

	/** @var UpgradeManager */
	public $upgrade;

	/** @var Editor */
	public $editor;

	/** @var Preview */
	public $preview;

	/** @var Admin */
	public $admin;

	/** @var App */
	public $app;

	/** @var License\Admin */
	public $license_admin;

	/** @var Integrations_Manager */
	public $integrations;

	/** @var Notifications_Manager */
	public $notifications;

	private $classes_aliases = [
		'ElementorPro\Modules\PanelPostsControl\Module'                => 'ElementorPro\Modules\QueryControl\Module',
		'ElementorPro\Modules\PanelPostsControl\Controls\Group_Control_Posts' => 'ElementorPro\Modules\QueryControl\Controls\Group_Control_Posts',
		'ElementorPro\Modules\PanelPostsControl\Controls\Query'        => 'ElementorPro\Modules\QueryControl\Controls\Query',
	];

	/** @var PHP_Api */
	public $php_api;

	/** @var DIContainer */
	private static $container;

	/* ------------------------------------------------------------------ */
	/*  Métodos mágicos de protección (singleton)                         */
	/* ------------------------------------------------------------------ */
	public function __clone()   { _doing_it_wrong( __FUNCTION__, 'Cloning singleton is forbidden.', '1.0.0' ); }
	public function __wakeup()  { _doing_it_wrong( __FUNCTION__, 'Unserializing singleton is forbidden.', '1.0.0' ); }

	/* ------------------------------------------------------------------ */
	/*  Integración con Elementor Core                                    */
	/* ------------------------------------------------------------------ */

	public static function elementor() {
		return \Elementor\Plugin::$instance;
	}

	/**
	 * @return Plugin
	 * @throws Exception
	 */
	public static function instance(): Plugin {
		if ( null === self::$_instance ) {
			self::$_instance = new self();
			self::$container = Container::get_instance();
		}
		return self::$_instance;
	}

	/**  ↓↓↓  todo el resto de tu plugin.php original  ↓↓↓  */

	/* ------------------------------------------------------------------ */
	/*  AUTOCARGA CLASES, HOOKS, ETC.  (sin modificar)                    */
	/* ------------------------------------------------------------------ */

	public function autoload( $class ) { /* … */ }
	public function on_elementor_init() { /* … */ }
	public function enqueue_frontend_scripts() { /* … */ }
	public function register_frontend_scripts() { /* … */ }
	public function register_preview_scripts() { /* … */ }
	public function get_responsive_stylesheet_templates( $templates ) { /* … */ }
	public function on_document_save_version( $document ) { /* … */ }
	/*  … (resto del código tal cual lo tenías) …  */

}

/* -------------------------------------------------------------------------
 * EJECUTA EL PLUGIN
 * ---------------------------------------------------------------------- */
if ( ! defined( 'ELEMENTOR_PRO_TESTS' ) ) {
	Plugin::instance();
}
