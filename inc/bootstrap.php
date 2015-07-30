<?php
/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap file.
 *
 * @package    WordPress
 * @subpackage DDBBD
 * @author     Toshimichi Mimoto
 */
namespace DanaDonBoomBoomDoo;

/**
 * Index in 'Dana Don-Boom-Boom-Doo' plugins
 */
const INDEX = 0;

/**
 * Bootstrap after plugins loaded
 */
add_action( 'plugins_loaded', __NAMESPACE__ . '\\Bootstrap::getInstance', INDEX );

/**
 * Dana Don-Boom-Boom-Doo plugin bootstrap class
 */
class Bootstrap {

	/**
	 * Singleton pattern
	 *
	 * @uses DDBBD\Singleton
	 */
	use \DDBBD\Singleton;

	/**
	 * @var DDBBD\Options
	 */
	private $options;

	/**
	 * Constructor
	 *
	 * @access private
	 */
	protected function __construct() {
		$this->add_options();
		register_activation_hook( DDBBD_FILE, [ &$this, '_activation' ] );
		register_deactivation_hook( DDBBD_FILE, [ &$this, '_deactivation' ] );
		$this->init();
	}

	private function add_options() {
		$this->options = _ddbbd_options();

		/**
		 *
		 */
		$this->options->add( 'save_types_as_json', 'boolean' );

		/**
		 *
		 */
		$this->options->add( 'types_json_dir' );
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
		if ( is_admin() && current_user_can( 'manage_options' ) )
			Settings::getInstance();
	}

}
