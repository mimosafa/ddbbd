<?php
namespace DanaDonBoomBoomDoo;

/**
 * Dana Don-Boom-Boom-Doo plugin's option class
 *
 * @uses (trait)DDBBD\Options
 */
class Options {
	use \DDBBD\Options;

	// Cache group
	private $cache_group = 'ddbbd_caches';

	// Option prefix
	private $prefix = 'ddbbd_';

	// Option keys
	private $keys = [
		/**
		 * Enable domains manager, OR not
		 * @var boolean
		 */
		'use_custom_types',

		/**
		 * Custom content types data
		 * @var array
		 */
		'types',
	];

}
