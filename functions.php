<?php
define('JSPATH', get_template_directory_uri().'/assets/js');
define('CSSPATH', get_template_directory_uri().'/assets/css');
define('IMAGESPATH', get_template_directory_uri().'/assets/images');
define('PAGESPATH', get_template_directory_uri().'/assets/pages');
define('THEMEPATH', get_template_directory_uri(). '/');
define('SITEURL', site_url('/') );
define('POST_TYPE', serialize([
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
require get_template_directory() . '/classes/class-reporte-indigo-utils.php';
require get_template_directory() . '/classes/class-reporte-indigo-templates.php';
require get_template_directory() . '/classes/class-reporte-indigo-scripts.php';
require get_template_directory() . '/classes/class-reporte-indigo-styles.php';
require get_template_directory() . '/classes/class-reporte-indigo-script-loader.php';

// Custom Embed
if( get_theme_mod( "ri_embed", false ) == 1 )
	require get_template_directory() . '/classes/embed/class-reporte-indigo-oembed.php';

// PWA
if( get_theme_mod( "ri_pwa", false ) == 1 )
	require get_template_directory() . '/pwa/reporte-indigo-pwa.php';

// Clases para la carga de menús
require get_template_directory() . '/inc/menus/menu-reporte-indigo-general-options.php';

// Etiquetas personalizadas del tema
require get_template_directory() . '/inc/reporte-indigo-template-tags.php';

// Clases para la carga de metaboxes
require get_template_directory() . '/inc/metaboxes/metabox-reporte-indigo-jwplayer.php';
require get_template_directory() . '/inc/metaboxes/metabox-reporte-indigo-lectura.php';
require get_template_directory() . '/inc/metaboxes/metabox-reporte-indigo-busqueda.php';

// Adecuaciones para el perfomance
require get_template_directory() . '/inc/perfomance/perfomance-reporte-indigo-images.php';
require get_template_directory() . '/inc/perfomance/perfomance-reporte-indigo-single.php';
require get_template_directory() . '/inc/perfomance/perfomance-reporte-indigo-posts.php';
require get_template_directory() . '/inc/perfomance/perfomance-reporte-indigo-yoast.php';

// Customizer
require get_template_directory() . '/inc/reporte-indigo-customizer.php';

// Feed
require get_template_directory() . '/inc/reporte-indigo-feed.php';

// Custom
require get_template_directory() . '/inc/sections/section-reporte-indigo-voto.php';

// AMP
require get_template_directory() . '/inc/reporte-indigo-amp.php';

// Experimental
if( get_theme_mod( "ri_experimental", false ) == 1 ):
	require get_template_directory() . '/inc/customizer/controls/control-reporte-indigo-sortable.php';
	require get_template_directory() . '/inc/customizer/controls/control-reporte-indigo-select.php';
	require get_template_directory() . '/inc/customizer/customizer-reporte-indigo-home.php';
	require get_template_directory() . '/inc/reporte-indigo-one-signal.php';
endif;

require get_template_directory() . '/proposal/surveys/shortcode.php';
require get_template_directory() . '/proposal/surveys/surveys.php';

require get_template_directory() . '/proposal/jwplayer/reporte-indigo-jwplayer.php';
require get_template_directory() . '/proposal/jwplayer/jwplayer.php';

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
		 * @link reporte/classes/class-reporte-indigo-cron.php
		**/

		function cron_update_home() {
			error_log('El IP del visitante es:' . $_SERVER['REMOTE_ADDR'] );
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
		 * @link reporte/classes/class-reporte-indigo-cron.php
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

		/**
		 * Se crean/actualizan datos transitorios de la sección reporte.
		 * Reporte_Indigo_Cron("nombre", "datos seleccionados", "post_type", "icon", "soporte");
		 *
		 * @link reporte/classes/class-reporte-indigo-cron.php
		**/
		function cron_update_page_videos() {
			$videos = new Reporte_Indigo_Cron( 'ri_cache_page_videos', null, null, null, 17 );
			$videos->cache_query_by_jwplayer();
		}

		add_action( 'cron_every_five_minutes', 'cron_update_home' );
		add_action( 'cron_every_five_minutes', 'cron_update_reporte' );
		add_action( 'cron_every_five_minutes', 'cron_update_page_videos' );

	endif;

endif;

if ( class_exists( 'Reporte_Indigo_Post_Types' ) ) :

	/**
	 * Se crean post types por media de la función Reporte_Indigo_Post_Types
	 * Reporte_Indigo_Post_Types("etiqueta", "slug", "post type id", "icon", "soporte");
	 *
	 * @link reporte/classes/class-reporte-indigo-post-types.php
	**/

	function reporte_indigo_create_post_type () {
		$reporte = new Reporte_Indigo_Post_Types('Reporte', 'reporte', 'ri-reporte');
		$reporte->create_post_type();

		$opinion = new Reporte_Indigo_Post_Types('Opinión', 'opinion', 'ri-opinion');
		$opinion->create_post_type();

		$latitud = new Reporte_Indigo_Post_Types('Latitud', 'latitud', 'ri-latitud');
		$latitud->create_post_type();

		$indigonomics = new Reporte_Indigo_Post_Types('Indigonomics', 'indigonomics', 'ri-indigonomics');
		$indigonomics->create_post_type();

		$piensa = new Reporte_Indigo_Post_Types('Piensa', 'piensa', 'ri-piensa', 'dashicons-lightbulb');
		$piensa->create_post_type();

		$fan = new Reporte_Indigo_Post_Types('Fan', 'fan', 'ri-fan');
		$fan->create_post_type();

		$desglose = new Reporte_Indigo_Post_Types('Desglose', 'desglose', 'ri-desglose');
		$desglose->create_post_type();

		$especial = new Reporte_Indigo_Post_Types('Especial', 'especial', 'ri-especial', 'dashicons-admin-post', ['title', 'thumbnail', 'excerpt']);
		$especial->create_post_type();

		$filosofia = new Reporte_Indigo_Post_Types('Filosofía Financiera', 'filosofia-financiera', 'ri-filosofia', 'dashicons-admin-post', ['editor']);
		$filosofia->create_post_type();

		$dato = new Reporte_Indigo_Post_Types('Dato del día', 'dato-dia', 'ri-dato-dia','dashicons-admin-post', ['editor', 'thumbnail']);
		$dato->create_post_type();

		$documento = new Reporte_Indigo_Post_Types('Documento Índigo', 'documento-indigo', 'ri-documento-indigo');
		$documento->create_post_type();

		$emergencia = new Reporte_Indigo_Post_Types('Salida de Emergencia', 'salida-emergencia', 'ri-salida-emergencia');
		$emergencia->create_post_type();
	}

	add_action( 'init', 'reporte_indigo_create_post_type' );

endif;

if ( ! function_exists( 'add_rel_preload' ) ) :

	function reporte_indigo_add_rel_preload($html, $handle, $href, $media) {
		if ( is_admin() )
	    	return $html;

	    $html = "<link rel='preload' href='$href' as='style' onload=\"this.onload=null;this.rel='stylesheet'\" />
			<noscript><link id='$handle-no-script' type='text/css' rel='stylesheet' href=\"$href\" media=\"$media\" /></noscript>";

		$html .= "<link id='$handle' type='text/css' rel='stylesheet' href=\"$href\" media=\"$media\" />";

		return $html;
	}

	add_filter( 'style_loader_tag', 'reporte_indigo_add_rel_preload', 10, 4 );

endif;


function reporte_indigo_scripts () {
	if( ! is_admin() ) {
		// Inhabilitar jquery si no eres administrador
		if( ! current_user_can('administrator') ) {
			wp_deregister_script('jquery');
		}

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

	    if( ! is_single() ){
	    	wp_dequeue_style('embedpress');
		    wp_deregister_style('embedpress');

		    wp_dequeue_style('embedpress_blocks-cgb-style-css');
		  	wp_deregister_style('embedpress_blocks-cgb-style-css');
	    }

	    // Register Scripts
	    wp_register_script( 'smart-ads', 'https://ced.sascdn.com/tag/1056/smart.js', [], '', false );
	    wp_register_script( 'indigo', get_template_directory_uri() . '/assets/js/indigo.min.js', [], '1.0.0', true );
	    wp_register_script( 'bootstrap-min-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js', '', '5.0.0', true );

		// Cargar fuentes
		wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,700&display=swap', [], '', 'all' );

		// Cargar css de swiper
		wp_enqueue_style('swiper-min-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', [], '4.5.0', 'all' );

		// Enqueue Scripts
		wp_enqueue_script( 'smart-ads' );
		wp_script_add_data( 'smart-ads', 'async', true );

		wp_enqueue_script( 'indigo' );
		wp_script_add_data( 'indigo', 'async', true );

		wp_enqueue_script( 'bootstrap-min-js' );
		wp_script_add_data( 'bootstrap-min-js', 'async', true );

		wp_script_add_data( 'hoverintent-js', 'async', true );
		wp_script_add_data( 'admin-bar', 'async', true );
		wp_script_add_data( 'embedpress-pdfobject', 'async', true );
		wp_script_add_data( 'wpp-js', 'async', true );
	}

}

add_action( 'wp_enqueue_scripts', 'reporte_indigo_scripts' );

/**
 * Agrega los estilos no criticos del tema
 *
**/
function add_non_critical_section_styles() {
	// Register scripts
	wp_register_style( 'home-style', ri_get_file_url('/assets/css/', 'home.css'), [], ri_get_version_file('/assets/css/', 'home.css'), 'all' );
	wp_register_style( 'single-style', ri_get_file_url('/assets/css/', 'single.css'), [], ri_get_version_file('/assets/css/', 'single.css'), 'all' );
	wp_register_style( 'single-voto-style', ri_get_file_url('/assets/css/', 'single-voto.css'), [], ri_get_version_file('/assets/css/', 'single-voto.css'), 'all' );
	wp_register_style( '404-style', ri_get_file_url('/assets/css/', '404.css'), [], ri_get_version_file('/assets/css/', '404.css'), 'all' );
	wp_register_style( 'newsletter-style', ri_get_file_url('/assets/css/', 'newsletter.css'), [], ri_get_version_file('/assets/css/', 'newsletter.css'), 'all' );
	wp_register_style( 'ventas-style', ri_get_file_url('/assets/css/', 'ventas.css'), [], ri_get_version_file('/assets/css/', 'ventas.css'), 'all' );
	wp_register_style( 'terminos-style', ri_get_file_url('/assets/css/', 'terminos.css'), [], ri_get_version_file('/assets/css/', 'terminos.css'), 'all' );
	wp_register_style( 'noticias-style', ri_get_file_url('/assets/css/', 'noticias.css'), [], ri_get_version_file('/assets/css/', 'noticias.css'), 'all' );
	wp_register_style( 'taxonomy-style', ri_get_file_url('/assets/css/', 'taxonomy.css'), [], ri_get_version_file('/assets/css/', 'taxonomy.css'), 'all' );
	wp_register_style( 'opinion-style', ri_get_file_url('/assets/css/', 'opinion.css'), [], ri_get_version_file('/assets/css/', 'opinion.css'), 'all' );
	wp_register_style( 'desglose-style', ri_get_file_url('/assets/css/', 'desglose.css'), [], ri_get_version_file('/assets/css/', 'desglose.css'), 'all' );
	wp_register_style( 'fan-style', ri_get_file_url('/assets/css/', 'fan.css'), [], ri_get_version_file('/assets/css/', 'fan.css'), 'all' );
	wp_register_style( 'piensa-style', ri_get_file_url('/assets/css/', 'piensa.css'), [], ri_get_version_file('/assets/css/', 'piensa.css'), 'all' );
	wp_register_style( 'latitud-style', ri_get_file_url('/assets/css/', 'latitud.css'), [], ri_get_version_file('/assets/css/', 'latitud.css'), 'all' );
	wp_register_style( 'reporte-style', ri_get_file_url('/assets/css/', 'reporte.css'), [], ri_get_version_file('/assets/css/', 'reporte.css'), 'all' );
	wp_register_style( 'author-style', ri_get_file_url('/assets/css/', 'author.css'), [], ri_get_version_file('/assets/css/', 'author.css'), 'all' );

	// Enqueue scripts
	if( is_home() )
		wp_enqueue_style( 'home-style' );

	if( is_single() ) :
		$terms = wp_list_pluck( get_terms( 'ri-voto' ), 'term_id' );

		if ( has_term($terms, 'ri-voto') ):
			wp_enqueue_style( 'single-voto-style' );
		else:
			wp_enqueue_style( 'single-style' );
		endif;
		
	endif;

	if( is_404() )
		wp_enqueue_style( '404-style' );

	if( is_page_template('page-templates/newsletter.php') || is_page_template('page-templates/newsletter-voto.php') )
		wp_enqueue_style( 'newsletter-style' );

	if( is_page_template('page-templates/ventas.php') )
		wp_enqueue_style( 'ventas-style' );

	if( is_page_template('page-templates/terminos.php') || is_page_template('page-templates/privacidad.php') )
		wp_enqueue_style( 'terminos-style' );

	if( is_page_template('page-templates/indigo_noticias.php') )
		wp_enqueue_style( 'noticias-style' );

	if( is_page_template('page-templates/indigo_videos.php') )
		wp_enqueue_style( 'noticias-style' );

	if( is_tax('ri-categoria') || is_tax('ri-tema') || is_tax('ri-columna') || is_tax('ri-ciudad') )
		wp_enqueue_style( 'taxonomy-style' );

	if ( is_post_type_archive('ri-opinion') )
		wp_enqueue_style( 'opinion-style' );

	if ( is_post_type_archive('ri-desglose') )
		wp_enqueue_style( 'desglose-style' );

	if ( is_post_type_archive('ri-fan') )
		wp_enqueue_style( 'fan-style' );

	if ( is_post_type_archive('ri-piensa') )
		wp_enqueue_style( 'piensa-style' );

	if ( is_post_type_archive('ri-indigonomics') )
		wp_enqueue_style( 'latitud-style' );

	if ( is_post_type_archive('ri-latitud') )
		wp_enqueue_style( 'latitud-style' );

	if ( is_post_type_archive('ri-encuestas') )
		wp_enqueue_style( 'latitud-style' );

	if ( is_post_type_archive('ri-reporte') )
		wp_enqueue_style( 'reporte-style' );

	if ( is_author() )
		wp_enqueue_style( 'author-style' );

	if ( is_search() )
		wp_enqueue_style( 'author-style' );

};

add_action( 'get_footer', 'add_non_critical_section_styles' );

/* Se remueve el editor de la admin bar superior */
function removes_posts_admin_panel_menu(){
	remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'removes_posts_admin_panel_menu' );

/**
 * Se agrega la configuración inicial del tema
 *
**/

if ( ! function_exists( 'reporte_indigo_setup' ) ){

	function reporte_indigo_setup() {

		/**
		 * Aquí podemos cargar nuestro archivo de lenguaje de Reporte Índigo
		 *
		**/
		// load_theme_textdomain( 'reporte_indigo', get_template_directory() . '/lang' );
	
		function no_gallery($atts) { 
			return "";
		}
		
		add_shortcode('gallery', 'no_gallery');

		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		
		add_theme_support(
			'post-formats',
			[
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			]
		);
		
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			]
		);

		add_filter('user_contactmethods', 'perfil_usuario_personalizado' );
		function perfil_usuario_personalizado( $user_contact ) {
		    $user_contact['facebook'] 	= __('Facebook profile URL');
		    $user_contact['instagram'] 	= __('Instagram profile URL'); 
		    $user_contact['linkedin'] 	= __('LinkedIn profile URL'); 
		    $user_contact['pinterest'] 	= __('Pinterest profile URL'); 
		    $user_contact['soundcloud'] = __('SoundCloud profile URL'); 
		    $user_contact['tumblr'] 	= __('Tumblr profile URL'); 
		    $user_contact['twitter'] 	= __('Twitter profile URL'); 
		    $user_contact['youtube'] 	= __('YouTube profile URL'); 
		    $user_contact['rss'] 		= __('RSS');
		    return $user_contact;
		}

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

		// add_filter( 'nav_menu_item_id', '__return_null', 10, 3 );
		// add_filter( 'nav_menu_css_class', '__return_empty_array', 10, 3 );

		/*
		 * Agrega soporte de `async` y `defer` para scripts 
		 * registrados o en cola por el tema
		 *
		 */

		$loader = new Reporte_indigo_script_loader();
		add_filter( 'script_loader_tag', [ $loader, 'filter_script_loader_tag' ], 10, 2 );

	}
}

add_action( 'after_setup_theme', 'reporte_indigo_setup' );

/* se agrega link pingback */
function siteweb_pingback_header() {

	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}

}

add_action( 'wp_head', 'siteweb_pingback_header' );

function add_comscore_script() {
	if( ! amp_is_request() ) {
		echo <<<HTML
		<!-- Begin comScore Tag-->
		<script>
		var _comscore = _comscore || [];
		_comscore.push({ c1: "2", c2: "19249540" });
		(function() {
			var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.defer = true;
			s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
			el.parentNode.insertBefore(s, el);
		})();
		</script>
		<!-- End comScore Tag-->
		HTML;
	}
}

add_action( 'wp_head', 'add_comscore_script', 1 );

function add_google_tag_manager_script() {
	if(! amp_is_request()) {
		echo <<<HTML
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WN384TH');</script>
		<!-- End Google Tag Manager -->
		<!-- Google Tag Manager -->
		<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5PFW88Q');
		</script>
		<!-- End Google Tag Manager -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-5285176-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-5285176-1');
		</script>
		HTML;
	}
}

add_action( 'wp_head', 'add_google_tag_manager_script', 1 );

function add_smart_script() {
	echo <<<HTML
	<!-- Smart Script -->
	<script type="text/javascript">
	var sas = sas || {};sas.cmd = sas.cmd || [];sas.cmd.push(function() {sas.setup({ networkid: 1056, domain: "", async: true });});
	</script>
	<!-- End Smart Script -->
	HTML;
}

add_action( 'wp_head', 'add_smart_script', 1 );

function add_clickio_header_binding() {
	if( is_home() || is_single() || is_singular () ):
		echo <<<HTML
		<script async type="text/javascript" src="//s.clickiocdn.com/t/pb213972.js"></script>
		<script async type="text/javascript" src="//s.clickiocdn.com/t/common_258.js"></script> 
		HTML;
	endif;
}

add_action( 'wp_head', 'add_clickio_header_binding', 1 );

function add_gtag_marketing_script() {
	echo <<<HTML
	<!-- Global site tag (gtag.js) - Google Ads: 370492652 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-370492652"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-370492652');
	</script>
	HTML;
}

add_action( 'wp_head', 'add_gtag_marketing_script', 1 );

function add_adsense_script() {
    echo <<<HTML
    <script data-ad-client="ca-pub-2350018958169079" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    HTML;
}

add_action( 'wp_head', 'add_adsense_script', 1 );

function add_gtag_init_script() {
	$name = get_bloginfo('name');

	echo <<<HTML
	<!-- Begin comScore Tag-->
	<noscript>
		<img src="http://b.scorecardresearch.com/p?c1=2&c2=19249540&cv=2.0&cj=1" title="{$name}" alt="{$name}" />
	</noscript>
	<!-- End comScore Tag-->
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WN384TH"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	HTML;
}

add_action( 'ri_body_init', 'add_gtag_init_script', 1 );

function add_clickio_script() {
	if( is_single() || is_singular () ):
		if( wp_is_mobile() ):
			echo <<<HTML
			<script async type='text/javascript' src='//s.clickiocdn.com/t/common_258.js'></script>
			<script class='__lxGc__' type='text/javascript'>
				((__lxGc__=window.__lxGc__||{'s':{},'b':0})['s']['_213972']=__lxGc__['s']['_213972']||{'b':{}})['b']['_629927']={'i':__lxGc__.b++};
			</script>
			HTML;
		else:
			echo <<<HTML
			<script async type='text/javascript' src='//s.clickiocdn.com/t/common_258.js'></script>
			<script class='__lxGc__' type='text/javascript'>
			((__lxGc__=window.__lxGc__||{'s':{},'b':0})['s']['_213972']=__lxGc__['s']['_213972']||{'b':{}})['b']['_629920']={'i':__lxGc__.b++};
			</script> 
			HTML;
		endif;
	endif;
}

add_action( 'ri_body_init', 'add_clickio_script', 2 );

function add_clickio_sticky() {
	if( is_single() || is_singular () ):
		if( wp_is_mobile() ):
			echo <<<HTML
			<script async type='text/javascript' src='s.clickiocdn.com/t/common_258.js'></script>
			<script class='__lxGc__' type='text/javascript'>
				((__lxGc__=window.__lxGc__||{'s':{},'b':0})['s']['_213972']=__lxGc__['s']['_213972']||{'b':{}})['b']['_652887']={'i':__lxGc__.b++};
			</script>
			HTML;
		endif;
	endif;
}
add_action( 'ri_body_init', 'add_clickio_sticky', 3 );

function add_custom_scripts() {
	echo get_theme_mod("ri_custom_scripts");
}

add_action( 'wp_head', 'add_custom_scripts', 2 );

function your_prefix_register_meta_boxes( $meta_boxes ) {

	if( is_admin() ){
		$prefix = 'prefix-';

		$meta_boxes[] = [
	        'title'      => esc_html__( 'Untitled', 'online-generator' ),
	        'id'         => 'untitled',
	        'post_types' => ['ri-especial'],
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'fields'     => [
	            [
	                'type' => 'autocomplete',
	                'id'   => $prefix . 'autocomplete_t6hl34he88c',
	                'name' => esc_html__( 'Autocomplete', 'online-generator' ),
	            ],
	        ],
	    ];

	    return $meta_boxes;
	}

}

add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );

