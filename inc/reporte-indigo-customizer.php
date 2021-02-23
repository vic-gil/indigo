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
	 * Configuración de cabecera
	 *
	 */
	$wp_customize->add_section( 
		'reporte_indigo_header_section', 
		[
			'title'      	=> __('Cabecera', 'reporte_indigo'),
			'priority'   	=> 1,
			'description'	=> __('Configuraciones que estarán en la cabecera', 'reporte_indigo'),
			'panel'      	=> 'reporte_indigo_config_panel',
			'capability' 	=> 'edit_theme_options'
		]
	);

	/**
	 * Sanitizador para cabeceras
	 *
	 * @param string $input  	Es la entrada que acepta la caja de texto
	 * @param string $setting 	Son las opciones definidas por el campo
	 *
	 * @return string Retorna la entrada con los valores aceptados
	 */
	function reporte_indigo_sanitize_header_settings($input, $setting) {
		$allowed_html = [
			'link' => [
				'rel' => [],
				'href' => [],
				'as' => [],
				'crossorigin' => []
			]
		];
		
		return wp_kses($input, $allowed_html);
	}

	/**
	 * Agregar donde se guardara la opción del control
	 *
	**/
	$wp_customize->add_setting( 
		'ri_custom_scripts',
		[
			'type'          	=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'reporte_indigo_sanitize_header_settings',
			'transport'     	=> 'refresh'
		]
	);

	$wp_customize->add_control( 
		'ri_custom_scripts_control',
		[
			'label'   	=> __('Scripts preload para la cabecera', 'reporte_indigo'),
			'section' 	=> 'reporte_indigo_header_section',
			'settings'	=> 'ri_custom_scripts',
			'priority'	=> 1,
			'type'    	=> 'textarea'
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
			'priority'   	=> 2,
			'description'	=> __('Configuración para el manejo de imágenes', 'reporte_indigo'),
			'panel'      	=> 'reporte_indigo_config_panel',
			'capability' 	=> 'edit_theme_options'
		]
	);

	/**
	 * Agregar donde se guardara la opción del control
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
			'label'   		=> __('URL original de las imágenes', 'reporte_indigo'),
			'description'	=> __('NOMBRECUBO.s3.REGION.amazonaws.com ó DOMAIN*.SITEURL+.com', 'reporte_indigo'),
			'section' 		=> 'reporte_indigo_images_section',
			'settings'		=> 'ri_images_original',
			'priority'		=> 1,
			'type'    		=> 'text'
		]
	);

	/**
	 * Agregar donde se guardara la opción del control
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
			'description'	=> __('DOMAIN*.SITEURL+.com', 'reporte_indigo'),
			'section' 		=> 'reporte_indigo_images_section',
			'settings'		=> 'ri_images_replace',
			'priority'		=> 2,
			'type'    		=> 'text'
		]
	);


	/**
	 * Configuración de videos de youtube
	 *
	 */
	$wp_customize->add_section( 
		'reporte_indigo_yt_section', 
		[
			'title'      	=> __('Videos de youtube', 'reporte_indigo'),
			'priority'   	=> 3,
			'description'	=> __('Configuración para el manejo de los videos de youtube', 'reporte_indigo'),
			'panel'      	=> 'reporte_indigo_config_panel',
			'capability' 	=> 'edit_theme_options'
		]
	);

	/**
	 * Agregar donde se guardara la opción del control
	 *
	**/

	$wp_customize->add_setting( 
		'ri_yt_video',
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
		'ri_yt_video_control',
		[
			'label'   		=> __('Comportamiento de los videos', 'reporte_indigo'),
			'description'	=> __('El video se carga...', 'reporte_indigo'),
			'section' 		=> 'reporte_indigo_yt_section',
			'settings'		=> 'ri_yt_video',
			'priority'		=> 1,
			'type' 			=> 'radio',
			'default' 		=> 0,
			'choices' 		=> [
				0 => "Con un botón personalizado que carga el iframe",
				1 => "Con el iframe por defecto de youtube ( Malo para métricas )",
				2 => "Con un elemento HTML de fachada"
			]
		]
	);

	/**
	 * Configuración de videos de youtube
	 *
	 */
	$wp_customize->add_section( 
		'reporte_indigo_embed_section', 
		[
			'title'      	=> __('Incrustados de redes sociales', 'reporte_indigo'),
			'priority'   	=> 4,
			'description'	=> __('Configuración para el manejo de los incrustados', 'reporte_indigo'),
			'panel'      	=> 'reporte_indigo_config_panel',
			'capability' 	=> 'edit_theme_options'
		]
	);

	/**
	 * Agregar donde se guardara la opción del control
	 *
	**/

	$wp_customize->add_setting( 
		'ri_embed',
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
		'ri_embed_control',
		[
			'label'   		=> __('Comportamiento de los incrustados', 'reporte_indigo'),
			'description'	=> __('Los proveedores se cargan', 'reporte_indigo'),
			'section' 		=> 'reporte_indigo_embed_section',
			'settings'		=> 'ri_embed',
			'priority'		=> 1,
			'type' 			=> 'radio',
			'default' 		=> 0,
			'choices' 		=> [
				0 => "Mediante un plugin",
				1 => "Nativo del tema"
			]
		]
	);

}

add_action( 'customize_register', 'reporte_indigo_customize_config' );
?>
