<?php
class Artwork {
    /**
     * Register post type
     */
	private $type = 'artwork';

    public function register() {
        $labels = array(
			'name'					=> _x( 'Colección', 'Post Type General Name', 'britaprinz-core' ),
			'singular_name'			=> _x( 'Obra', 'Post Type Singular Name', 'britaprinz-core' ),
			'add_new'				=> __( 'Añadir obra', 'britaprinz-core' ),
			'add_new_item'			=> __( 'Añadir obra', 'britaprinz-core' ),
			'edit_item'				=> __( 'Editar obra', 'britaprinz-core' ),
			'new_item'				=> __( 'Nueva obra', 'britaprinz-core' ),
			'view_item'				=> __( 'Ver obra', 'britaprinz-core' ),
			'view_items'			=> __( 'Ver colección', 'britaprinz-core' ),
			'search_items'			=> __( 'Buscar obra', 'britaprinz-core' ),
			'not_found'				=> __( 'No se encontraron obras.', 'britaprinz-core' ),
			'not_found_in_trash'	=> __( 'Ninguna obra encontrada en la papelera.', 'britaprinz-core' ),
			'parent_item_colon'		=> __( 'Obra', 'britaprinz-core' ),
			'all_items'				=> __( 'Todas las obras', 'britaprinz-core' ),
			'archives'				=> __( 'Archivos de obra', 'britaprinz-core' ),
			'attributes'			=> __( 'Atributos de obra', 'britaprinz-core' ),
			'insert_into_item'		=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'uploaded_to_this_item'	=> __( 'Añadido en esta obra', 'britaprinz-core' ),
			'featured_image'		=> __( 'Imagen destacada', 'britaprinz-core' ),
			'set_featured_image'	=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'use_featured_image'	=> __( 'Usar como imagen destacada', 'britaprinz-core' ),
			'remove_featured_image'	=> __( 'Borrar imagen destacada', 'britaprinz-core' ),
			'menu_name'				=> __( 'Colección', 'britaprinz-core' ),
			'filter_items_list'		=> __( 'Filtrar obras', 'britaprinz-core' ),
			'items_list_navigation'	=> __( 'Listado de obras', 'britaprinz-core' ),
			'items_list'			=> __( 'Listado de obras', 'britaprinz-core' ),
			'name_admin_bar'		=> __( 'Obra', 'britaprinz-core' ),
			'update_item'			=> __( 'Actualizar obra', 'britaprinz-core' ),
		);
		
		$args = array(
			'label'                 => __( 'Obra', 'britaprinz-core' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'taxonomies'			=> array( 'artist' ),
			'description'			=> __( 'Obras de la colección', 'britaprinz-core' ),
			'public'                => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-images-alt',
			'capability_type'       => 'page',
			'hierarchical'          => true,
			'has_archive'           => true,
			'can_export'            => true,
			'rewrite'            	=> array(
				'slug' => _x( 'coleccion/artistas-obras', 'britaprinz-core'),
				'with_front' => false ),
			'show_in_rest'          => true,
			'rest_base'             => 'artwork',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		);

		add_rewrite_tag( '%display_artist%', '([^&]+)' );
		add_rewrite_rule(
			'^' . __( 'coleccion/artistas-obras', 'britaprinz-core') . '/([^/]*)/?$',
			'index.php?post_type=artwork&display_artist=$matches[1]',
			'top');
 
		register_post_type( $this->type, $args );
		
		flush_rewrite_rules();
    }
 
    /**
     * Artwork constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
 
        // Register the post type
        add_action( 'init', array( $this, 'register' ) );
 
    }
 
}