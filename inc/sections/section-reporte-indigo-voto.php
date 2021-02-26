<?php
/**
 * Class RI_Section_Valor_Voto
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

class Reporte_Indigo_Section_Voto {

	static function create_post_type() {
		$voto = new Reporte_Indigo_Post_Types('El valor del voto', 'voto', 'ri-voto', 'dashicons-id');
		$voto->create_post_type();
	}

	static function add_post_type($post_types) {
		return $available_post_type[] = 'ri-voto';
	}

}

add_action( 'init', ['Reporte_Indigo_Section_Voto', 'create_post_type'] );
add_filter( 'ri_add_jwplayer_in_post_type', ['Reporte_Indigo_Section_Voto', 'add_post_type']);
add_filter( 'ri_add_read_time_in_post_type', ['Reporte_Indigo_Section_Voto', 'add_post_type']);
add_filter( 'ri_add_taxonomy_tema_in_post_type', ['Reporte_Indigo_Section_Voto', 'add_post_type']);