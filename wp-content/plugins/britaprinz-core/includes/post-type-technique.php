<?php
class Technique {
	
	/**
	 * Register post type
     */
	private $type = 'technique';

    public function register() {
        $labels = array(
			'name'					=> _x( 'Técnicas de grabado', 'Post Type General Name', 'britaprinz-core' ),
			'singular_name'			=> _x( 'Técnica', 'Post Type Singular Name', 'britaprinz-core' ),
			'menu_name'				=> __( 'Técnicas de grabado', 'britaprinz-core' ),
			'name_admin_bar'		=> __( 'Técnica de grabado', 'britaprinz-core' ),
			'archives'				=> __( 'Archivos de técnicas de grabado', 'britaprinz-core' ),
			'attributes'			=> __( 'Atributos de técnica', 'britaprinz-core' ),
			'parent_item_colon'		=> __( 'Técnica', 'britaprinz-core' ),
			'all_items'				=> __( 'Todas las técnicas', 'britaprinz-core' ),
			'add_new_item'			=> __( 'Añadir técnica', 'britaprinz-core' ),
			'add_new'				=> __( 'Añadir técnica', 'britaprinz-core' ),
			'new_item'				=> __( 'Nueva técnica', 'britaprinz-core' ),
			'edit_item'				=> __( 'Editar técnica', 'britaprinz-core' ),
			'update_item'			=> __( 'Actualizar técnica', 'britaprinz-core' ),
			'view_item'				=> __( 'Ver técnica', 'britaprinz-core' ),
			'view_items'			=> __( 'Ver técnicas', 'britaprinz-core' ),
			'search_items'			=> __( 'Buscar técnica', 'britaprinz-core' ),
			'not_found'				=> __( 'No se encontraron técnicas.', 'britaprinz-core' ),
			'not_found_in_trash'	=> __( 'Ninguna técnica encontrada en la papelera.', 'britaprinz-core' ),
			'featured_image'		=> __( 'Imagen destacada', 'britaprinz-core' ),
			'set_featured_image'	=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'remove_featured_image'	=> __( 'Borrar imagen destacada', 'britaprinz-core' ),
			'use_featured_image'	=> __( 'Usar como imagen destacada', 'britaprinz-core' ),
			'insert_into_item'		=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'uploaded_to_this_item'	=> __( 'Añadido en esta técnica', 'britaprinz-core' ),
			'items_list'			=> __( 'Listado de técnicas', 'britaprinz-core' ),
			'items_list_navigation'	=> __( 'Listado de técnicas', 'britaprinz-core' ),
			'filter_items_list'		=> __( 'Filtrar técnicas', 'britaprinz-core' ),
		);
		
		$args = array(
			'label'                 => __( 'Técnicas de grabado', 'britaprinz-core' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'genesis-cpt-archives-settings' ),
			'description'			=> __( 'Técnicas', 'britaprinz-core' ),
			'public'                => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-art',
			'capability_type'       => 'page',
			'hierarchical'          => true,
			'has_archive'           => true,
			'can_export'            => true,
			'rewrite'            	=> array(
				'slug' => _x( 'tecnicas', 'britaprinz-core'),
				'with_front' => false ),
			'show_in_rest'          => true,
		);
 
		register_post_type($this->type, $args );
		
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