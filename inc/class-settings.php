<?php
namespace DanaDonBoomBoomDoo;

// Import namespace
use DDBBD as D;

class Settings {

	use D\Singleton;

	/**
	 * @var DDBBD\Settings_Page
	 */
	private $page;

	/**
	 * DDBBD content type map
	 *
	 * @var array
	 */
	private $domains;

	/**
	 * Constructor
	 *
	 * @access private
	 */
	protected function __construct() {
		$this->page = new D\Settings_Page( 'ddbbd', '', __( 'DDBBD', 'ddbbd' ) );

		if ( Options::get_use_custom_types() ) {
			/**
			 * Custom Types Management page
			 */
			$this->page
			->init( 'ddbbd-types', __( 'Types', 'ddbbd' ) )
				->callback( __NAMESPACE__ . '\\Types::getInstance' );
			;
		}

		/**
		 * Plugin general settings
		 */
		$this->_general_settings();

		$this->page->done();
	}

	/**
	 * Dana Don-Boom-Boom-Doo plugin general settings page
	 *
	 * @access private
	 */
	private function _general_settings() {
		$this->page
		->init( 'ddbbd-settings', __( 'Dana Don-Boom-Boom-Doo General Settings', 'ddbbd' ), __( 'Settings', 'ddbbd' ) )
			->section( 'custom-types-manager', __( 'Custom Types Management' ) )
				->description( __( 'Dana Don-Boom-Boom-Doo plugin will make you enable to manage Custom Content Types easier.') )
				->description( __( 'Every Custom Post Types, Custom Taxonomies, and Custom Endpoints will be managed as <strong>Type</strong> units.' ) )
		;

		$this->page
				->description( __( 'If you enable to use Custom Types, "Types" menu will appear.' ) )
					->field( 'enable-custom-types', __( 'Enable Custom Types', 'ddbbd' ) )
					->option_name( Options::full_key( 'use_custom_types' ), 'checkbox' )
		;
	}

}
