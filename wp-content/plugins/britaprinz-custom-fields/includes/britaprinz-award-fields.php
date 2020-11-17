<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bp_award_fields() {
	Container::make( 'theme_options', __( 'Opciones del premio', 'britaprinz-custom-fields' ) )
		->set_page_parent( 'edit.php?post_type=award' )
		->where( 'current_user_capability', 'IN', array( 'administrator' ) )
		->add_fields( array(
			Field::make( 'rich_text', 'bp_award_history', __( 'Historia del premio', 'britaprinz-custom-fields' ) ),
		) );
	Container::make( 'post_meta', __( 'Detalles de la edición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'award' )
		->add_fields( array(
			Field::make( 'complex', 'bp_award', __( 'Ganadores' ) )
				->add_fields( array(
					Field::make( 'text', 'bp_award_category', __( 'Categoría' ) ),
					Field::make( 'text', 'bp_award_title', __( 'Título' ) ),
					Field::make( 'text', 'bp_award_artist', __( 'Artista' ) ),
					Field::make( 'text', 'bp_award_size', __( 'Tamaño' ) ),
					Field::make( 'text', 'bp_award_technique', __( 'Técnica' ) ),
					Field::make( 'image', 'bp_award_image', __( 'Imagen' ) )
						->set_type( array( 'image' ) ),
				) ),
			Field::make( 'textarea', 'bp_award_mentions', __( 'Menciones de honor' ) ),
			Field::make( 'textarea', 'bp_award_selected', __( 'Seleccionados' ) )
		) );
	Container::make( 'post_meta', __( 'Edición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'award' )
		->set_context( 'side' )
		->set_priority( 'core' )
		->add_fields( array(
			Field::make( 'date', 'bp_award_edition', __( 'Edición', 'britaprinz-custom-fields' ) )
				->set_storage_format( 'Y' )
				->set_input_format( 'Y', 'Y' )
				->set_picker_options( array(
					'locale' => 'es',
				) )
				->set_attribute( 'placeholder', 'aaaa' ),
			Field::make( 'file', 'bp_award_catalogue', __( 'Catálogo', 'britaprinz-custom-fields' ) )
				->set_help_text( __( 'PDF', 'britaprinz-custom-fields' ) )
				->set_type( array( 'application/pdf' ) )
		));
}