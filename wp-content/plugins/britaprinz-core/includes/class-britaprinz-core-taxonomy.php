<?php

/**
 * Register new custom taxonomies
 *
 * @link       https://betty-symington.xyz
 * @since      1.0.0
 *
 * @package    Britaprinz_Core
 * @subpackage Britaprinz_Core/includes
 */

/**
 *
 * @package    Britaprinz_Core
 * @subpackage Britaprinz_Core/includes
 * @author     Your Name <email@example.com>
 */

class Britaprinz_Core_Taxonomy {

	private $taxonomy;
	private $args;

	public function __construct( $taxonomy, $post_type, $args = []  ) {
		$this->taxonomy = $taxonomy;
		$this->post_type = $post_type;
		$this->args = $args;
	}

	public function get_taxonomy() {
		return $this->taxonomy;
	}

	public function get_args() {
		return $this->args;
	}

	public function register_tax() {
		register_taxonomy( $this->taxonomy, $this->post_type, $this->args );
		flush_rewrite_rules();
	}

	public function unregister_tax() {
		unregister_taxonomy( $this->taxonomy );
	}

}