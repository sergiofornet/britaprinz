<?php
/**
 * Page custom fields
 *
 * @package Brita_Prinz_Custom_Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Page custom fields
 */
function bpa_page_fields() {
	Container::make( 'post_meta', __( 'Menú lateral', 'britaprinz-custom-fields' ) )
			->where( 'post_type', '=', 'page' )
			->set_context( 'side' )
			->add_fields(
				array(
					Field::make( 'select', 'bp_page_menu', __( 'Menú lateral', 'britaprinz-custom-fields' ) )
						->set_options( 'bpa_get_menus' )
						->set_default_value( 'undefined' ),
				)
			);
}

/**
 * Get registered menus helper function
 *
 * @return array an array of registered menus
 */
function bpa_get_menus() {
	$registered_menus = get_registered_nav_menus();
	return array_merge( array( 'undefined' => 'undefined' ), $registered_menus ); // We add an additional item to registered menus array so we can set a default value of undefined or select it if we don't want to show any menu.
}
