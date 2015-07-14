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
		$this->_general_settings();
		if ( D\Options::get_use_domains() ) {
			/**
			 * Toplevel of DDBBD settings pages
			 */
			( new D\Settings_Page( 'ddbbd', __( 'DDBBD', 'ddbbd' ) ) )->done();

			$this->page = new D\Settings_Page();
			$this->_domains_list();

			add_action( 'admin_menu', function() {
				remove_submenu_page( 'ddbbd', 'ddbbd' );
			}, 999 );
		}
	}

	/**
	 * Dana Don-Boom-Boom-Doo plugin general settings page
	 *
	 * @access private
	 */
	private function _general_settings() {
		$generalSettingsPage = new D\Settings_Page( 'options-general.php' );
		$generalSettingsPage
		->init( 'ddbbd-general-settings', __( 'Dana Don-Boom-Boom-Doo General Settings', 'ddbbd' ), __( 'Dana Don-Boom-Boom-Doo', 'ddbbd' ) )
			->section( 'domain-management', __( 'Domains Management' ) )
				->description( __( 'Dana Don-Boom-Boom-Doo plugin will make you enable to manage Custom Content Types easier.') )
				->description( __( 'Every Custom Post Types and Custom Taxonomies, Custom Endpoints will be managed as <strong>Domain</strong> units.' ) )
				->description( __( 'If you enable to use Domain Manager, "Domains" will appear in menu.' ) )
					->field( 'enable-domains-management', __( 'Enable Domains Manager', 'ddbbd' ) )
					->option_name( D\Options::full_key( 'use_domains' ), 'checkbox' )
		->done();
	}

	/**
	 * Dana Don-Boom-Boom-Doo Domains list page
	 *
	 * @access private
	 */
	private function _domains_list() {
		$this->page
		->init( 'ddbbd' )
			->init( 'ddbbd-domains', __( 'Domains', 'ddbbd' ) )
				->callback( [ &$this, '_domains_list_table' ] )

		->done();
	}

	/**
	 * Drow list table for Domains
	 *
	 * @access private
	 */
	public function _domains_list_table() {
		$h2 = __( 'Domains', 'ddbbd' );
		if ( current_user_can( 'manage_options' ) )
			$h2 .= '<a href="#" class="add-new-h2">' . _x( 'Add New', 'domain', 'ddbbd' ) . '</a>';
		$lt = new Domains_List_Table();
		$lt->prepare_items();

		echo '<div class="wrap">';
		echo '<h2>' . $h2 . '</h2>';
		$lt->display();
		echo '</div>';
	}

}
