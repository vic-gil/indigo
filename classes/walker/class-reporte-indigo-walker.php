<?php
/**
 * Reporte_Indigo_Walker Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee una edición del walker
 * 
**/
class Reporte_Indigo_Walker extends Walker_Category_Checklist {
	
	/* 
	 * Una funcion que provee un listado de elementos
	 * sólo funciona con el editor clásico
	 * y deshabilitando el editor rápido
	 *
	 * @param array $elements  Un arreglo de elementos.
     * @param int   $max_depth La máxima profundidad jerarquica.
     * @param mixed ...$args   Argumentos opcionales.
     *
     * @return string La salida de la lista jerarquica
	**/
	function walk( $elements, $max_depth, ...$args ) {
		$output = parent::walk( $elements, $max_depth, ...$args ); // La función walk heredada del objeto Walker
		
		$selected = func_get_arg(2); // La segunda función contiene los datos guardados
		if( empty( $selected['selected_cats'] ) ) { // Revisamos que no tenga un valor
			$term = get_term_by("slug", "nacional", "ri-ciudad"); // Seleccionamos el termino por defecto
			$default = $term->term_id;
			$output = str_replace(
				['value="' . $default . '"', "value='" . $default . "'"],
				['value="' . $default . '" checked', "value='" . $default . "' checked"],
				$output
			);
		}

		$output = str_replace(
			['type="checkbox"', "type='checkbox'"],
			['type="radio"', "type='radio'"],
            $output
		);

		// $output = str_replace(
		// 	'input value="' . $default->term_id . '"',
		// 	'input checked value="' . $default->term_id . '"',
  //           $output
  //       );

		return $output;
	}

}

?>