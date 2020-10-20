<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bp_exhibition_fields() {
	Container::make( 'post_meta', __( 'Información la exposición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'exhibition' )
		->add_fields( array(
			Field::make( 'text', 'bp_exhibition_artist', __( 'Artista', 'britaprinz-custom-fields' ) ),
			Field::make( 'textarea', 'bp_exhibition_info', __( 'Información', 'britaprinz-custom-fields' ) ),
			Field::make( 'media_gallery', 'bp_exhibition_gallery', __( 'Galería', 'britaprinz-custom-fields' ) )
				->set_type( array( 'image' ) )
				->set_duplicates_allowed( false ),
		));
	Container::make( 'post_meta', __( 'Fechas de la exposición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'exhibition' )
		->set_context( 'side' )
		->set_priority( 'low' )
		->add_fields( array(
			Field::make( 'date', 'bp_exhibition_start', __( 'Inicio', 'britaprinz-custom-fields' ) )
				->set_storage_format( 'd-m-Y' )
				->set_input_format( 'd-m-Y', 'd-m-Y' )
				->set_picker_options( array(
					'locale' => 'es',
				) )
				->set_attribute( 'placeholder', 'dd-mm-aaaa' ),
			Field::make( 'date', 'bp_exhibition_end', __( 'Fin', 'britaprinz-custom-fields' ) )
				->set_storage_format( 'd-m-Y' )
				->set_input_format( 'd-m-Y', 'd-m-Y' )
				->set_picker_options( array(
					'locale' => 'es',
				) )
				->set_attribute( 'placeholder', 'dd-mm-aaaa' ),
		));
}