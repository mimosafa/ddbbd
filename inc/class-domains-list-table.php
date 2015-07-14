<?php
namespace DanaDonBoomBoomDoo;

class Domains_List_Table extends \DDBBD\List_Table {

	public function __construct() {
		parent::__construct( [
			'singular' => 'domain',
			'plural'   => 'domains',
		] );
	}

	public function prepare_items() {
		$this->_column_headers = [
			$this->get_columns(),
			$this->get_hidden_columns(),
			$this->get_sortable_columns()
		];
	}

	public function get_columns() {
		$columns = [
			'cb'     => '<input type="checkbox" />',
			'domain' => __( 'Domain', 'ddbbd' ),
			'type'   => __( 'Content Type', 'ddbbd' ),
		];
		return $columns;
	}
	public function get_hidden_columns() { return []; }
	public function get_sortable_columns() { return []; }

}
