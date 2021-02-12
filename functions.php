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

define('JSPATH', get_template_directory_uri().'/assets/js');
define('CSSPATH', get_template_directory_uri().'/assets/css');
define('IMAGESPATH', get_template_directory_uri().'/assets/images');
define('PAGESPATH', get_template_directory_uri().'/assets/pages');
define('THEMEPATH', get_template_directory_uri(). '/');
define('SITEURL', site_url('/') );
define('POST_TYPE', serialize ([
	'ri-reporte',
	'ri-opinion',
	'ri-latitud',
	'ri-indigonomics',
	'ri-piensa',
	'ri-fan',
	'ri-desglose',
	'ri-documento-indigo',
	'ri-salida-emergencia',
	'ri-especial'
]));

// Clases necesarias para el funcionamiento del tema
require get_template_directory() . '/classes/class-reporte-indigo-taxonomies.php';
require get_template_directory() . '/classes/class-reporte-indigo-post-types.php';
require get_template_directory() . '/classes/class-reporte-indigo-test.php';
require get_template_directory() . '/classes/class-reporte-indigo-templates.php';
require get_template_directory() . '/classes/class-reporte-indigo-scripts.php';
require get_template_directory() . '/classes/class-reporte-indigo-styles.php';
require get_template_directory() . '/classes/class-reporte-indigo-script-loader.php';
require get_template_directory() . '/classes/embed/class-reporte-indigo-oembed.php';

// Clases para la carga de menús
require get_template_directory() . '/inc/menus/menu-reporte-indigo-general-options.php';

// Clases para la carga de metaboxes
require get_template_directory() . '/inc/metaboxes/metabox-reporte-indigo-jwplayer.php';
require get_template_directory() . '/inc/metaboxes/metabox-reporte-indigo-lectura.php';
require get_template_directory() . '/inc/metaboxes/metabox-reporte-indigo-busqueda.php';

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


/*
 * El cache del navegador sólo está disponible para
 * usuarios que no tengan sesión
**/
if (!function_exists( 'cloudflare_origin_cache_control')){
	function cloudflare_origin_cache_control() {
		if ( is_user_logged_in() ){
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");
		}	
	}
}

add_action( 'init', 'cloudflare_origin_cache_control' );

if ( DISABLE_WP_CRON ):
	require get_template_directory() . '/classes/class-reporte-indigo-cron.php';

	if ( class_exists( 'Reporte_Indigo_Cron' ) ) :

		/**
		 * Se crean/actualizan datos transitorios de la sección home.
		 * Reporte_Indigo_Cron("nombre", "datos seleccionados", "post_type", "icon", "soporte");
		 *
		 * @link reporte/classes/class-reporte-indigo-post-types.php
		**/

		function cron_update_home() {
			$home_top = new Reporte_Indigo_Cron( 'ri_cache_home_top', get_option('wp_front_home_top_ri') );
			$home_top->cache_query_by_selection();

			$home_general = new Reporte_Indigo_Cron( 'ri_cache_home_general', get_option('wp_front_home_general_top_ri') );
			$home_general->cache_query_by_selection();

			// $home_reporte = new Reporte_Indigo_Cron( 'ri_cache_home_reporte', get_option('wp_front_home_reporte_ri') );
			// $home_reporte->cache_query_by_selection();

			$home_opinion = new Reporte_Indigo_Cron( 'ri_cache_home_opinion', get_option('wp_front_home_opinion_ri') );
			$home_opinion->cache_query_by_selection();

			$home_editor = new Reporte_Indigo_Cron( 'ri_cache_home_editor', get_option('wp_front_home_seleccion_editor_ri') );
			$home_editor->cache_query_by_selection();
		}

		/**
		 * Se crean/actualizan datos transitorios de la sección reporte.
		 * Reporte_Indigo_Cron("nombre", "datos seleccionados", "post_type", "icon", "soporte");
		 *
		 * @link reporte/classes/class-reporte-indigo-post-types.php
		**/
		function cron_update_reporte() {
			$videos = new Reporte_Indigo_Cron( 'ri_cache_videos', null, null, null, 4 );
			$videos->cache_query_by_jwplayer();

			$nacional = new Reporte_Indigo_Cron( 'ri_cache_nacional', null, 'ri-reporte', 'nacional', 11 );
			$nacional->cache_query_by_config();

			$cdmx = new Reporte_Indigo_Cron( 'ri_cache_cdmx', null, 'ri-reporte', 'cdmx', 11 );
			$cdmx->cache_query_by_config();

			$gdl = new Reporte_Indigo_Cron( 'ri_cache_gdl', null, 'ri-reporte', 'gdl', 10 );
			$gdl->cache_query_by_config();

			$nacional = new Reporte_Indigo_Cron( 'ri_cache_mty', null, 'ri-reporte', 'mty', 11 );
			$nacional->cache_query_by_config();
		}

		add_action( 'cron_every_five_minutes', 'cron_update_home' );
		add_action( 'cron_every_five_minutes', 'cron_update_reporte' );

	endif;

