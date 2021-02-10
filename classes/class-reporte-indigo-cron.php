<?php
/**
 * Reporte_Indigo_Cron Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee el funciones para el cron
 * 
**/

class Reporte_Indigo_Cron {

	private $name;
	private $posts;
	private $postType;
	private $perPage;
	private $city;

	public function __construct(?string $name = null, ?string $posts = null, ?string $postType = null, ?string $city = null, ?int $perPage = 0) {
		$this->name = $name;
		$this->posts = $posts;
		$this->postType = $postType;
		$this->city = $city;
		$this->perPage = $perPage;
	}

	/**
	 * Crea datos transitorios para la sección home
	 *
	 * @return void
	**/
	function cache_query_by_selection() {
		if( ! empty( $this->posts ) ) {
			$selected = is_serialized( $this->posts ) ? unserialize( $this->posts ) : $this->posts;

			if( is_array($selected) ) {

				$posts = new WP_Query([
					'posts_per_page'	=> count($selected),
					'post_type' 		=> 'any',
					'post__in' 			=> $selected,
					'post_status'      	=> 'publish',
					'suppress_filters' 	=> false,
					'no_found_rows' 	=> true,
					'orderby' 			=> 'post__in'
				]);

				if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
					echo '<p>Se crearon datos transitorios con nombre: <strong>' . $this->name . '</strong></p>';
			   		set_transient($this->name, $posts, 12 * HOUR_IN_SECONDS );
				}
			
			}
			
		}
	}

	/**
	 * Crea datos transitorios para la sección reporte
	 *
	 * @return void
	**/
	function cache_query_by_config() {
		$posts = new WP_Query([
			'posts_per_page'	=> $this->perPage,
			'post_type' 		=> $this->postType,
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> false,
			'no_found_rows' 	=> true,
			'update_post_term_cache' 	=> false,
			'meta_query' 				=> [
				[
					'key' 	=> '_ciudad_meta',
		            'value' => $this->city
				]
			]
		]);

		if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
			echo '<p>Se crearon datos transitorios con nombre: <strong>' . $this->name . '</strong></p>';
			set_transient($this->name, $posts, 12 * HOUR_IN_SECONDS );
		}
	}

	/**
	 * Crea intervalos de tiempo. 
	 *
	 * @param array  $schedules Un arreglo con intervalos de tiempo
	 *
	 * @return array El arreglo con todos los intervalos propios.
	**/

	public static function add_cron_interval( $schedules ) { 

		$schedules['every_second'] = [
			'interval' => 1,
			'display'  => esc_html__( 'Every Second' )
		];

		$schedules['every_five_minutes'] = [
			'interval' => 300,
			'display'  => esc_html__( 'Every Five Minutes' )
		];
	    
	    return $schedules;
	}

	/**
	 * Crea el gancho especifico para el cron
	 *
	 * @return void
	**/

	public static function schedule_cron_events() { 
		if ( ! wp_next_scheduled( 'cron_every_second') ) {
        	wp_schedule_event( time(), 'every_second', 'cron_every_second' );
    	}

	    if ( ! wp_next_scheduled( 'cron_every_five_minutes') ) {
        	wp_schedule_event( time(), 'every_five_minutes', 'cron_every_five_minutes' );
    	}
	}
}

add_filter( 'cron_schedules', ['Reporte_Indigo_Cron', 'add_cron_interval'] );
add_action( 'init', ['Reporte_Indigo_Cron', 'schedule_cron_events'] );