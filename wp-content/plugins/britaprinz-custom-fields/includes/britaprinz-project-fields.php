<?php
/**
 * Award CPT custom fields
 *
 * @package Brita_Prinz_Custom_Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Award custom fields definition
 */
function bpa_project_fields() {
	Container::make( 'post_meta', __( 'Año', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'project' )
		->set_context( 'side' )
		->set_priority( 'core' )
		->add_fields(
			array(
				Field::make( 'text', 'bp_project_date', __( 'Año', 'britaprinz-custom-fields' ) )
					->set_attribute( 'pattern', '^([0-9]{4})$' )
					->set_attribute( 'placeholder', 'AAAA' ),
			)
		);
}
