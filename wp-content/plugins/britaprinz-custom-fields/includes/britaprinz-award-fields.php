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
function bpa_award_fields() {
	Container::make( 'theme_options', __( 'Opciones del premio', 'britaprinz-custom-fields' ) )
		->set_page_parent( 'edit.php?post_type=award' )
		->where( 'current_user_capability', 'IN', array( 'administrator' ) )
		->add_fields(
			array(
				Field::make( 'rich_text', 'bp_award_history', __( 'Historia del premio', 'britaprinz-custom-fields' ) ),
			)
		);
	Container::make( 'post_meta', __( 'Edición especial', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'award' )
		->add_fields(
			array(
				Field::make( 'checkbox', 'bp_award_se_toggle', 'Edición especial' )
					->set_visible_in_rest_api( $visible = true ),
				Field::make( 'complex', 'bp_award_se', __( 'Edición especial', 'britaprinz-custom-fields' ) )
					->set_conditional_logic(
						array(
							array(
								'field' => 'bp_award_se_toggle',
								'value' => true,
							),
						)
					)
					->set_visible_in_rest_api( true )
					->add_fields(
						array(
							Field::make( 'text', 'bp_award_se_year', __( 'Edición', 'britaprinz-custom-fields' ) )
								->set_width( 25 ),
							Field::make( 'rich_text', 'bp_award_se_winners', __( 'Ganadores', 'britaprinz-custom-fields' ) )
								->set_width( 75 ),
						)
					),
			)
		);
	Container::make( 'post_meta', __( 'Detalles de la edición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'award' )
		->add_fields(
			array(
				Field::make( 'complex', 'bp_award', __( 'Ganadores', 'britaprinz-custom-fields' ) )
					->add_fields(
						array(
							Field::make( 'text', 'bp_award_category', __( 'Categoría', 'britaprinz-custom-fields' ) ),
							Field::make( 'text', 'bp_award_title', __( 'Título', 'britaprinz-custom-fields' ) ),
							Field::make( 'text', 'bp_award_artist', __( 'Artista', 'britaprinz-custom-fields' ) ),
							Field::make( 'text', 'bp_award_size', __( 'Tamaño', 'britaprinz-custom-fields' ) ),
							Field::make( 'text', 'bp_award_technique', __( 'Técnica', 'britaprinz-custom-fields' ) ),
							Field::make( 'text', 'bp_award_year', __( 'Año', 'britaprinz-custom-fields' ) ),
							Field::make( 'image', 'bp_award_image', __( 'Imagen', 'britaprinz-custom-fields' ) )
								->set_type( array( 'image' ) ),
						)
					),
				Field::make( 'textarea', 'bp_award_mentions', __( 'Menciones de honor', 'britaprinz-custom-fields' ) )
					->set_visible_in_rest_api( $visible = true ),
				Field::make( 'textarea', 'bp_award_selected', __( 'Seleccionados', 'britaprinz-custom-fields' ) )
					->set_visible_in_rest_api( $visible = true ),
			)
		);
	
	Container::make( 'post_meta', __( 'Edición', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'award' )
		->set_context( 'side' )
		->set_priority( 'core' )
		->add_fields(
			array(
				Field::make( 'date', 'bp_award_edition', __( 'Edición', 'britaprinz-custom-fields' ) )
					->set_storage_format( 'Y' )
					->set_input_format( 'Y', 'Y' )
					->set_picker_options(
						array(
							'locale' => 'es',
						)
					)
					->set_attribute( 'placeholder', 'aaaa' )
					->set_visible_in_rest_api( $visible = true ),
				Field::make( 'file', 'bp_award_catalogue', __( 'Catálogo', 'britaprinz-custom-fields' ) )
					->set_type(
						array( 'application/pdf' )
					)
					->set_help_text( __( 'PDF', 'britaprinz-custom-fields' ) ),
			)
		);

	/**
	 * TO DO: Catalog gallery
	 */

	add_filter(
		'crb_media_buttons_html',
		function( $html, $field_name ) {
			if ( 'bp_award_se_winners' === $field_name ) {
				return;
			}
			return $html;
		},
		10,
		2
	);
}
