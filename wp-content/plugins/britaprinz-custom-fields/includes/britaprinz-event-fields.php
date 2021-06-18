<?php
/**
 * Event CPT custom fields
 *
 * @package Brita_Prinz_Custom_Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Event custom fields definition
 */
function bpa_event_fields() {
	Container::make( 'theme_options', __( 'Opciones de exposiciones', 'britaprinz-custom-fields' ) )
		->set_page_parent( 'edit.php?post_type=event' )
		->add_fields(
			array(
				Field::make( 'rich_text', 'bp_event_none' . britaprinz_get_i18n_suffix(), __( 'Sin exposiciones', 'britaprinz-custom-fields' ) ),
			)
		);
	Container::make( 'post_meta', __( 'Información la exposición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'event' )
		->add_fields(
			array(
				Field::make( 'text', 'bp_event_artist', __( 'Artista', 'britaprinz-custom-fields' ) ),
				Field::make( 'rich_text', 'bp_event_info', __( 'Información', 'britaprinz-custom-fields' ) ),
				Field::make( 'media_gallery', 'bp_event_gallery', __( 'Galería', 'britaprinz-custom-fields' ) )
					->set_type( array( 'image' ) )
					->set_duplicates_allowed( false ),
			)
		);
	Container::make( 'post_meta', __( 'Fechas de la exposición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'event' )
		->set_context( 'side' )
		->set_priority( 'low' )
		->add_fields(
			array(
				Field::make( 'date', 'bp_event_start', __( 'Inicio', 'britaprinz-custom-fields' ) )
					->set_storage_format( 'Y-m-d' )
					->set_input_format( 'd-m-Y', 'd-m-Y' )
					->set_picker_options(
						array(
							'locale' => 'es',
						)
					)
					->set_attribute( 'placeholder', 'dd-mm-aaaa' ),
				Field::make( 'date', 'bp_event_end', __( 'Fin', 'britaprinz-custom-fields' ) )
					->set_storage_format( 'Y-m-d' )
					->set_input_format( 'd-m-Y', 'd-m-Y' )
					->set_picker_options(
						array(
							'locale' => 'es',
						)
					)
					->set_attribute( 'placeholder', 'dd-mm-aaaa' ),
			)
		);

	add_filter(
		'crb_media_buttons_html',
		function( $html, $field_name ) {
			if ( 'bp_event_info' === $field_name ) {
				return;
			}
			return $html;
		},
		10,
		2
	);
}
