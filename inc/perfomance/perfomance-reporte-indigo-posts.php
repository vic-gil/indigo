<?php

function reporte_indigo_exclude_posts( $section, $unique = true, $sort = true ) {

	$exclude = [];

	if($section === 'home') : 
		$option1 = unserialize( get_option("wp_front_home_top_ri") );
		$option2 = unserialize( get_option("wp_front_home_general_top_ri") );
		$option3 = unserialize( get_option("wp_front_home_reporte_ri") );
		$option4 = unserialize( get_option("wp_front_home_opinion_ri") );
		$option5 = unserialize( get_option("wp_front_home_seleccion_editor_ri") );

		$exclude = array_merge($option1, $option2, $option3['primary'], $option3['secondary'], $option4, $option5);
		
		if($unique)
			$exclude = array_unique($exclude, SORT_NUMERIC);

		if($sort)
			sort($exclude, SORT_NUMERIC);
	endif;
	
	return $exclude;
}

?>