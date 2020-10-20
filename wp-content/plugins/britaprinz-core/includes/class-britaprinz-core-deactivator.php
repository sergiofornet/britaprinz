<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://betty-symington.xyz
 * @since      1.0.0
 *
 * @package    Britaprinz_Core
 * @subpackage Britaprinz_Core/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Britaprinz_Core
 * @subpackage Britaprinz_Core/includes
 * @author     Your Name <email@example.com>
 */
class Britaprinz_Core_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
