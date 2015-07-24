<?php
/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap file.
 *
 * @package DDBBD
 * @author  Toshimichi Mimoto
 */
namespace DanaDonBoomBoomDoo;

/**
 * Index in 'Dana Don-Boom-Boom-Doo' plugins
 */
const ORDER = 0;

/**
 * Bootstrap after plugins loaded
 */
add_action( 'plugins_loaded', __NAMESPACE__ . '\\Bootstrap::getInstance' );

/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap class
 *
 * @access private
 */
class Bootstrap {

	/**
	 * Singleton pattern
	 *
	 * @uses DDBBD\Singleton
	 */
	use \DDBBD\Singleton;

	/**
	 * Constructor
	 *
	 * @access private
	 */
	protected function __construct() {
		register_activation_hook( DDBBD_FILE, [ &$this, '_activation' ] );
		register_deactivation_hook( DDBBD_FILE, [ &$this, '_deactivation' ] );
		$this->init();
	}

	/**
	 * Plugin activation callback
	 *
	 * @access private
	 */
	public function _activation() {
		//
	}

	/**
	 * Plugin deactivation callback
	 *
	 * @access private
	 */
	public function _deactivation() {
		//
	}

	/**
	 * @access private
	 */
	private function init() {
		if ( is_admin() )
			add_action( 'init', __NAMESPACE__ . '\\Settings::getInstance', ORDER );
	}

}
