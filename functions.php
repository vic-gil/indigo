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

require get_template_directory() . '/classes/class_reporte_indigo_lectura_mb.php';
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
 * Carga todos los estilos en la sección que corresponde
 *
 **/

function reporte_indigo_scripts(){
	wp_enqueue_style( 'critical-style', get_stylesheet_directory_uri() . "/css/critical.css", [], "20210120" );

	if( ! is_home() && ! is_single() && ! is_post_type_archive('ri-reporte') && ! is_post_type_archive('ri-latitud') && ! is_post_type_archive('ri-indigonomics') && ! is_post_type_archive('ri-piensa') && ! is_tax('ri-categoria') && ! is_tax('ri-tema') && ! is_tax('ri-columna') && ! is_post_type_archive('ri-fan') && ! is_post_type_archive('ri-desglose')  && ! is_post_type_archive('ri-opinion') && ! is_page_template('page-templates/terminos.php') && ! is_page_template('page-templates/privacidad.php') && ! is_page_template('page-templates/ventas.php') && ! is_page_template('page-templates/newsletter.php') && ! is_page_template('page-templates/edicion-impresa.php') ) {
		wp_enqueue_style('bootstrap-min-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all' );
		wp_enqueue_style('my-stylesheet-css', get_stylesheet_uri(), array(), '0.0.1', 'all' );
		wp_enqueue_style('my-768-css', get_template_directory_uri()."/assets/css/768.css", array(), '0.0.1', 'screen and (max-width: 768px)');
		wp_enqueue_style('my-576-css', get_template_directory_uri()."/assets/css/576.css", array(), '0.0.1', 'screen and (max-width: 576px)');
		wp_enqueue_style('my-425-css', get_template_directory_uri()."/assets/css/425.css", array(), '0.0.1', 'screen and (max-width: 425px)');
	}
	
	if( is_page_template('page-templates/edicion-impresa.php') ) {
		wp_enqueue_style( 'edicion-style', get_stylesheet_directory_uri() . "/css/edicion.css", [], "20210120" );
	}
	
	if( is_page_template('page-templates/newsletter.php') ) {
		wp_enqueue_style( 'newsletter-style', get_stylesheet_directory_uri() . "/css/newsletter.css", [], "20210120" );
	}
	
	if( is_page_template('page-templates/ventas.php') ) {
		wp_enqueue_style( 'ventas-style', get_stylesheet_directory_uri() . "/css/ventas.css", [], "20210120" );
	}

	if( is_page_template('page-templates/terminos.php') || is_page_template('page-templates/privacidad.php') ){
		wp_enqueue_style( 'taxonomy-style', get_stylesheet_directory_uri() . "/css/terminos.css", [], "20210120" );
	}

	if( is_tax('ri-categoria') || is_tax('ri-tema') || is_tax('ri-columna') ){
		wp_enqueue_style( 'taxonomy-style', get_stylesheet_directory_uri() . "/css/taxonomy.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-opinion') ) {
		wp_enqueue_style( 'opinion-style', get_stylesheet_directory_uri() . "/css/opinion.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-desglose') ) {
		wp_enqueue_style( 'desglose-style', get_stylesheet_directory_uri() . "/css/desglose.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-fan') ){
		wp_enqueue_style( 'fan-style', get_stylesheet_directory_uri() . "/css/fan.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-piensa') ){
		wp_enqueue_style( 'piensa-style', get_stylesheet_directory_uri() . "/css/piensa.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-indigonomics') ){
		wp_enqueue_style( 'latitud-style', get_stylesheet_directory_uri() . "/css/latitud.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-latitud') ){
		wp_enqueue_style( 'latitud-style', get_stylesheet_directory_uri() . "/css/latitud.css", [], "20210120" );
	}

	if ( is_post_type_archive('ri-reporte') ){
		wp_enqueue_style( 'reporte-style', get_stylesheet_directory_uri() . "/css/reporte.css", [], "20210120" );
	}

	if( is_home() ){
		wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . "/css/home.css", [], "20210120" );
	}

	if( is_single() ){
		wp_enqueue_style( 'single-style', get_stylesheet_directory_uri() . "/css/single.css", [], "20210120" );
	}
}

add_action( 'wp_enqueue_scripts', 'reporte_indigo_scripts' );

/**
 * Carga todos los scripts que se ejecutan en tu tema
 * (Puede ser de cabecera o pie de página por ejemplo)
 *
 **/
function reporte_indigo_default_scripts(){
	echo '<script type="text/javascript">"use strict";const showMenu=async(e,t,c)=>{document.getElementById(e).addEventListener("click",function(o){for(let t of document.querySelectorAll(".exec"))e!==t.id&&t.classList.remove(c);for(let e of document.querySelectorAll(".listen"))t!==e.id&&e.classList.remove(c);this.classList.toggle(c),document.getElementById(t).classList.toggle(c)})};(async()=>{showMenu("exec-search","listen-search","activo"),showMenu("exec-menu","listen-menu","activo"),document.addEventListener("scroll",function(){(document.documentElement.scrollTop||document.body.scrollTop)<document.querySelector(".navmain").offsetHeight?document.querySelector(".navbar").classList.remove("active"):document.querySelector(".navbar").classList.add("active")},{passive:!0})})();</script>';
	
	if( is_post_type_archive('ri-fan') )
		echo '<script type="text/javascript">const loadScript=(e,t)=>{let l,i,r;(l=document.createElement("script")).type="text/javascript",l.src=e,l.onload=l.onreadystatechange=function(){i||this.readyState&&"complete"!=this.readyState||(i=!0,t())},(r=document.getElementsByTagName("script")[0]).parentNode.insertBefore(l,r)};let swiperInstances=[];const initSlider=()=>{sliders("slider-fan",1,1)},sliders=(e,t,l)=>{let i=document.getElementById(e);if(void 0!==i&&null!=i){let i={slidesPerView:1,spaceBetween:15,autoHeight:!0};1==l&&(i.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},i.on={slideChangeTransitionEnd:()=>{for(let t of document.querySelectorAll(`#${e} li`))t.classList.remove("active");let l=document.querySelectorAll(`#${e} ul`);for(let e of l)e.querySelector(`li:nth-child(${swiperInstances[t].activeIndex+1})`).classList.add("active");document.querySelectorAll(`#${e} ul`)}}),swiperInstances[t]=new Swiper(`#${e}`,i)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js",initSlider);</script>';

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

    	if( $instance['shorten_title']['active'] == 1)
    		$title = wp_trim_words( $popular_post->title, $instance['shorten_title']['length'], '...' );

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
		$output .= '					<a href="' . get_permalink($post_id) . '" title="' . esc_attr($popular_post->title) . '">';
		$output .= $title;
		$output .= ' 					</a>';
		$output .= '				</h3>';
		$output .= '			</div>';
		$output .= '		</div>';
		$output .= '	</article>';
		$output .= '</div>';
    }

    return $output;
}

add_filter('wpp_custom_html', 'reporte_indigo_popular_posts_html_list', 10, 2);
function reporte_indigo_add_image_class($class){
    $class .= ' lazy';

    return $class;
}

add_filter('get_image_tag_class','reporte_indigo_add_image_class');

function reporte_indigo_add_lazy_image($content){
	$content = str_replace('<img loading="lazy" class="','<img loading="lazy" class="lazy ', $content);

	return $content;
}

add_filter('the_content','reporte_indigo_add_lazy_image');

function reporte_indigo_replace_url_image($content){
	$content = str_replace('src="http://staging.reporteindigo.com','src="https://images.reporteindigo.com', $content);

	return $content;
}

add_filter('the_content','reporte_indigo_replace_url_image');

function reporte_indigo_main_query($query) {
	if( ! is_admin() && $query->is_main_query() ):
		$query->set( 'no_found_rows', true );
		$query->set( 'suppress_filters', true );

		if ( is_post_type_archive('ri-latitud') ) :
			$query->set( 'posts_per_page', 13 );
			$query->set( 'post_status', 'publish' );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', true );
		endif;

		if ( is_post_type_archive('ri-indigonomics') ) :
			$query->set( 'posts_per_page', 13 );
			$query->set( 'post_status', 'publish' );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', true );
		endif;

		if ( is_post_type_archive('ri-piensa') ) :
			$query->set( 'post_status', 'publish' );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', true );
			$query->set( 'tax_query', [
				[	
					'taxonomy' 	=> 'ri-categoria',
					'field' 	=> 'slug',
					'terms' 	=> 'enfoqueindigo',
					'operator' 	=> 'NOT IN'
				]
			] );

			/**
			 *
			 * Si cambias el apartado offset procura cambiarlo en 
			 * la función acoplada al filtro found_posts
			 * add_filter( 'found_posts', ... );
			 *
			**/

			$offset = 6;
			$ppp = 18;



			if ( ! $query->is_paged() ) {
				$query->set( 'posts_per_page', $ppp );
			} else {
				$query->set( 'posts_per_page', $ppp );
				$query->set( 'offset', $offset + ( ( $query->query_vars['paged'] - 2 ) * $ppp ) );
			}

		endif;
	
		if ( is_post_type_archive('ri-fan') ) :
			$query->set( 'posts_per_page', 15 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', true );
		endif;
	
		if ( is_post_type_archive('ri-desglose') ) :
			$query->set( 'posts_per_page', 14 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', true );
		endif;

		if ( is_tax('ri-categoria') || is_tax('ri-columna') || is_tax('ri-tema') ) :
			$query->set( 'posts_per_page', 19 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', true );
		endif;

	endif;

	return $query;
}

add_action( 'pre_get_posts', 'reporte_indigo_main_query' );

function homepage_offset_pagination( $found_posts, $query ) {
    
    if( ! is_admin() && $query->is_main_query() ) {
    	if ( is_post_type_archive('ri-piensa') ) :
    		$offset = 6;
    		$found_posts = $found_posts + $offset;
    	endif;
    }

    return $found_posts;
}

add_filter( 'found_posts', 'homepage_offset_pagination', 10, 2 );
?>
