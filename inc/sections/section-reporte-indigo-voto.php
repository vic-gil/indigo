<?php
/**
 * Class RI_Section_Valor_Voto
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

class Reporte_Indigo_Section_Voto {

	static function create_taxonomy(){
		$post_types = array(
			'ri-reporte',
			'ri-opinion',
			'ri-latitud',
			'ri-indigonomics',
			'ri-piensa',
			'ri-desglose',
			'ri-documento-indigo',
			'ri-especial'
		);

		if( ! taxonomy_exists('ri-voto') ){
			$labels = array(
				'name'              => 'Valor del voto',
				'singular_name'     => 'Valor del voto',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar valor del voto',
				'update_item'       => 'Actualizar valor del voto',
				'add_new_item'      => 'Nuevo valor del voto',
				'menu_name'         => 'Valor del voto'
			);

			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'el-valor-del-voto' ),
			);

			register_taxonomy('ri-voto', apply_filters( 'ri_add_taxonomy_voto_in_post_type', $post_types ), $args);
		}
	}

	static function create_stylesheet() {
		$terms = wp_list_pluck( get_terms( 'ri-voto' ), 'term_id' );

		if( is_tax('ri-voto') && is_archive() )
			wp_enqueue_style( 'voto-style', get_stylesheet_directory_uri() . "/assets/css/voto.css", [], "20210408" );
	}

}

add_action( 'init', ['Reporte_Indigo_Section_Voto',  'create_taxonomy'], 0 );
add_action( 'get_footer', ['Reporte_Indigo_Section_Voto',  'create_stylesheet'] );
