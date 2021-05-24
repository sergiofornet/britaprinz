<?php
class News {
    /**
     * Modify default post type 'Post' labels
     */

	public function britaprinz_modify_post_label() {
		global $menu;
		global $submenu;

		$menu[5][0] = 'Noticias';
		$submenu['edit.php'][5][0] = __( 'Noticias', 'britaprinz-core' );
		$submenu['edit.php'][10][0] = __( 'Añadir noticias', 'britaprinz-core' );
		$submenu['edit.php'][16][0] = __( 'Etiquetas de noticias', 'britaprinz-core' );
	}
	
	public function britaprinz_modify_post_object() {
		global $wp_post_types;

		$labels = &$wp_post_types['post']->labels;
		$labels->name = _x( 'Noticias', 'britaprinz-core' );
		$labels->singular_name = _x( 'Noticia', 'britaprinz-core' );
		$labels->add_new = __( 'Añadir noticias', 'britaprinz-core' );
		$labels->add_new_item = __( 'Añadir noticias', 'britaprinz-core' );
		$labels->edit_item = __( 'Editar noticias', 'britaprinz-core' );
		$labels->new_item = __( 'Noticias', 'britaprinz-core' );
		$labels->view_item = __( 'Ver noticia', 'britaprinz-core' );
		$labels->view_items = __( 'Ver noticias', 'britaprinz-core' );
		$labels->search_items = __( 'Buscar noticias', 'britaprinz-core' );
		$labels->not_found = __( 'No se encontraron noticias', 'britaprinz-core' );
		$labels->not_found_in_trash = __( 'No se encontraron noticias en la papelera', 'britaprinz-core' );
		$labels->all_items = __( 'Todas las noticias', 'britaprinz-core' );
		$labels->archives = __( 'Archivo de noticias', 'britaprinz-core' );
		$labels->menu_name = __( 'Noticias', 'britaprinz-core' );
		$labels->name_admin_bar = __( 'Noticias', 'britaprinz-core' );
		$labels->attributes = __( 'Atributos de noticias', 'britaprinz-core' );
		$labels->insert_into_item = __( 'Insertar en la noticia', 'britaprinz-core' );
		$labels->uploaded_to_this_item = __( 'Subido a esta noticia', 'britaprinz-core' );
		$labels->filter_items_list = __( 'Filtrar noticias', 'britaprinz-core' );
		$labels->item_published = __( 'Noticia publicada', 'britaprinz-core' );
		$labels->item_published_privately = __( 'Noticia publicada en privado', 'britaprinz-core' );
		$labels->item_reverted_to_draft = __( 'Noticia publicada como borrador', 'britaprinz-core' );
		$labels->item_scheduled = __( 'Noticia programada', 'britaprinz-core' );
		$labels->item_updated = __( 'Noticia actuallizada', 'britaprinz-core' );
	}
 
    /**
     * News constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
 
        // Modify Posts labels
		add_action( 'admin_menu', array( $this, 'britaprinz_modify_post_label') );
		add_action( 'init', array( $this, 'britaprinz_modify_post_object' ) );
    }
 
}
