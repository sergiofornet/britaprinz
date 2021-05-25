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
				Field::make( 'association', 'bp_technique_artist', __( 'Artista destacado', 'britaprinz-custom-fields' ) )
					->set_types(
						array(
							array(
								'type'     => 'term',
								'taxonomy' => 'artist',
							),
						)
					)
					->set_duplicates_allowed( false ),
			)
		);
}
