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
		$this->_pages();
		$this->page->done();
	}

	private function _pages() {
		do_action( '_dana_don_boom_boom_doo_before_general_settings', $this->page );
		$this->_general_settings();
		do_action( '_dana_don_boom_boom_doo_after_general_settings', $this->page );
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

		if ( ! apply_filters( '_dana_don_boom_boom_doo_general_settings_types', false, $this->page ) ) {
			$this->page
				->description( __( 'If you want to use Custom Types, please install "Dana Don-Boom-Boom-Doo Types" plugin.' ) )
			;
		}
	}

}
