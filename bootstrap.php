<?php
/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap file.
 *
 * @package DDBBD
 * @author  Toshimichi Mimoto
 */

add_action( 'plugins_loaded', 'DanaDonBoomBoomDoo::getInstance' );

/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap class
 *
 * @access private
 */
class DanaDonBoomBoomDoo {

	/**
	 * Singleton pattern
	 *
	 * @uses DDBBD\Singleton
	 */
	use DDBBD\Singleton;

	/**
	 * Constructor
	 *
	 * @access private
	 */
	protected function __construct() {
		$this->_register_classloader();
		register_activation_hook( DDBBD_FILE, [ &$this, '_activation' ] );
		register_deactivation_hook( DDBBD_FILE, [ &$this, '_deactivation' ] );
		$this->init();
	}

	/**
	 * @access private
	 */
	private function _register_classloader() {
		$options = [ 'file_prefix' => 'class-' ];
		_ddbbd_register_classloader( 'DanaDonBoomBoomDoo', DDBBD_INC, $options );
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
			add_action( 'init', 'DanaDonBoomBoomDoo\\Settings::getInstance' );
	}

}
