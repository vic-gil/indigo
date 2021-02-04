<?php
/**
 * Javascript Loader Class
 *
 * Habilita `async` y `defer` mientras registras un archivo Javascript.
 *
 * Basado en la solución de WP Rig.
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

if ( ! class_exists( 'Reporte_indigo_script_loader' ) ) {
	/**
	 * A class that provides a way to add `async` or `defer` attributes to scripts.
	 */
	class Reporte_indigo_script_loader {

		/**
		 * Agrega los atributos async/defer a los scripts registrados
		 *
		 * @link https://core.trac.wordpress.org/ticket/12009
		 *
		 * @param string $tag    El script de la etiqueta.
		 * @param string $handle El script del manejador.
		 * @return string Script Cadena HTML.
		 */
		public function filter_script_loader_tag( $tag, $handle ) {
			foreach ( [ 'async', 'defer' ] as $attr ) {
				if ( ! wp_scripts()->get_data( $handle, $attr ) )
					continue;

				// Previene añadir el atributo cuando ay está añadido
				if ( ! preg_match( ":\s$attr(=|>|\s):", $tag ) ) {
					$tag = preg_replace( ':(?=></script>):', " $attr", $tag, 1 );
				}
				// Sólo permite `async` o `defer`, no ambos
				break;
			}
			return $tag;
		}

	}
}
