<?php
/**
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

require_once( plugin_dir_path( __FILE__ ) . 'includes/post-type-artwork.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-type-award.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-type-event.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-type-project.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-type-technique.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-type-post.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/taxonomy-artist.php' );
 
/**
 * Instantiate classes, creating post types
 */
new Artwork();
new Artist();
new Award();
new Event();
new Project();
new Technique();
new News();
