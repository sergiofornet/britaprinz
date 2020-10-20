<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bp_general_options() {
	Container::make( 'theme_options', __( 'Opciones generales', 'britaprinz-custom-fields' ) )
		->add_tab( __( 'Opciones generales' ), array(
			Field::make( 'image', 'bp_theme_logo', __( 'Logo', 'britaprinz-custom-fields' ) )
						->set_type( array( 'image' ) ),
			Field::make( 'textarea', 'bp_theme_textarea' . crb_get_i18n_suffix(), 'Text Area' ),
			Field::make( 'textarea', 'bp_theme_contact', __( 'Contacto', 'britaprinz-custom-fields' ) ),
		) )
		->add_tab( __( 'Social' ), array(
			Field::make( 'complex', 'bp_theme_social', __( 'Social', 'britaprinz-custom-fields' ) )
				->add_fields( array(
					Field::make( 'text', 'bp_theme_social_label', __( 'Título', 'britaprinz-custom-fields' ) )
						->set_width( 50 ),
					Field::make( 'text', 'bp_theme_social_url', 'URL' )
						->set_width( 50 )
						->set_required(),
				) ),
		) );
}