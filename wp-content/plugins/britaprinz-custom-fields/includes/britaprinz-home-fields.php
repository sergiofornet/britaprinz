<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bp_home_fields() {
	Container::make( 'post_meta', 'Contenido destacado' )
		->where( 'post_id', '=', get_option( 'page_on_front' ) )
		->set_context( 'advanced' )
		->add_fields( array(
			Field::make( 'complex', 'bp_home_featured', __( 'Destacados', 'britaprinz-custom-fields' ) )
				->set_max( 2 )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'bp_home_featured_label', __( 'Título', 'britaprinz-custom-fields' ) ),
					Field::make( 'association', 'bp_home_featured_post', __( 'Contenido destacado', 'britaprinz-custom-fields' ) )
						->set_types( array(
							array(
								'type' => 'post',
								'post_type' => 'page',
							),
							array(
								'type' => 'post',
								'post_type' => 'event',
							),
							array(
								'type' => 'post',
								'post_type' => 'artwork',
							),
							array(
								'type' => 'post',
								'post_type' => 'award',
							),
							array(
								'type' => 'post',
								'post_type' => 'project',
							),
							// array(
							// 	'type' => 'term',
							// 	'taxonomy' => 'artist',
							// ),
						) )
						->set_duplicates_allowed( false )
						->set_max( 1 ),
				) ),
		) );

	add_filter( 'crb_media_buttons_html', function( $html, $field_name ) {
		if ( $field_name === 'bp_home_text' ) {
			return;
		}
		return $html;
	}, 10, 2);
		
}
