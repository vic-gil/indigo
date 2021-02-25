<?php
/**
 * Reporte Indigo: Customizer
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

function reporte_indigo_customize_home( $wp_customize ) {

	/**
	 * Configuraciones del tema
	 */
	$wp_customize->add_panel( 
		'reporte_indigo_home_panel', 
		[
			'priority'    	=> 11,
			'capability'  	=> 'edit_theme_options',
			'title'       	=> __('Inicio', 'reporte_indigo'),
			'description' 	=> __('Configuraciones del inicio del tema', 'reporte_indigo')
		]
	);

	/**
	 * Configuración de home
	 *
	 */
	$wp_customize->add_section( 
		'reporte_indigo_home_section', 
		[
			'title'      	=> __('Inicio Superior Slide', 'reporte_indigo'),
			'priority'   	=> 1,
			'description'	=> __('Bloque tipo deslizador que se encuentra dentro del inicio del sitio, ubicado en la parte superior del mismo', 'reporte_indigo'),
			'panel'      	=> 'reporte_indigo_home_panel',
			'capability' 	=> 'edit_theme_options'
		]
	);

	/**
	 * Agregar donde se guardara la opción del control
	 *
	**/
	$wp_customize->add_setting( 
		'ri_home_top_setting',
		[
			'type'          	=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'reporte_indigo_sanitize_header_settings',
			'transport'     	=> 'refresh'
		]
	);

	$wp_customize->add_control( 
		new WP_Customize_RI_Control(
			$wp_customize,
			'ri_home_top_control',
			[
				'label' => __( 'Selecciona un post', 'mytheme' ),
				'section' => 'reporte_indigo_home_section',
				'settings' => 'ri_home_top_setting',
				'post_type' => 'page'
			]
		)
	);

}

add_action( 'customize_register', 'reporte_indigo_customize_home' );