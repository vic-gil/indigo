<?php
/**
 * Reporte Indigo funciones y definiciones
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

/**
 * Reporte Indigo trabaja únicamente con Wordpress 4.7 o superior.
 */

require get_template_directory() . '/classes/class-reporte-indigo-test.php';
require get_template_directory() . '/classes/class-reporte-indigo-templates.php';
require get_template_directory() . '/classes/embed/class-reporte-indigo-oembed.php';

/*
 * Se crean tres secciones para menús
 *
 */
function reporte_indigo_setup() {
	register_nav_menus([
		'header' => __( 'Cabecera', 'reporte_indigo' ),
		'help' 	 => __( 'Ayuda', 'reporte_indigo' ),
		'sites'  => __( 'Sitios del grupo', 'reporte_indigo' )
	]);	
}

add_action( 'after_setup_theme', 'reporte_indigo_setup' );
?>
