<?php
/**
 * Reporte_Indigo_Post_Types Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee diferentes post types para el tema
 * 
**/

class Reporte_Indigo_Post_Types {

	private $name;
	private $slug;
	private $supports;
	private $post_type;
	private $icon;

	public function __construct(?string $name = null, ?string $slug = null, ?string $post_type = null, ?string $icon = 'dashicons-admin-post', ?array $supports = ['title', 'editor', 'thumbnail', 'excerpt', 'author']) {
		$this->icon = $icon;
		$this->name = $name;
		$this->slug = $slug;
		$this->supports = $supports;
		$this->post_type = $post_type;
	}

	/**
	 * Función que crea el tipo de entrada
	 *
	**/

	function create_taxonomy () {
		
		$labels = [
			'name' 			=> $this->name,
			'singular_name' => $this->name,
			'add_new'       => 'Nuevo artículo ' . $this->name,
			'add_new_item'  => 'Nuevo artículo ' . $this->name,
			'edit_item'  	=> 'Editar artículo ' . $this->name,
			'new_item'      => 'Nuevo artículo ' . $this->name,
			'all_items'     => 'Todos',
			'view_item'     => 'Ver artículos ' . $this->name,
			'search_items'  => 'Buscar artículos ' . $this->name,
			'not_found'     => 'No se encontró',
			'menu_name'     => $this->name
		];

		$args = [
			'labels'				=> $labels,
			'public'             	=> true,
			'publicly_queryable' 	=> true,
			'query_var'          	=> true,
			'rewrite'            	=> [ 'slug' => $this->slug ],
			'has_archive'        	=> true,
			'menu_position'      	=> 5,
			'show_in_rest'		 	=> true,
			'rest_base'          	=> $this->slug,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           	=> $this->supports,
			'menu_icon'				=> $this->icon
		];

		register_post_type($this->post_type, $args);

	}

}