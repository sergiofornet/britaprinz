<?php
/**
 * Plugin Name: Brita Prinz custom fields
 * Description: Custom fields for Brita Prinz site
 * Version: 1.0.0
 * Author: betty-symington
 * Author URI: https://betty-symington.xyz
 * Plugin URI: https://betty-symington.xyz
 * License: GPL2
 * Text Domain: britaprinz-custom-fields
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// General options custom fields
add_action( 'carbon_fields_register_fields', 'bp_general_options' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-general-options.php' );

// Home page custom fields
add_action( 'carbon_fields_register_fields', 'bp_home_fields' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-home-fields.php' );

// Artwork CPT custom fields
add_action( 'carbon_fields_register_fields', 'bp_artwork_fields' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-artwork-fields.php' );

// Expo CPT custom fields
add_action( 'carbon_fields_register_fields', 'bp_event_fields' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-event-fields.php' );

// Award CPT custom fields
add_action( 'carbon_fields_register_fields', 'bp_award_fields' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-award-fields.php' );

// Technique CPT custom fields
add_action( 'carbon_fields_register_fields', 'bp_technique_fields' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-technique-fields.php' );

// Artist taxonomy custom fields
add_action( 'carbon_fields_register_fields', 'bp_artist_fields' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/britaprinz-artist-fields.php' );


add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( ABSPATH . '/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}