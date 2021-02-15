<?php
/**
 * Lokura: Customizer
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

/**
 * Agrega soporte postMessage para las configuraciones del sitios por medio
 * del personalizador de temas
 *
 * @param WP_Customize_Manager $wp_customize Objeto del personalizador de temas.
 */

function reporte_indigo_customize_config( $wp_customize ) {

	/**
	 * Configuraciones del tema
	 */
	$wp_customize->add_panel( 
		'reporte_indigo_config_panel', 
		[
			'priority'    	=> 150,
			'capability'  	=> 'edit_theme_options',
			'title'       	=> __('Configuraciones', 'reporte_indigo'),
			'description' 	=> __('Configuraciones del tema', 'reporte_indigo')
		]
	);

	/**
	 * Configuración de imagenes
	 *
	 */
	$wp_customize->add_section( 
		'reporte_indigo_images_section', 
		[
			'title'      	=> __('Imágenes', 'reporte_indigo'),
			'priority'   	=> 1,
			'description'	=> __('Configuración para el manejo de imágenes', 'reporte_indigo'),
			'panel'      	=> 'reporte_indigo_config_panel',
			'capability' 	=> 'edit_theme_options'
		]
	);

	/**
	 * Agregar la configuración del control
	 *
	**/

	$wp_customize->add_setting( 
		'ri_images_original',
		[
			'type'          => 'theme_mod',
			'capability'    => 'edit_theme_options',
			'transport'     => 'refresh'
		]
	);

	/**
	 * Agregar el control
	 *
	**/

	$wp_customize->add_control( 
		'ri_images_original_control',
		[
			'label'   		=> __('Url del Cubo S3', 'reporte_indigo'),
			'description'	=> __('NOMBRECUBO.s3.REGION.amazonaws.com', 'reporte_indigo'),
			'section' 		=> 'reporte_indigo_images_section',
			'settings'		=> 'ri_images_original',
			'priority'		=> 1,
			'type'    		=> 'text'
		]
	);

	/**
	 * Agregar la configuración del control
	 *
	**/

	$wp_customize->add_setting( 
		'ri_images_replace',
		[
			'type'          => 'theme_mod',
			'capability'    => 'edit_theme_options',
			'transport'     => 'refresh'
		]
	);

	/**
	 * Agregar el control
	 *
	**/

	$wp_customize->add_control( 
		'ri_images_replace_control',
		[
			'label'   		=> __('URL de tu CDN', 'reporte_indigo'),
			'description'	=> __('SITEURL.com', 'reporte_indigo'),
			'section' 		=> 'reporte_indigo_images_section',
			'settings'		=> 'ri_images_replace',
			'priority'		=> 2,
			'type'    		=> 'text'
		]
	);


}

add_action( 'customize_register', 'reporte_indigo_customize_config' );
