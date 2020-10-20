<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://betty-symington.xyz
 * @since      1.0.0
 *
 * @package    Britaprinz_Core
 * @subpackage Britaprinz_Core/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Britaprinz_Core
 * @subpackage Britaprinz_Core/includes
 * @author     Your Name <email@example.com>
 */
class Britaprinz_Core {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Britaprinz_Core_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $britaprinz_core    The string used to uniquely identify this plugin.
	 */
	protected $britaprinz_core;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $post_types, $taxonomies ) {
		if ( defined( 'BRITAPRINZ_CORE_VERSION' ) ) {
			$this->version = BRITAPRINZ_CORE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->britaprinz_core = 'britaprinz-core';
		$this->post_types = $post_types;
		$this->taxonomies = $taxonomies;

		$this->load_dependencies();
		$this->set_locale();
		// $this->define_admin_hooks();
		// $this->define_public_hooks();
		$this->define_cpts();
		$this->define_taxonomies();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Britaprinz_Core_Loader. Orchestrates the hooks of the plugin.
	 * - Britaprinz_Core_i18n. Defines internationalization functionality.
	 * - Britaprinz_Core_Admin. Defines all hooks for the admin area.
	 * - Britaprinz_Core_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-britaprinz-core-loader.php';

		/**
		 * The class responsible for registering all the custom post types
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-britaprinz-core-cpt.php';
		
		/**
		 * The class responsible for registering all the taxonomies
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-britaprinz-core-taxonomy.php';
		
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-britaprinz-core-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-britaprinz-core-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-britaprinz-core-public.php';


		$this->loader = new Britaprinz_Core_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Britaprinz_Core_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Britaprinz_Core_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	// private function define_admin_hooks() {

	// 	$plugin_admin = new Britaprinz_Core_Admin( $this->get_britaprinz_core(), $this->get_version() );

	// 	$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
	// 	$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	// }

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	// private function define_public_hooks() {

	// 	$plugin_public = new Britaprinz_Core_Public( $this->get_britaprinz_core(), $this->get_version() );

	// 	$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
	// 	$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	// }

	/**
	 * Register all of the custom post types of the plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function define_cpts() {

		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-britaprinz-core-cpt.php';

		foreach ( $this->post_types as $post_type ) {
			if( ! post_type_exists( $post_type['post-type'] ) ) {
				$cpt = new Britaprinz_Core_Cpt( $post_type['post-type'], $post_type['args'] );

				$this->loader->add_action( 'init', $cpt, 'register_cpt' );
			}
		}

	}

	/**
	 * Register all of the taxonomies of the plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function define_taxonomies() {

		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-britaprinz-core-cpt.php';

		foreach ( $this->taxonomies as $taxonomy ) {
			if( ! taxonomy_exists( $taxonomy['taxonomy'] ) ) {
				$tax = new Britaprinz_Core_Taxonomy( $taxonomy['taxonomy'], $taxonomy['post_type'], $taxonomy['args'] );

				$this->loader->add_action( 'init', $tax, 'register_tax' );
			}
		}

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_britaprinz_core() {
		return $this->britaprinz_core;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Britaprinz_Core_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