endif;

if ( class_exists( 'Reporte_Indigo_Post_Types' ) ) :

	function reporte_indigo_create_taxonomies () {
		$reporte = new Reporte_Indigo_Post_Types('Reporte', 'reporte', 'ri-reporte');
		$reporte->create_taxonomy();

		$opinion = new Reporte_Indigo_Post_Types('Opinión', 'opinion', 'ri-opinion');
		$opinion->create_taxonomy();

		$latitud = new Reporte_Indigo_Post_Types('Latitud', 'latitud', 'ri-latitud');
		$latitud->create_taxonomy();

		$indigonomics = new Reporte_Indigo_Post_Types('Indigonomics', 'indigonomics', 'ri-indigonomics');
		$indigonomics->create_taxonomy();

		$piensa = new Reporte_Indigo_Post_Types('Piensa', 'piensa', 'ri-piensa', 'dashicons-lightbulb');
		$piensa->create_taxonomy();

		$fan = new Reporte_Indigo_Post_Types('Fan', 'fan', 'ri-fan');
		$fan->create_taxonomy();

		$desglose = new Reporte_Indigo_Post_Types('Desglose', 'desglose', 'ri-desglose');
		$desglose->create_taxonomy();

		$especial = new Reporte_Indigo_Post_Types('Especial', 'especial', 'ri-especial', 'dashicons-admin-post', ['title', 'thumbnail', 'excerpt']);
		$especial->create_taxonomy();

		$filosofia = new Reporte_Indigo_Post_Types('Filosofía Financiera', 'filosofia-financiera', 'ri-filosofia', 'dashicons-admin-post', ['editor']);
		$filosofia->create_taxonomy();

		$dato = new Reporte_Indigo_Post_Types('Dato del día', 'dato-dia', 'ri-dato-dia','dashicons-admin-post', ['editor', 'thumbnail']);
		$dato->create_taxonomy();

		$documento = new Reporte_Indigo_Post_Types('Documento Índigo', 'documento-indigo', 'ri-documento-indigo');
		$documento->create_taxonomy();

		$emergencia = new Reporte_Indigo_Post_Types('Salida de Emergencia', 'salida-emergencia', 'ri-salida-emergencia');
		$emergencia->create_taxonomy();
	}

	add_action( 'init', 'reporte_indigo_create_taxonomies' );

endif;

/**
 * Carga todos los estilos en la sección que corresponde
 *
 **/

