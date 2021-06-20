<?php
/**
 * Technique CPT custom fields
 *
 * @package Brita_Prinz_Custom_Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Technique custom fields
 */
function bpa_technique_fields() {
	Container::make( 'post_meta', __( 'Detalles de la técnica', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'technique' )
		->add_fields(
			array(
				Field::make( 'complex', 'bp_technique_steps', __( 'Explicación de la técnica', 'britaprinz-custom-fields' ) )
					->add_fields(
						array(
							Field::make( 'image', 'bp_technique_steps_image', __( 'Imagen', 'britaprinz-custom-fields' ) )
								->set_width( 25 ),
							Field::make( 'textarea', 'bp_technique_steps_text', __( 'Texto', 'britaprinz-custom-fields' ) )
								->set_width( 75 ),
						),
					)
					->set_max( 5 ),
				Field::make( 'association', 'bp_technique_artwork', __( 'Obras destacadas', 'britaprinz-custom-fields' ) )
					->set_types(
						array(
							array(
								'type'      => 'post',
								'post_type' => 'artwork',
							),
						)
					)
					->set_duplicates_allowed( false ),
				Field::make( 'text', 'bp_technique_related_text', __( 'Texto obras destacadas', 'britaprinz-custom-fields' ) )
					->set_attribute( 'placeholder', 'contenido del enlace a las obras relacionadas' ),
			)
		);
}
