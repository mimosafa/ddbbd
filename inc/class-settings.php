<?php
namespace DanaDonBoomBoomDoo;

use DDBBD as D;

/**
 *
 */
class Settings {

	/**
	 * Singleton pattern
	 *
	 * @uses DDBBD\Singleton
	 */
	use D\Singleton;

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
		$this->options = _ddbbd_options();
		$this->init();
	}

	private function init() {
		$exists_plugins = [];

		/**
		 * Types
		 */
		if ( class_exists( __NAMESPACE__ . '\\Types\\Bootstrap' ) ) {
			$exists_plugins[] = 'types';
			add_action( '_ddbbd_types_settings_general_settings', [ &$this, 'types_general_settings' ], 10, 2 );
		}
	}

	public function types_general_settings( $page, $use_types ) {
		if ( $use_types ) {
			$page
				->field( 'export-types-as-json', __( 'Save as json files', 'ddbbd' ) )
					->option_name( $this->options->full_key( 'save_types_as_json' ), 'checkbox' )
				->field( 'dir-for-save-json', __( 'Directory for saving json files', 'ddbbd' ) )
					->option_name( $this->options->full_key( 'types_json_dir' ), [ &$this, 'save_json_dir' ] )
			;
		}
	}

}
