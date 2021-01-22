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
require get_template_directory() . '/classes/class-reporte-indigo-script-loader.php';
require get_template_directory() . '/classes/embed/class-reporte-indigo-oembed.php';

function reporte_indigo_setup() {

	/*
	 * Agrega tres menús dinamicos accesible por 
	 * medio del personalizador
	 *
	 */

	register_nav_menus([
		'header' => __( 'Cabecera', 'reporte_indigo' ),
		'help' 	 => __( 'Ayuda', 'reporte_indigo' ),
		'sites'  => __( 'Sitios del grupo', 'reporte_indigo' )
	]);

	/*
	 * Agrega soporte de `async` y `defer` para scripts 
	 * registrados o en cola por el tema
	 *
	 */

	$loader = new Reporte_indigo_script_loader();
	add_filter( 'script_loader_tag', [ $loader, 'filter_script_loader_tag' ], 10, 2 );
}

add_action( 'after_setup_theme', 'reporte_indigo_setup' );
?>
