<article class="container wm">
	<div class="components">
		<?php 
			get_template_part( 'template-parts/single/ri', 'featured_image' );
			get_template_part( 'template-parts/single/ri', 'entry_content' );
			get_template_part( 'template-parts/single/ri', 'entry_extra' );
		?>
	</div>
	<div class="components">
		<div class="anuncios mt">
			<div class="wrap">
			<?php
			get_template_part('template-parts/sponsors/ri', 'anuncio', [
				'format' => '70741',
				'site' => '70494',
				'page' => '535121',
				'delay' => 5000
			]);
			?>
			</div>
		</div>
	</div>
	<div class="components">
		<?php
		Reporte_indigo_test::comment('Relacionados');
		Reporte_indigo_templates::componente_titulo("", "Te puede interesar");

		$tema = get_the_terms( get_the_ID(), 'ri-tema');
		
		if( false !== $tema && ! is_wp_error( $tema ) ) : $tema = $tema[0];

			if( false === $related = get_transient('ri_cache_related_' . $tema->slug ) ) {

				$related = new WP_Query([
					'post_type' 		=> get_post_type(),
					'posts_per_page' 	=> 3,
					'post_status'      	=> 'publish',
					'suppress_filters' 	=> false,
					'post__not_in'		=> [ get_the_ID() ],
					'no_found_rows' 	=> true,
					'tax_query' 		=> [
						[
							'taxonomy' 	=> $tema->taxonomy,
							'field'	   	=> 'slug',
							'terms'	 	=> $tema->slug
						]
					]
				]);

				if ( ! is_wp_error( $related ) && $related->have_posts() ) {
	   				set_transient('ri_cache_related_' . $tema->slug, $related, 1 * HOUR_IN_SECONDS );
				}

			}

			if( $related->have_posts() ) : 
				while ( $related->have_posts() ) : $related->the_post();
					get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vmini" ] );
				endwhile;
			else:
				Reporte_indigo_test::log('No hay post para el bloque');
			endif;

		endif;
		?>
	</div>
</article>