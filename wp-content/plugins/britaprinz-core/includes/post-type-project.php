<?php
class Project {
    /**
     * Register post type
     */
	private $type = 'project';

    public function register() {
        $labels = array(
			'name'					=> _x( 'Publicaciones y colaboraciones', 'Post Type General Name', 'britaprinz-core' ),
			'singular_name'			=> _x( 'Proyecto', 'Post Type Singular Name', 'britaprinz-core' ),
			'menu_name'				=> __( 'Publicaciones y colaboraciones', 'britaprinz-core' ),
			'name_admin_bar'		=> __( 'Proyecto', 'britaprinz-core' ),
			'archives'				=> __( 'Archivos de publicaciones y colaboraciones', 'britaprinz-core' ),
			'attributes'			=> __( 'Atributos de publicaciones y colaboraciones', 'britaprinz-core' ),
			'parent_item_colon'		=> __( 'Proyecto', 'britaprinz-core' ),
			'all_items'				=> __( 'Todos las proyectos', 'britaprinz-core' ),
			'add_new_item'			=> __( 'Añadir proyecto', 'britaprinz-core' ),
			'add_new'				=> __( 'Añadir proyecto', 'britaprinz-core' ),
			'new_item'				=> __( 'Nuevo proyecto', 'britaprinz-core' ),
			'edit_item'				=> __( 'Editar proyecto', 'britaprinz-core' ),
			'update_item'			=> __( 'Actualizar proyecto', 'britaprinz-core' ),
			'view_item'				=> __( 'Ver proyecto', 'britaprinz-core' ),
			'view_items'			=> __( 'Ver publicaciones y colaboraciones', 'britaprinz-core' ),
			'search_items'			=> __( 'Buscar proyectos', 'britaprinz-core' ),
			'not_found'				=> __( 'No se encontraron publicaciones o colaboraciones.', 'britaprinz-core' ),
			'not_found_in_trash'	=> __( 'Ningún proyecto encontrado en la papelera.', 'britaprinz-core' ),
			'featured_image'		=> __( 'Imagen destacada', 'britaprinz-core' ),
			'set_featured_image'	=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'remove_featured_image'	=> __( 'Borrar imagen destacada', 'britaprinz-core' ),
			'use_featured_image'	=> __( 'Usar como imagen destacada', 'britaprinz-core' ),
			'insert_into_item'		=> __( 'Establecer imagen destacada', 'britaprinz-core' ),
			'uploaded_to_this_item'	=> __( 'Añadido en este proyecto', 'britaprinz-core' ),
			'items_list'			=> __( 'Listado de proyectos', 'britaprinz-core' ),
			'items_list_navigation'	=> __( 'Listado de proyectos', 'britaprinz-core' ),
			'filter_items_list'		=> __( 'Filtrar proyectos', 'britaprinz-core' ),
		);
		
		$args = array(
			'label'                 => __( 'Proyecto', 'britaprinz-core' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'genesis-cpt-archives-settings' ),
			'description'			=> __( 'Proyectos', 'britaprinz-core' ),
			'public'                => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-book-alt',
			'capability_type'       => 'post',
			'hierarchical'          => false,
			'has_archive'           => true,
			'can_export'            => true,
			'rewrite'            	=> array(
				'slug' => _x( 'publicaciones', 'britaprinz-core'),
				'with_front' => false ),
			'show_in_rest'          => true,
		);
 
		register_post_type( $this->type, $args );
		
		flush_rewrite_rules();
    }
 
    /**
     * Project constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
 
        // Register the post type
        add_action( 'init', array( $this, 'register' ) );
 
    }
 
}