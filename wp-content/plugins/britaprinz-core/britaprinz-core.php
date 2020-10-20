<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://betty-symington.xyz
 * @since             1.0.0
 * @package           Britaprinz_Core
 *
 * @wordpress-plugin
 * Plugin Name:       Brita Prinz Core
 * Plugin URI:        https://betty-symington.xyz/
 * Description:       Brita Prinz Arte core plugin
 * Version:           1.0.0
 * Author:            Betty Symington
 * Author URI:        https://betty-symington.xyz/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       britaprinz-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BRITAPRINZ_CORE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-britaprinz-core-activator.php
 */
function activate_britaprinz_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-britaprinz-core-activator.php';
	Britaprinz_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-britaprinz-core-deactivator.php
 */
function deactivate_britaprinz_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-britaprinz-core-deactivator.php';
	Britaprinz_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_britaprinz_core' );
register_deactivation_hook( __FILE__, 'deactivate_britaprinz_core' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-britaprinz-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_britaprinz_core() {
	require_once plugin_dir_path( __FILE__ ) . 'post-types/post-type-artwork.php';

	require_once plugin_dir_path( __FILE__ ) . 'post-types/post-type-project.php';

	require_once plugin_dir_path( __FILE__ ) . 'post-types/post-type-exhibition.php';

	require_once plugin_dir_path( __FILE__ ) . 'post-types/post-type-award.php';

	require_once plugin_dir_path( __FILE__ ) . 'post-types/post-type-technique.php';

	require_once plugin_dir_path( __FILE__ ) . 'taxonomies/taxonomy-artist.php';

	$plugin = new Britaprinz_Core( 
		array( 
			$artwork, 
			$project, 
			$exhibition, 
			$award, 
			$technique,
		), 
		array( $artist ) 
	);

	$plugin->run();

}

run_britaprinz_core();
