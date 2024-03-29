<?php
class Event {
    /**
     * Register post type
     */
	private $type = 'event';

    public function register() {
        $labels = array(
			'name'					=> _x( 'Exposiciones', 'Post Type General Name', 'britaprinz-core' ),
			'singular_name'			=> _x( 'Exposición', 'Post Type Singular Name', 'britaprinz-core' ),
			'menu_name'				=> __( 'Exposiciones', 'britaprinz-core' ),
			'name_admin_bar'		=> __( 'Exposición', 'britaprinz-core' ),
			'archives'				=> __( 'Archivos de exposición', 'britaprinz-core' ),
			'attributes'			=> __( 'Atributos de exposición', 'britaprinz-core' ),
			'parent_item_colon'		=> __( 'Exposición', 'britaprinz-core' ),
			'all_items'				=> __( 'Todas las exposiciones', 'britaprinz-core' ),
			'add_new_item'			=> __( 'Añadir exposición', 'britaprinz-core' ),
			'add_new'				=> __( 'Añadir exposición', 'britaprinz-core' ),
			'new_item'				=> __( 'Nueva exposición', 'britaprinz-core' ),
			'edit_item'				=> __( 'Editar exposición', 'britaprinz-core' ),
			'update_item'			=> __( 'Actualizar exposición', 'britaprinz-core' ),
			'view_item'				=> __( 'Ver exposición', 'britaprinz-core' ),
			'view_items'			=> __( 'Ver exposiciones', 'britaprinz-core' ),
			'search_items'			=> __( 'Buscar exposición', 'britaprinz-core' ),
			'not_found'				=> __( 'No se encontraron exposiciones.', 'britaprinz-core' ),
			'not_found_in_trash'	=> __( 'Ninguna exposición encontrada en la papelera.', 'britaprinz-core' ),
			'featured_image'		=> __( 'Imagen destacada', 'britaprinz-core' ),
			'set_featured_image'	=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'remove_featured_image'	=> __( 'Borrar imagen destacada', 'britaprinz-core' ),
			'use_featured_image'	=> __( 'Usar como imagen destacada', 'britaprinz-core' ),
			'insert_into_item'		=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'uploaded_to_this_item'	=> __( 'Añadido en esta exposición', 'britaprinz-core' ),
			'items_list'			=> __( 'Listado de exposiciones', 'britaprinz-core' ),
			'items_list_navigation'	=> __( 'Listado de exposiciones', 'britaprinz-core' ),
			'filter_items_list'		=> __( 'Filtrar exposiciones', 'britaprinz-core' ),
		);
		
		$args = array(
			'label'                 => __( 'Exposición', 'britaprinz-core' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'editor' ),
			'description'			=> __( 'Exposiciones', 'britaprinz-core' ),
			'public'                => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-calendar-alt',
			'capability_type'       => 'page',
			'hierarchical'          => false,
			// 'has_archive'           => true,
			'can_export'            => true,
			'rewrite'            	=> array(
				'slug' => _x( 'exposicion', 'URL slug: event', 'britaprinz-core'),
				'with_front' => false ),
			'show_in_rest'          => true,
		);
 
		register_post_type( $this->type, $args );
		
		flush_rewrite_rules();
    }
 
    /**
     * event constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
 
        // Register the post type
        add_action( 'init', array( $this, 'register' ) );
 
    }
 
}