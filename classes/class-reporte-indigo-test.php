<?php
/**
 * Clase Templates
 *
 * Plantillas para pruebas
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

if ( ! class_exists( 'Reporte_indigo_test' ) ) {
	
	/**
	 * Una clase que proveé diferentes metodos para ayudar en la depuración de código
	 */

	class Reporte_indigo_test{

		/**
		 * log message
		 *
		 * @param string $msg 	String message
		 * @return void
		 */
		public static function log($msg) {
			if( WP_DEBUG === true ) 
				echo '<!-- ERROR: "' . $msg . '" -->';
			
			error_log($msg);
		}

		/**
		 * log message
		 *
		 * @param string $msg 	String message
		 * @return void
		 */
		public static function comment($msg) {
			if( WP_DEBUG === true ) 
				echo '<!-- ' . $msg . '" -->';
		}

	}

}