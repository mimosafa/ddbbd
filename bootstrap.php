<?php
/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap file.
 *
 * @package DDBBD
 * @author  Toshimichi Mimoto
 */

define( 'DDBBD_DIR', __DIR__ );
define( 'DDBBD_FILE', DDBBD_DIR . '/ddbbd.php' );
define( 'DDBBD_INC', DDBBD_DIR . '/inc' );

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
		if ( is_admin() ) {
			DDBBD\Types\Objects::getInstance();
			add_action( 'init', 'DanaDonBoomBoomDoo\\Settings::getInstance' );
		}

		#$data = json_decode( @file_get_contents( DDBBD_DIR . '/sample-domains.json' ), true );
		#var_dump( $data );
	}

}
