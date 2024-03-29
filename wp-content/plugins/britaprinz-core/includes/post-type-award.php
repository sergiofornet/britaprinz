<?php
class Award {
    /**
     * Register post type
     */
	private $type = 'award';

    public function register() {
        $labels = array(
			'name'					=> _x( 'Premio Carmen Arozena', 'Post Type General Name', 'britaprinz-core' ),
			'singular_name'			=> _x( 'Edición', 'Post Type Singular Name', 'britaprinz-core' ),
			'menu_name'				=> __( 'Premio Carmen Arozena', 'britaprinz-core' ),
			'name_admin_bar'		=> __( 'Premio Carmen Arozena', 'britaprinz-core' ),
			'archives'				=> __( 'Archivos de Premio Carmen Arozena', 'britaprinz-core' ),
			'attributes'			=> __( 'Atributos de edición', 'britaprinz-core' ),
			'parent_item_colon'		=> __( 'Edición', 'britaprinz-core' ),
			'all_items'				=> __( 'Todas las ediciones', 'britaprinz-core' ),
			'add_new_item'			=> __( 'Añadir edición', 'britaprinz-core' ),
			'add_new'				=> __( 'Añadir edición', 'britaprinz-core' ),
			'new_item'				=> __( 'Nueva edición', 'britaprinz-core' ),
			'edit_item'				=> __( 'Editar edición', 'britaprinz-core' ),
			'update_item'			=> __( 'Actualizar edición', 'britaprinz-core' ),
			'view_item'				=> __( 'Ver edición', 'britaprinz-core' ),
			'view_items'			=> __( 'Ver ediciones', 'britaprinz-core' ),
			'search_items'			=> __( 'Buscar edición', 'britaprinz-core' ),
			'not_found'				=> __( 'No se encontraron ediciones.', 'britaprinz-core' ),
			'not_found_in_trash'	=> __( 'Ninguna edición encontrada en la papelera.', 'britaprinz-core' ),
			'featured_image'		=> __( 'Imagen destacada', 'britaprinz-core' ),
			'set_featured_image'	=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'remove_featured_image'	=> __( 'Borrar imagen destacada', 'britaprinz-core' ),
			'use_featured_image'	=> __( 'Usar como imagen destacada', 'britaprinz-core' ),
			'insert_into_item'		=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'uploaded_to_this_item'	=> __( 'Añadido en esta edición', 'britaprinz-core' ),
			'items_list'			=> __( 'Listado de ediciones', 'britaprinz-core' ),
			'items_list_navigation'	=> __( 'Listado de ediciones', 'britaprinz-core' ),
			'filter_items_list'		=> __( 'Filtrar ediciones', 'britaprinz-core' ),
		);
		
		$args = array(
			'label'                 => __( 'Premio Carmen Arozena', 'britaprinz-core' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'description'			=> __( 'Exposiciones', 'britaprinz-core' ),
			'public'                => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-awards',
			'capability_type'       => 'page',
			'hierarchical'          => false,
			'has_archive'           => true,
			'can_export'            => true,
			'rewrite'            	=> array(
				'slug' => _x( 'premio-carmen-arozena/ganadores', 'URL slug: award', 'britaprinz-core'),
				'with_front' => false ),
			'show_in_rest'          => true,
		);
 
		register_post_type( $this->type, $args );
		
		flush_rewrite_rules();
    }
 
    /**
     * Award constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
 
        // Register the post type
        add_action( 'init', array( $this, 'register' ) );
 
    }
 
}