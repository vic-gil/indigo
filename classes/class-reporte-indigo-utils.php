<?php
/**
 * Clase Reporte_Indigo_Utils
 *
 * Utilerias del tema
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

if ( ! class_exists( 'Reporte_Indigo_Utils' ) ) {
	
	/**
	 * Una clase que proveé diferentes metodos para funciones especificas de código
	 */

	class Reporte_Indigo_Utils{

		/**
		 * Compara si la hora actual está entre dos horarios y arroja un código
		 *
		 * @param Array $schedule 	Array de un horario
		 *
		 * @return string|bool El código del elemento multimedia o falso si no coincide
		 */

		public static function get_live_code($schedule) {
			$code = false;
			$weekday = current_time('w');

			if( array_key_exists( $weekday, $schedule ) ) {
				
				if( is_array( $schedule[$weekday] ) ) {
					$current_time = current_time('His');
					
					foreach ( $schedule[$weekday] as $show ) {
						$start = str_replace( ':', '', $show['start'] );
						$end = str_replace( ':', '', $show['end'] );
						
						if( $start <= $current_time && $end >= $current_time ) {
							$title = $show['title'];
							preg_match('/embed\/([^"]+)"/', $show['embed'], $match);
							$code = [ 'code' => $match[1], 'title' => $show['title'], 'description' => $show['description'] ];
							break;
						}

					}

				}

			}

			return $code;
		}

	}

}
