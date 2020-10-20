<?php

/**
 * Register new custom post types
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

class Britaprinz_Core_Cpt {

	private $post_type;
	private $args;

	public function __construct( $post_type, $args = [] ) {
		$this->post_type = $post_type;
		$this->args = $args;
	}

	public function get_post_type() {
		return $this->post_type;
	}

	public function get_args() {
		return $this->args;
	}

	public function register_cpt() {
		register_post_type( $this->post_type, $this->args );
		flush_rewrite_rules();
	}

	public function unregister_cpt() {
		unregister_post_type( $this->post_type );
	}

}