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

/**
 * Carga todos los scripts que se ejecutan en tu tema
 * (Puede ser de cabecera o pie de página por ejemplo)
 *
 **/
function reporte_indigo_default_scripts(){
	echo '<script type="text/javascript">"use strict";const showMenu=async(e,t,s)=>{document.getElementById(e).addEventListener("click",function(c){for(let t of document.querySelectorAll(".exec"))e!==t.id&&t.classList.remove(s);for(let e of document.querySelectorAll(".listen"))t!==e.id&&e.classList.remove(s);this.classList.toggle(s),document.getElementById(t).classList.toggle(s)})};(async()=>{showMenu("exec-search","listen-search","activo"),showMenu("exec-menu","listen-menu","activo")})();</script>';
}

add_action( 'wp_footer', 'reporte_indigo_default_scripts' , 5 );

/**
 * Filtra los atributos de una imagen adjunta
 *
 * @param  string[] $attr 	   Matriz de valores de atributo para el marcado de la imagen.
 * @param  WP_Post $attachment Imagen adjunta a publicación.
 * @param  string|int[] $size  Tamaño de imagen solicitado
 */

function custom_media_responsive_size($attr, $attachment, $size) {
	if(! is_admin() ) :

		/**
		 * Agregamos la clase lazyload a todas las imágenes
		 *
		 */
		$attr['class'] = $attr['class'] . " lazyload";

		if( ! empty( $attr['src'] ) ) :

			/**
			 * Pasamos los valores de src a data-src para el plugin
			 * Si tus imagenes se encuentran en un CDN (Amazon S3, Cludfront) aquí puedes cambiarlas
			 * mediante una exprresión regular
			 *
			 */
			$attr['data-src'] = $attr['src'];

			/**
			 * Pixel 1x1 transparente
			 *
			 */
			$attr['src'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';

		endif;

		if( ! empty( $attr['srcset'] ) ) :

			/**
			 * Pasamos los valores de srcset a data-srcset para el plugin
			 * Si tus imagenes se encuentran en un CDN (Amazon S3, Cludfront) aquí puedes cambiarlas
			 * mediante una exprresión regular
			 *
			 */
			$attr['data-srcset'] = $attr['srcset'];

			/**
			 * Limpiamos el campo srcset
			 *
			 */
		   	$attr['srcset'] = '';

		endif;

		/**
		 * ¡LA MAGIA OCURRE AQUÍ!
		 * Esto requiere de mucho análisis y de requisitos de tu tema
		 * usa la configuracion que necesites mediante una medida
		 * ejemplo `medium_large`, `large` y la sección ejemplo
		 * is_home(), is_category() para mostrar las imagenes en su tamaño 
		 * ideal mediante diseño responsivo.
		 *
		 * Si no estás familiarizado con esto consulta. HTML y AMP
		 * @link https://developer.mozilla.org/es/docs/Learn/HTML/Multimedia_and_embedding/Responsive_images
		 * @link https://amp.dev/es/documentation/guides-and-tutorials/develop/style_and_layout/art_direction/
		 *
		 */
		$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";

		if( is_home() ) :
			
			if( $size === "medium_large" ) :
				$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";
			endif;

			if( $size === "large" ) :
				$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";
			endif;

		endif;

		if ( is_category() ) :

		endif;

		if ( is_tax() ) :

		endif;

		if ( is_search() ) :

		endif;

		if ( is_author() ) :

		endif;

	endif;

	return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'custom_media_responsive_size', 10 , 3);

function reporte_indigo_popular_posts_html_list($popular_posts, $instance){
    $output = '';
    
    foreach( $popular_posts as $popular_post ) {
    	$post_id = $popular_post->id;
    	$url = get_the_post_thumbnail_url($post_id, "thumbnail");
    	$url = str_replace(get_site_url(), 'https://images.reporteindigo.com', $url);
    	$tema = get_the_terms($post_id, 'ri-tema');

        $output .= '<div class="component-lista-imagen">';
	$output .= '	<article itemtype="http://schema.org/Article">';
	$output .= '		<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">';
	$output .= '			<a href="' . get_permalink($post_id) . '" title="' . esc_attr($popular_post->title) . '">';
	$output .= '				<picture>';
	$output .= '					<img itemprop="contentUrl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . $url . '" alt="' . esc_attr($popular_post->title) . '" title="' . esc_attr($popular_post->title) . '" class="lazy" loading="lazy" />';
	$output .= '				</picture>';
	$output .= '			</a>';
	$output .= '		</figure>';
	$output .= '		<div class="entry-data">';
	$output .= '			<div class="entry-title">';
	$output .= '				<h2>';
	$output .= '					<a href="' . get_term_link($tema[0]->term_id) . '" title="' . $tema[0]->name . '">';
	$output .= $tema[0]->name;
	$output .= '					</a>';
	$output .= '				</h2>';
	$output .= '				<h3>';
	$output .= '					<a href="' . get_permalink($post_id) . '" title="' . esc_attr($popular_post->title) . '">' . esc_attr($popular_post->title) . '</a>';
	$output .= '				</h3>';
        $output .= '			</div>';
        $output .= '		</div>';
        $output .= '	</article>';
        $output .= '</div>';

    }

    return $output;
}

add_filter('wpp_custom_html', 'reporte_indigo_popular_posts_html_list', 10, 2);

?>
