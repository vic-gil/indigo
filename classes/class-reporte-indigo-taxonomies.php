<?php
/**
 * Reporte_Indigo_Taxonomies Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee diferentes taxonomías para el tema
 * 
**/

class Reporte_Indigo_Taxonomies {
	
	static function ri_custom() {
		self::ri_ciudad();
		self::ri_tema();
		self::ri_columna();
		self::ri_categoria();
	}

	static function ri_ciudad() {
		
		$labels = [
			'name'              => 'Ciudad',
			'singular_name'     => 'Ciudad',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar ciudad',
			'update_item'       => 'Actualizar ciudad',
			'add_new_item'      => 'Nueva ciudad',
			'menu_name'         => 'Ciudad'
		];

		$args = [
			'labels'            	=> $labels,
			'hierarchical'      	=> true,
			'show_ui'           	=> true,
			'show_admin_column' 	=> true,
			'show_in_nav_menus' 	=> true,
			'query_var'         	=> true,
			'show_in_rest'      	=> true,
			'rewrite'           	=> ['slug' => 'ciudad'],
			'show_in_quick_edit' 	=> false,
			'capabilities' 			=> [
				'edit_terms'   	=> 'god',
				'manage_terms' 	=> 'god',
				'delete_terms' 	=> 'god',
				'assign_terms' 	=> 'edit_posts'
			]
		];

		register_taxonomy('ri-ciudad', 'ri-reporte', $args);

		$terms =[
			"NACIONAL",
			"CDMX",
			"MTY",
			"GDL",
			"AGS",
			"BCN",
			"BCS",
			"CAM",
			"CHIS",
			"CHIH",
			"COAH",
			"COL",
			"DGO",
			"GTO",
			"GRO",
			"HGO",
			"JAL",
			"EDOMÉX",
			"MICH",
			"MOR",
			"NAY",
			"NL",
			"OAX",
			"PUE",
			"QRO",
			"ROO",
			"SLP",
			"SIN",
			"SON",
			"TAB",
			"TAM",
			"TLX",
			"VER",
			"YUC",
			"ZAC"
		];

		foreach ( $terms as $kt => $t ) {
			$term = term_exists($t, 'ri-ciudad');

			if ( FALSE !== $term && NULL !== $term ) 
				continue;

			wp_insert_term($t, 'ri-ciudad');
		}
		
	}

	static function ri_tema(){
		$post_types = array(
			'ri-reporte',
			'ri-opinion',
			'ri-latitud',
			'ri-indigonomics',
			'ri-piensa',
			'ri-fan',
			'ri-desglose',
			'ri-documento-indigo',
			'ri-salida-emergencia',
			'ri-especial'
		);

		if(!taxonomy_exists('ri-tema')){
			$labels = array(
				'name'              => 'Tema',
				'singular_name'     => 'Tema',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tema',
				'update_item'       => 'Actualizar tema',
				'add_new_item'      => 'Nuevo tema',
				'menu_name'         => 'Tema'
			);

			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'tema' ),
			);

			register_taxonomy('ri-tema', $post_types, $args);
		}
	}

	static function ri_jerarquia(){
		$post_types = array(
			'ri-reporte',
			'ri-fan',
			'ri-indigonomics',
			'ri-latitud',
			'ri-piensa',
		);

		if(!taxonomy_exists('ri-jerarquia')){
			$labels = array(
				'name'              => 'Jerarquía',
				'singular_name'     => 'Jerarquía',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar jerarquía',
				'update_item'       => 'Actualizar jerarquía',
				'add_new_item'      => 'Nueva jerarquía',
				'menu_name'         => 'Jerarquía'
			);
			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'jerarquia' ),
			);

			register_taxonomy('ri-jerarquia', $post_types, $args);

			$jerarquias = array(
				'Primaria',
				'Secundaria'
			);
			ri_add_taxonomy_terms( $jerarquias, 'ri-jerarquia' );
		}
	}

	static function ri_columna(){
		if(!taxonomy_exists('ri-opinion')){
			$labels = array(
				'name'              => 'Columna',
				'singular_name'     => 'Columna',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar columna',
				'update_item'       => 'Actualizar columna',
				'add_new_item'      => 'Nueva columna',
				'menu_name'         => 'Columna'
			);

			$args 	= array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'show_in_rest'		=> true,
				'rewrite'           => array( 'slug' => 'columna' ),
			);

			register_taxonomy('ri-columna', 'ri-opinion', $args);

			$terms = array(
				'Puntos sobre las íes',
				'Desde mi palco',
				'Redes de poder',
				'Redes Monterrey',
				'Tabla rasa',
				'Índira Kempis',
				'Cable Rojo',
				'Celuloide',
				'Cinfila',
			);

			foreach ($terms as $kt => $t) {
				$term 	= term_exists($t, 'ri-columna');

				if (FALSE !== $term && NULL !== $term) 
					continue;

				wp_insert_term($t, 'ri-columna');
			}
		}
	}

	static function ri_categoria(){
		if(!taxonomy_exists('ri-piensa')){
			$labels 	= array(
				'name'              => 'Categoría',
				'singular_name'     => 'Categoría',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar categoria',
				'update_item'       => 'Actualizar categoria',
				'add_new_item'      => 'Nueva categoria',
				'menu_name'         => 'Categoría'
			);

			$args 		= array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'categoria' ),
				'capabilities'      => array(
					'assign_terms' 	=> 'manage_options',
					'edit_terms'   	=> 'god',
					'manage_terms' 	=> 'god',
				)
			);

			register_taxonomy('ri-categoria', 'ri-piensa', $args);

			$terms = array(
				'Salud', 
				'Ciencia y Tecnología', 
				'Libros', 
				'Música', 
				'Arte', 
				'Entretenimiento', 
				'Innovación', 
				'Sustentabilidad', 
				'Wiken',
				'EnfoqueIndigo'
			);

			foreach ($terms as $kt => $t) {
				$term 	= term_exists($t, 'ri-categoria');

				if (FALSE !== $term && NULL !== $term) 
					continue;

				wp_insert_term($t, 'ri-categoria');
			}
		}
	}
}

add_action( 'init', array('Reporte_Indigo_Taxonomies', 'ri_custom'), 0 );
?>