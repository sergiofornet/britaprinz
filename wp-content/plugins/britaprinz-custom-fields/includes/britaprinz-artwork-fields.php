<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bp_artwork_fields() {
	// Container::make( 'theme_options', __( 'Opciones de la Colección', 'britaprinz-custom-fields' ) )
	// 	->set_page_parent( 'edit.php?post_type=artwork' )
	// 	->add_fields( array(
	// 		Field::make( 'rich_text', 'bp_artwork_history' . britaprinz_get_i18n_suffix(), __( 'Historia de la Colección', 'britaprinz-custom-fields' ) ),
	// 		Field::make( 'image', 'crb_image', __( 'Image' ) )
	// 	) );
	Container::make( 'post_meta', __( 'Información de la obra', 'britaprinz-custom-fields' ) )
		->where( 'post_type', '=', 'artwork' )
		->add_fields( array(
			Field::make( 'text', 'bp_artwork_year', __( 'Año', 'britaprinz-custom-fields' ) )
				->set_width( 50 )
				->set_attribute( 'placeholder', 'aaaa' ),
			Field::make( 'text', 'bp_artwork_copy', __( 'Ejemplar', 'britaprinz-custom-fields' ) )
				->set_width( 50 ),
			Field::make( 'text', 'bp_artwork_paper', __( 'Papel', 'britaprinz-custom-fields' ) )
				->set_width( 33 ),
			Field::make( 'text', 'bp_artwork_size', __( 'Tamaño', 'britaprinz-custom-fields' ) )
				->set_width( 33 ),
			Field::make( 'text', 'bp_artwork_condition', __( 'Estado', 'britaprinz-custom-fields' ) )
				->set_width( 33 ),
			Field::make( 'checkbox', 'bp_artwork_loan', __( 'Disponible para préstamo', 'britaprinz-custom-fields' ) )
				->set_option_value( 'true' )
				->set_width( 50 ),
			Field::make( 'checkbox', 'bp_artwork_sale', __( 'Disponible para venta', 'britaprinz-custom-fields' ) )
				->set_option_value( 'true' )
				->set_width( 50 ),
			Field::make( 'rich_text', 'bp_artwork_info', __( 'Descripción', 'britaprinz-custom-fields' ) ),
			Field::make( 'complex', 'bp_artwork_technique', __( 'Técnica', 'britaprinz-custom-fields' ) )
				->set_duplicate_groups_allowed( false )
				->add_fields( array(
					Field::make( 'association', 'bp_artwork_technique_list', __( 'Técnicas de grabado', 'britaprinz-custom-fields' ) )
						->set_types( array(
							array( 
								'type'		=> 'post',
								'post_type'	=> 'technique',
							),
						) )
						->set_duplicates_allowed( false ),
					Field::make( 'text', 'bp_artwork_technique_other', __( 'Otras técnicas' , 'britaprinz-custom-fields' ) ),
				) ),
			Field::make( 'media_gallery', 'bp_artwork_gallery', __( 'Galería', 'britaprinz-custom-fields' ) )
				->set_type( array( 'image' ) )
				->set_duplicates_allowed( false ),
		));

	add_filter( 'crb_media_buttons_html', function( $html, $field_name ) {
		if ( $field_name === 'bp_artwork_info' ) {
			return;
		}
		return $html;
	}, 10, 2);
}