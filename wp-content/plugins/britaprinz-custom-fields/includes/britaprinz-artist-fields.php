<?php
/**
 * Artist term custom fields
 *
 * @package Brita_Prinz_Custom_Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Artist custom fields definition
 */
function bpa_artist_fields() {
	Container::make( 'term_meta', __( 'Información del artista', 'britaprinz-custom-fields' ) )
		->where( 'term_taxonomy', '=', 'artist' )
		->add_fields(
			array(
				Field::make( 'rich_text', 'bp_artist_bio', __( 'Biografía', 'britaprinz-custom-fields' ) ),
				Field::make( 'text', 'bp_artist_order_name', __( 'Nombre para ordenar', 'britaprinz-custom-fields' ) )
					->set_attribute( 'pattern', '[a-z]+' )
					->set_help_text( 'El nombre/apellido a tener en cuenta para ordenar a los artistas. En minúscula y sin espacios y/o caracteres especiales.' )
					->set_attribute( 'placeholder', 'sólo minúsculas, sin espacios ni caracteres especiales' )
					->set_required(),
			)
		);

	add_filter(
		'crb_media_buttons_html',
		function( $html, $field_name ) {
			if ( $field_name === 'bp_artist_bio' ) {
				return;
			}
			return $html;
		},
		10,
		2
	);
}
