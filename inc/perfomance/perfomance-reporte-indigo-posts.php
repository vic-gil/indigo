<?php

/**
 * Valida que post han sido seleccionados por el plugin
 *
 * @param string  $section Sección donde se ejecuta la acción
 * @param bool    $unique  El arreglo tendrá elementos únicos
 * @param bool    $sort    El arreglo tendrá un order ascendente
 *
 * @return array El arreglo con todas las entradas seleccionadas por el plugin
 *
**/

function reporte_indigo_exclude_posts( $section, $unique = true, $sort = true ) {

	$exclude = [];

	if($section === 'home') : 
		$option1 = unserialize( get_option("wp_front_home_top_ri") );
		$option2 = unserialize( get_option("wp_front_home_general_top_ri") );
		$option3 = unserialize( get_option("wp_front_home_reporte_ri") );
		$option4 = unserialize( get_option("wp_front_home_opinion_ri") );
		$option5 = unserialize( get_option("wp_front_home_seleccion_editor_ri") );

		$option1 = ( FALSE !== $option1 && is_array( $option1 ) ) ? $option1 : [];
		$option2 = ( FALSE !== $option2 && is_array( $option2 ) ) ? $option2 : [];
		$option3 = ( FALSE !== $option3 && is_array( $option3 ) ) ? $option3 : [];
		$option4 = ( FALSE !== $option4 && is_array( $option4 ) ) ? $option4 : [];
		$option5 = ( FALSE !== $option5 && is_array( $option5 ) ) ? $option5 : [];

		$option3_1 = array_key_exists('primary', $option3) ? $option3['primary'] : [];
		$option3_2 = array_key_exists('secondary', $option3) ? $option3['secondary'] : [];

		$exclude = array_merge($option1, $option2, $option3_1, $option3_2, $option4, $option5);
		
		if($unique)
			$exclude = array_unique($exclude, SORT_NUMERIC);

		if($sort)
			sort($exclude, SORT_NUMERIC);
	endif;
	
	return $exclude;
}

?>