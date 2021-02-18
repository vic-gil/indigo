<?php
/**
 * Template Name: Indigo Videos
 *
 * Página de Índigo Videos
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
get_header(); ?>
<main>
	
	<?php

	/**
	 *
	 * Datos transitorios para noticias nacionales
	 * Use esta función para borrar los datos:
	 *
	 * delete_transient('ri_cache_nacional');
	 *
	**/
	
	if( false === $posts = get_transient('ri_cache_page_videos') ) {

		$posts = new WP_Query([
			'post_type' 				=> "any",
			'posts_per_page' 			=> 17,
			'post_status'      			=> 'publish',
			'suppress_filters' 			=> true,
			'no_found_rows' 			=> true,
			'update_post_term_cache' 	=> false,
			'meta_query' 		=> [
				'relation' => 'AND',
				[
					'key' 		=> 'value_mediaid_jwp_meta',
		        	'value' 	=> '',
		        	'compare' 	=> '!='
				]
			]
			
		]);

		if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
   			set_transient('ri_cache_page_videos', $posts, 12 * HOUR_IN_SECONDS );
		}

	}

	if( $posts->have_posts() ) : $index = 0;
		while ( $posts->have_posts() ) : $posts->the_post();
			if($index == 0){
				echo '<div class="container wm"><div class="components">';
				get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'large', 'local' => false, 'share' => false ] );
				echo '</div></div>';
			}

			if( ( $index % 4 ) === 1 )
				echo '<div class="content-max wp"><div class="content"><div class="components">';

			if($index >= 1)
				get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'mini', 'local' => false, 'share' => false ] );

			if( ( $index % 4 ) === 0 )
				echo '</div></div></div>';
				
		$index++;
		endwhile;
		if ( $index > 0 && ( ( $index % 4 ) !== 0 ) && $index < 17 ) echo '</div></div></div>'; // Esto cierra cualquier componente
	endif;
	?>
		
</main>
<?php get_footer(); ?>