function reporte_indigo_scripts () {

	if( ! is_admin() ) {
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wp_print_scripts');
		remove_action('wp_head', 'wp_print_head_scripts', 9);
		remove_action('wp_head', 'wp_enqueue_scripts', 1);

		add_action('wp_footer', 'wp_print_scripts', 5);
		add_action('wp_footer', 'wp_enqueue_scripts', 5);
		add_action('wp_footer', 'wp_print_head_scripts', 5);

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		wp_deregister_script( 'wp-embed' );

		wp_dequeue_style('wordpress-popular-posts-css');
  		wp_deregister_style('wordpress-popular-posts-css');

  		wp_dequeue_style( 'wp-block-library' );
	    	wp_dequeue_style( 'wp-block-library-theme' );
	    	wp_dequeue_style( 'wc-block-style' );
	    	wp_dequeue_style( 'wp-block-library' );

	    	// Remove from RSS feeds also
		remove_filter( 'the_content_feed', 'wp_staticize_emoji');
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji');

		// Cargar fuentes
		wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,700&display=swap', [], '', 'all' );

		// Cargar scripts
		wp_deregister_script('jquery');

		wp_enqueue_script('bootstrap-min-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js', '', '5.0.0', true);
		wp_script_add_data( 'bootstrap-min-js', 'defer', true );

		wp_enqueue_script('jwplayer-js', 'https://cdn.jwplayer.com/libraries/ixhD10k3.js', '', null, true);
		wp_script_add_data( 'jwplayer-js', 'defer', true );

		wp_enqueue_style('swiper-min-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', [], '4.5.0', 'all' );
		wp_enqueue_style('fontawesome-min-css', get_template_directory_uri().'/assets/fonts/fontawesome/fontawesome.min.css', array(), '0.0.3', 'all' );
	}

}

add_action( 'wp_enqueue_scripts', 'reporte_indigo_scripts' );

/**
 * Agrega los estilos no criticos del tema
 *
**/
function add_non_critical_section_styles() {
	if( is_home() )
		wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . "/css/home.css", [], "20210120" );

	if( is_single() )
		wp_enqueue_style( 'single-style', get_stylesheet_directory_uri() . "/css/single.css", [], "20210120" );

	if( is_404() )
		wp_enqueue_style( 'edicion-style', get_stylesheet_directory_uri() . "/css/404.css", [], "20210120" );

	if( is_page_template('page-templates/edicion-impresa.php') )
		wp_enqueue_style( 'edicion-style', get_stylesheet_directory_uri() . "/css/edicion.css", [], "20210120" );

	if( is_page_template('page-templates/newsletter.php') )
		wp_enqueue_style( 'newsletter-style', get_stylesheet_directory_uri() . "/css/newsletter.css", [], "20210120" );

	if( is_page_template('page-templates/ventas.php') )
		wp_enqueue_style( 'ventas-style', get_stylesheet_directory_uri() . "/css/ventas.css", [], "20210120" );

	if( is_page_template('page-templates/terminos.php') || is_page_template('page-templates/privacidad.php') )
		wp_enqueue_style( 'taxonomy-style', get_stylesheet_directory_uri() . "/css/terminos.css", [], "20210120" );

	if( is_tax('ri-categoria') || is_tax('ri-tema') || is_tax('ri-columna') )
		wp_enqueue_style( 'taxonomy-style', get_stylesheet_directory_uri() . "/css/taxonomy.css", [], "20210120" );

	if ( is_post_type_archive('ri-opinion') )
		wp_enqueue_style( 'opinion-style', get_stylesheet_directory_uri() . "/css/opinion.css", [], "20210120" );

	if ( is_post_type_archive('ri-desglose') )
		wp_enqueue_style( 'desglose-style', get_stylesheet_directory_uri() . "/css/desglose.css", [], "20210120" );

	if ( is_post_type_archive('ri-fan') )
		wp_enqueue_style( 'fan-style', get_stylesheet_directory_uri() . "/css/fan.css", [], "20210120" );

	if ( is_post_type_archive('ri-piensa') )
		wp_enqueue_style( 'piensa-style', get_stylesheet_directory_uri() . "/css/piensa.css", [], "20210120" );

	if ( is_post_type_archive('ri-indigonomics') )
		wp_enqueue_style( 'latitud-style', get_stylesheet_directory_uri() . "/css/latitud.css", [], "20210120" );

	if ( is_post_type_archive('ri-latitud') )
		wp_enqueue_style( 'latitud-style', get_stylesheet_directory_uri() . "/css/latitud.css", [], "20210120" );

	if ( is_post_type_archive('ri-reporte') )
		wp_enqueue_style( 'reporte-style', get_stylesheet_directory_uri() . "/css/reporte.css", [], "20210120" );

};

add_action( 'get_footer', 'add_non_critical_section_styles' );

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
	    	if( is_404() ) {
			$output .= '<div class="entry-excerpt">';
			$output .= '<p>' . get_the_excerpt($post_id) . '</p>';
			$output .= '</div>';
		}
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