add_filter('jetpack_implode_frontend_css', '__return_false', 99 );
add_filter('use_block_editor_for_post', '__return_false');

/*
 * Crea la plantilla para popular post
 *
**/

function reporte_indigo_popular_posts_html_list($popular_posts, $instance){
    $output = '';
    
    foreach( $popular_posts as $popular_post ) {
    	$post_id = $popular_post->id;
    	$image = get_the_post_thumbnail($post_id, "thumbnail");
    	$tema = get_the_terms($post_id, 'ri-tema');

    	if( $instance['shorten_title']['active'] == 1)
    		$title = wp_trim_words( $popular_post->title, $instance['shorten_title']['length'], '...' );

		$output .= '<div class="component-lista-imagen">';
		$output .= '	<article itemtype="http://schema.org/Article">';
		$output .= '		<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">';
		$output .= '			<a href="' . get_permalink($post_id) . '" title="' . esc_attr($popular_post->title) . '">';
		$output .= '				<picture>';
		$output .= $image;
		$output .= '				</picture>';
		$output .= '			</a>';
		$output .= '		</figure>';
		$output .= '		<div class="entry-data">';
		$output .= '			<div class="entry-title">';
		if( FALSE !== $tema && ! is_wp_error( $tema ) ) {
			$output .= '				<h2>';
			$output .= '					<a href="' . get_term_link($tema[0]->term_id) . '" title="' . $tema[0]->name . '">';
			$output .= $tema[0]->name;
			$output .= '					</a>';
			$output .= '				</h2>';
		}
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

/**
 * Cambio en la imagen de login
 *
**/

function reporte_indigo_login_header() {

	if( has_custom_logo() ) :
		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
		<style type="text/css">.login h1 a { background-image: url(<?php echo esc_url( $image[0] ); ?>); -webkit-background-size: <?php echo absint( $image[1] )?>px; background-size: <?php echo absint( $image[1] ) ?>px; height: <?php echo absint( $image[2] ) ?>px; width: <?php echo absint( $image[1] ) ?>px;}</style>
		<?php
	else:
	?>
	<style type="text/css">.login h1 a { background-image: url(<?=IMAGESPATH;?>/iconos/icon150x150.png);-webkit-background-size: 96px;background-size: 96px;height: 96px;width: 96px;}</style>
	<?php
	endif;
}
 
add_action( 'login_head', 'reporte_indigo_login_header', 100 );

/**
 * Configuración de las consultas principales
 *
**/

function reporte_indigo_main_query($query) {
	if( ! is_admin() && $query->is_main_query() ):
		$query->set( 'no_found_rows', true );
		$query->set( 'suppress_filters', true );

		if ( is_post_type_archive('ri-latitud') ) :
			$query->set( 'posts_per_page', 13 );
			$query->set( 'post_status', 'publish' );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if ( is_post_type_archive('ri-indigonomics') ) :
            // $query->set( 'posts_per_page', 13 );
            // $query->set( 'post_status', 'publish' );
            // $query->set( 'no_found_rows', false );
            // $query->set( 'suppress_filters', false );

            $query->set( 'post_status', 'publish' );
            $query->set( 'no_found_rows', false );
            $query->set( 'suppress_filters', false );

            /**
             * Si cambias el apartado offset procura cambiarlo en
             * la función acoplada al filtro found_posts
             * add_filter( 'found_posts', ... );
             *
             **/
            $offset = 9;
            $ppp = 13;

            if ( ! $query->is_paged() ) {
                $query->set( 'posts_per_page', $ppp );
            } else {
                $query->set( 'posts_per_page', $ppp );
                $query->set( 'offset', $offset + ( ( $query->query_vars['paged'] - 2 ) * $ppp ) );
            }

		endif;

		if ( is_post_type_archive('ri-piensa') ) :
			$query->set( 'post_status', 'publish' );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
			$query->set( 'tax_query', [
				[	
					'taxonomy' 	=> 'ri-categoria',
					'field' 	=> 'slug',
					'terms' 	=> 'enfoqueindigo',
					'operator' 	=> 'NOT IN'
				]
			] );

			/**
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

		if ( is_post_type_archive('ri-encuestas') ) :
			$query->set( 'posts_per_page', 5 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if ( is_post_type_archive('ri-fan') ) :
			$query->set( 'posts_per_page', 15 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if ( is_post_type_archive('ri-desglose') ) :
			$query->set( 'posts_per_page', 14 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if ( is_tax('ri-categoria') || is_tax('ri-columna') || is_tax('ri-tema') || is_tax('ri-ciudad') ) :
			$query->set( 'posts_per_page', 19 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if ( is_author() ) :
			$query->set( 'post_type', ['ri-reporte','ri-opinion','ri-latitud','ri-indigonomics','ri-piensa','ri-fan','ri-desglose','ri-documento-indigo','ri-salida-emergencia','ri-especial'] );
			$query->set( 'posts_per_page', 52 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if( is_search() ) :
			$query->set( 'post_type', ['ri-reporte','ri-opinion','ri-latitud','ri-indigonomics','ri-piensa','ri-fan','ri-desglose','ri-documento-indigo','ri-salida-emergencia','ri-especial'] );
			$query->set( 'posts_per_page', 25 );
			$query->set( 'no_found_rows', false );
			$query->set( 'suppress_filters', false );
		endif;

		if ( $query->is_feed() ):
			$query->set( 'post_type', ['ri-reporte','ri-opinion','ri-latitud','ri-indigonomics','ri-piensa','ri-fan','ri-desglose','ri-documento-indigo','ri-salida-emergencia','ri-especial'] );
			$query->set( 'posts_per_rss', 50 );
			$query->set( 'suppress_filters', false );
		endif;

	endif;

	return $query;
}

add_action( 'pre_get_posts', 'reporte_indigo_main_query' );

function homepage_offset_pagination( $found_posts, $query ) {

    if( ! is_admin() && $query->is_main_query() ) {
        if ( is_post_type_archive('ri-indigonomics') ) :
            $offset = 9;
            $found_posts = $found_posts + $offset;
        endif;
    }
    
    if( ! is_admin() && $query->is_main_query() ) {
    	if ( is_post_type_archive('ri-piensa') ) :
    		$offset = 6;
    		$found_posts = $found_posts + $offset;
    	endif;
    }

    return $found_posts;
}

add_filter( 'found_posts', 'homepage_offset_pagination', 10, 2 );

function wp_term_chk_radio( $args ) {
 	if( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'ri-ciudad' ) {
 		require get_template_directory() . '/classes/walker/class-reporte-indigo-walker.php';

 		if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) {
 			$args['walker'] = new Reporte_Indigo_Walker;
 		}
 	}

    return $args;
}

add_filter( 'wp_terms_checklist_args', 'wp_term_chk_radio' );

function wpp_limit_query_execution_time($fields, $options){
    return '/*+ MAX_EXECUTION_TIME(3000) */ ' . $fields;
}

add_filter('wpp_query_fields', 'wpp_limit_query_execution_time', 10, 2);


function reporte_indigo_query_vars( $vars ) {
	$vars[] = 'publisher';

	return $vars;
}

add_filter('query_vars', 'reporte_indigo_query_vars' );

// Extiende un campo en REST API
add_action('rest_api_init', function() {
	register_rest_field(
		'post',
	    'image_media',
	    [
	        'get_callback'    => function($object){
	        	$new_image = null;
	        	$image = get_the_post_thumbnail_url($object['id'], 'medium_large');

	        	if( false !== $image ){
	        		$caption = get_the_post_thumbnail_caption($object['id']);
	        		$new_image = [
	        			'link' 	  => $image,
	        			'caption' => ( ! empty($caption) ) ? $caption : $object['title']['rendered']
	        		];
	        	}

	        	return $new_image;
	        },
	        'update_callback' => null,
	        'schema'          => null
	    ]
	);
});?>
