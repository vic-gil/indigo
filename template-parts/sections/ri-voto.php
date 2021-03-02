<?php
/**
 * Plantilla para el single del valor del voto
 *
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$exclude = [];
$exclude[] = get_the_ID();
$terms = wp_list_pluck( get_terms( 'ri-voto' ), 'term_id' );
?>
<div class="container">
	<div class="components">
		<?php
		Reporte_indigo_templates::componente_titulo(FALSE, 'El Valor del Voto'); 
		?>
		<div class="col-lg-8">
			<div class="components">
				<article>
					<?php
					get_template_part( 'template-parts/single/voto/ri', 'featured_image' );
					get_template_part( 'template-parts/single/voto/ri', 'entry_content' );
					?>
				</article>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="components">
				<div class="anuncios vcontent mt">
					<div class="wrap">
						<?php
							get_template_part('template-parts/sponsors/ri', 'anuncio', [
								'format' 	=> '88164',
								'site' 		=> '70494',
								'page' 		=> '535121',
								'delay' 	=> 2500,
							]);
						?>
					</div>
				</div>
				<?php
				$posts = new WP_Query([
					'post_type' 				=> ['ri-opinion'],
					'posts_per_page' 			=> 2,
					'post_status'      			=> 'publish',
					'suppress_filters' 			=> false,
					'no_found_rows' 			=> true,
					'update_post_term_cache' 	=> false,
					'post__not_in'				=> $exclude,
					'tax_query' => [
						[
							'taxonomy' => 'ri-voto',
			        		'field'    => 'id',
			        		'terms'    => $terms,
						]
					]
				]);
				if( $posts->have_posts() ) : $index = 0;
					while ( $posts->have_posts() ) : $posts->the_post();
						get_template_part( 'template-parts/components/ri', 'opinion', [ 'class' => 'vmedium' ]);

						$exclude[] = get_the_ID();
					endwhile;
				endif;
				wp_reset_postdata();

				$posts = new WP_Query([
					'post_type' 				=> ['ri-reporte'],
					'posts_per_page' 			=> 4,
					'post_status'      			=> 'publish',
					'suppress_filters' 			=> false,
					'no_found_rows' 			=> true,
					'update_post_term_cache' 	=> false,
					'post__not_in'				=> $exclude,
					'tax_query' => [
						[
							'taxonomy' => 'ri-voto',
				    		'field'    => 'id',
				    		'terms'    => $terms,
						]
					]
				]);
				if( $posts->have_posts() ) : $index = 0;
				?>
				<div class="container-estados">
					<div class="header">
						ESTADOS #ElValorDelVoto
					</div>
					<div class="container-title">
						<h2>
							#ELVALORDELVOTO
						</h2>
					</div>
					<?php
					while ( $posts->have_posts() ) : $posts->the_post();
						get_template_part( 'template-parts/components/ri', 'estado' );

						$exclude[] = get_the_ID();
					endwhile;
					?>
				</div>
				<?php
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
		$posts = new WP_Query([
			'post_type' 				=> 'any',
			'posts_per_page' 			=> 4,
			'post_status'      			=> 'publish',
			'suppress_filters' 			=> false,
			'no_found_rows' 			=> true,
			'update_post_term_cache' 	=> false,
			'post__not_in'				=> $exclude,
			'meta_query' 			=> [
				'relation' => 'AND',
				[
					'key' 		=> '_mediaid_jwp_meta',
		           	'value' 	=> '',
		           	'compare' 	=> '!='
				]
			],
			'tax_query' => [
				[
					'taxonomy' => 'ri-voto',
		    		'field'    => 'id',
		    		'terms'    => $terms,
				]
			]
		]);
		if( $posts->have_posts() ) : $index = 0;
		?>
		<div class="container-videos">
			<div class="header">
				<?=get_the_title();?>
			</div>
			<div class="body">
				<div class="wrap">
					<div class="msg">
						<p>Todo lo que tienes que saber del <span>#ElValorDelVoto</span> en estas elecciones las encuentras aquí</p>
					</div>
					<div class="logo">
						<figure>
							<picture>
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" width="230" height="230">
							</picture>
						</figure>
					</div>
				</div>
				<div class="components">
					<?php
					while ( $posts->have_posts() ) : $posts->the_post();
						get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'mini' ] );
					endwhile;
					?>
				</div>
			</div>
		</div>
		<?php
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>