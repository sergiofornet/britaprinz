<?php
class Artist {
	
	/**
	 * Register post type
     */
	private $taxonomy = 'artist';

    public function register() {
        $labels = array(
			'name'							=> _x( 'Artistas', 'Taxonomy General Name', 'britaprinz-core' ),
			'singular_name'					=> _x( 'Artista', 'Taxonomy Singular Name', 'britaprinz-core' ),
			'menu_name'						=> __( 'Artistas', 'britaprinz-core' ),
			'all_items'						=> __( 'Todos los artistas', 'britaprinz-core' ),
			'new_item_name'					=> __( 'Nuevo artista', 'britaprinz-core' ),
			'add_new_item'					=> __( 'Añadir artista', 'britaprinz-core' ),
			'edit_item'						=> __( 'Editar artista', 'britaprinz-core' ),
			'update_item'					=> __( 'Actualizar artista', 'britaprinz-core' ),
			'view_item'						=> __( 'Ver artista', 'britaprinz-core' ),
			'separate_items_with_commas'	=> __( 'Separa los artistas con comas', 'britaprinz-core' ),
			'add_or_remove_items'			=> __( 'Añade o elimina artistas', 'britaprinz-core' ),
			'choose_from_most_used'			=> __( 'Elige un artista', 'britaprinz-core' ),
			'popular_items'					=> __( 'Artistas comunes', 'britaprinz-core' ),
			'search_items'					=> __( 'Buscar artista', 'britaprinz-core' ),
			'not_found'						=> __( 'No se encontraron artistas.', 'britaprinz-core' ),
			'no_terms'						=> __( 'No existen artistas.', 'britaprinz-core' ),
			'items_list'					=> __( 'Listado de artistas', 'britaprinz-core' ),
			'items_list_navigation'			=> __( 'Listado de artistas', 'britaprinz-core' ),
		);
		
		$args = array(
			'labels'			=> $labels,
			'hierarchical'		=> false,
			'show_ui'			=> true,
			'show_admin_column'	=> true,
			'show_in_nav_menus'	=> true,
			'public'			=> true,
			'show_in_rest'		=> true,
			'hierarchical' 		=> true, 
			'rewrite' 			=> array(
				'slug' => _x( 'coleccion/artistas', 'britaprinz-core'),
				'with_front' => false ),
		);
 
		register_taxonomy($this->taxonomy, 'artwork', $args);
		
		flush_rewrite_rules();
    }
 
    /**
     * Technique constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
 
        // Register the post type
        add_action( 'init', array( $this, 'register' ) );
 
    }
 
}