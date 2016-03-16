<?php
	/**
	 * Creación de custom post type (lugares), utiliza la función propia register_custom_types(), que se encarga de registrar en Wordpress el nuevo post type
	 * https://codex.wordpress.org/Function_Reference/register_post_type
	 */
	function custom_types() {
    //Arreglo de dos dimensiones con las opciones de todos los post type a crear
		$post_types = array(
      array(
        'name' => 'portfolio',
				'general_name' => 'Portfolio',
				'singular_name' => 'portfolio',
				'sufix_min' => '',
				'gen_conector' => 'the',
				'level' => 0,
				'exclude_from_search' => false,
				'supports' => array(
					'title',
          'editor',
          'author',
          'thumbnail',
          'comments'
				),
				'icon' => 'dashicons-awards',
				'has_fields' => true,
				'has_tax' => true,
				'has_front' => true,
				'rewrite' => true
      ),
		);
		register_custom_post_types($post_types, 'en');
	}
	add_action('init', 'custom_types');

?>
