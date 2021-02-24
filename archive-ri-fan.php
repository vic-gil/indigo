<?php get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
		<?php
		$index = 0;
		if( have_posts() ) : 
			$bullets = $wp_query->post_count - 5;
			while ( have_posts() ) : the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/ri', 'general' );
					echo '</div></div>';
					echo '<div class="col-lg-4"><div class="components">';
					
					$one = new WP_Query([
						'post_type' 			=> 'ri-dato-dia',
						'posts_per_page' 		=> 1,
						'post_status'      		=> 'publish',
						'suppress_filters' 		=> false,
						'ignore_sticky_posts'	=> true,
						'no_found_rows' 		=> true
					]);

					if ( $one->have_posts() ):
						while ( $one->have_posts() ): $one->the_post();
							get_template_part( 'template-parts/components/ri', 'dato_dia' );
						endwhile;
					endif;
					wp_reset_postdata();
					
					echo '</div></div>';
				}

				if ( $index == 1)
					echo '<div class="col-lg-8"><div class="components">';

				if ( $index >= 1 && $index <= 4 )
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vsmall' ] );

				if ( $index == 5 )
					echo '<div class="swiper-container" id="slider-fan"><div class="swiper-wrapper">';
				
				if ( $index >= 5 && $index <= 7 )
					get_template_part( 'template-parts/components/ri', 'deslizador_fan', [ 'total' => $bullets ] );

				if ( $index == 7 )
					echo '</div></div></div></div>';

				if ( $index == 8 ){
					echo '<div class="col-lg-4"><div class="components">';

					$one = new WP_Query([
						'post_type' 			=> 'ri-opinion',
						'posts_per_page' 		=> 1,
						'post_status'      		=> 'publish',
						'suppress_filters' 		=> false,
						'no_found_rows' 		=> true,
						'tax_query' 			=> [
							[
								'taxonomy' 	=> 'ri-columna',
								'field'	   	=> 'slug',
								'terms'	 	=> 'desde-mi-palco'
							]
						]
					]);

					if ( $one->have_posts() ):
						while ( $one->have_posts() ): $one->the_post();
							get_template_part( 'template-parts/components/ri', 'piensa', [ 'class' => 'vmedium', 'excerpt' => false, 'share' => false, 'type' => '__c' ] );
						endwhile;
					endif;

					wp_reset_postdata();

					get_template_part( 'template-parts/components/ri', 'piensa', [ 'class' => 'vmedium', 'share' => false, 'type' => '__a' ] );
					echo '<div class="anuncios mt"><div class="wrap"><div style="height: 600px;"></div></div></div>';
					echo '</div></div>';

					echo '</div></div>'; // Cierra el contenedor principal
					echo '<div class="content-max"><div class="content"><div class="components wp">'; // Abre contenedor videos
					
					if( false === $videos = get_transient('ri_cache_videos') ) {
						$videos = new WP_Query([
							'post_type' 		=> 'any',
							'posts_per_page' 	=> 4,
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true,
							'meta_query' 		=> [
								'relation' => 'AND',
								[
									'key' 		=> '_mediaid_jwp_meta',
					            	'value' 	=> '',
					            	'compare' 	=> '!='
								]
							]
						]);

						if ( ! is_wp_error( $videos ) && $videos->have_posts() ) {
			   				set_transient('ri_cache_videos', $videos, 12 * HOUR_IN_SECONDS );
						}
					}
					
					if ( $videos->have_posts() ):
						while ( $videos->have_posts() ): $videos->the_post();
							get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'mini', 'local' => FALSE ] );
						endwhile;
						echo '<div class="tc"><a href="<?=get_permalink( get_page_by_path( \'indigo-videos\' ) ) ?>" title="Ir a entradas nacionales" class="btn-general" role="button">Ver más videos <i class="fas fa-caret-right"></i></a></div>';
					endif;
					echo '</div></div></div>'; // Con esto cerramos contenedor de video
					echo '<div class="container wm"><div class="components">'; // Abrimos un nuevo contenedor
				}

				if( $index == 9 ){
					echo '<div class="col-12"><div class="components">';
				}

				if( $index >= 9 )
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "fan" ] );

				$index++;
			endwhile;
			echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
		endif;
		?>
		</div>
	</div>
	<div class="container">
		<div class="components">
			<div class="component-pagination">
				<div class="wrap">
					<span class="page-dir"><?php previous_posts_link('<span class="fas fa-angle-left"></span>'); ?></span>
					<div class="page-number">
						<?=paginate_links([
							'mid_size' => 1,
							'prev_next' => false
						]);?>
					</div>
					<span class="page-dir"><?php next_posts_link('<span class="fas fa-angle-right"></span>'); ?></span>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
