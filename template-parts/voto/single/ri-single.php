<?php
/**
 * Plantilla para las entradas del valor del voto
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
<article class="container wm">
	<div class="components">
		<?php
		Reporte_indigo_templates::componente_titulo(FALSE, 'El Valor del Voto'); 
		?>
		<div class="col-lg-8">
			<div class="components">
				<?php
					get_template_part( 'template-parts/single/voto/ri', 'featured_image' );
					get_template_part( 'template-parts/single/voto/ri', 'entry_content' );
				?>
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
				$opinion = new WP_Query([
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
				if( $opinion->have_posts() ) : $index = 0;
				?>
				<div class="container-opinion">
					<div class="header">
						<div class="htop">
							<img src="<?=get_template_directory_uri()?>/assets/images/custom/reporte-top-voto.svg" alt="logo-valor-del-voto-top" />
						</div>
						<div class="hbottom">
							<span>Opinión</span>
							<img src="<?=get_template_directory_uri()?>/assets/images/custom/reporte-bottom-voto.svg" alt="logo-valor-del-voto-bottom" />
						</div>
					</div>
					<div class="wrap">
					<?php
					while ( $opinion->have_posts() ) : $opinion->the_post();
						get_template_part( 'template-parts/voto/components/ri', 'opinion', [ 'class' => 'vmedium' ]);

						$exclude[] = get_the_ID();
					endwhile;
					?>
					</div>
				</div>
				<?php
				endif;
				wp_reset_postdata();
				$estados = new WP_Query([
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
				if( $estados->have_posts() ) : $index = 0;
				?>
				<div class="container-estados">
					<div class="header">
						<span>Estados</span>
						<img src="<?=get_template_directory_uri()?>/assets/images/custom/indigo-el-voto-short.svg" alt="logo-valor-del-voto-short" />
					</div>
					<div class="container-title">
						<h2>
							<a href="<?=get_permalink( get_page_by_title( 'El Valor del Voto' ) );?>">El valor del voto</a>
						</h2>
					</div>
					<?php
					while ( $estados->have_posts() ) : $estados->the_post();
						get_template_part( 'template-parts/voto/components/ri', 'estado' );

						$exclude[] = get_the_ID();
					endwhile;
					?>
				</div>
				<?php
				endif;
				wp_reset_postdata();
				?>
				<div class="anuncios vcontent mt">
					<div class="wrap">
						<a href="<?=get_permalink( get_page_by_title( 'Newsletter el valor del voto' ) );?>" title="Ir a newsletter del valor del voto">
							<img src="<?=get_template_directory_uri()?>/assets/images/custom/valor-del-voto-newsletter.png" alt="banner-newsletter" loading="lazy" width="300" height="600">
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
		$videos = new WP_Query([
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
		if( $videos->have_posts() ) : $index = 0;
		?>
		<div class="container-videos">
			<div class="body">
				<div class="wrap">
					<div class="msg">
						<p>Todo lo que tienes que saber del <span>#ElValorDelVoto</span> en estas elecciones las encuentras aquí</p>
					</div>
					<div class="logo">
						<figure>
							<picture>
								<img src="<?=get_template_directory_uri()?>/assets/images/custom/indigo-el-valor-del-voto.svg" alt="logo valor del voto" loading="lazy" width="243" height="84" />
							</picture>
						</figure>
					</div>
				</div>
				<div class="content">
					<div class="components">
						<?php
						while ( $videos->have_posts() ) : $videos->the_post();
							get_template_part( 'template-parts/voto/components/ri', 'play', [ 'class' => 'mini' ] );
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;
		wp_reset_postdata();
		?>
	</div>
</article>
