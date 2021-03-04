<?php
/**
 * Plantilla para las entradas en general
 *
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$exclude = [];
$exclude[] = get_the_ID();
?>
<article class="container wm">
	<div class="components">
		<?php 
			get_template_part( 'template-parts/single/general/ri', 'featured_image' );
			get_template_part( 'template-parts/single/general/ri', 'entry_content' );
		?>
		<section class="entry-extras">
			<div class="components order">
				<div class="col-md-6 col-lg-12">
				<?php
				Reporte_indigo_test::comment('Edición Digital');
				Reporte_indigo_templates::componente_edicion();
				?>	
				</div>
				<div class="anuncios vcontent mt">
					<div class="wrap">
						<?php
						get_template_part('template-parts/sponsors/ri', 'anuncio', [
							'format' => '70853',
							'site' => '70494',
							'page' => '535121',
							'delay' => 3500,
						]);
						?>
					</div>
				</div>
				<div class="col-md-6 col-lg-12">
				<?php
				Reporte_indigo_test::comment('Lo más visto');
				Reporte_indigo_templates::componente_titulo(FALSE, "Lo más visto");
				if ( function_exists('wpp_get_mostpopular') ) {
					wpp_get_mostpopular([
						'limit' 		=> 6,
						'range' 		=> 'last7days',
						'post_type' 	=> 'ri-reporte,ri-opinion,ri-latitud,ri-indigonomics,ri-piensa,ri-fan,ri-desglose,ri-documento-indigo,ri-salida-emergencia,ri-especial',
						'cat' 			=> '',
						'title_length' 	=> 55
					]);
				} else {
					Reporte_indigo_test::log('No existe el plugin para popular post');
				}
				?>
				</div>
				<div class="anuncios vcontent mt">
					<div class="wrap">
						<?php
						get_template_part('template-parts/sponsors/ri', 'anuncio', [
							'format' => '70854',
							'site' => '70494',
							'page' => '535121',
							'delay' => 2000
						]);
						?>
					</div>
				</div>
				<div class="col-md-6 col-lg-12">
					<div class="components">
						<div class="container-estados">
						<div class="container-title">
							<h2>
								Estados
							</h2>
						</div>
						<?php
						$estados = new WP_Query([
							'post_type' 			=> 'ri-reporte',
							'posts_per_page' 		=> 5,
							'post_status'      		=> 'publish',
							'suppress_filters' 		=> false,
							'ignore_sticky_posts'	=> true,
							'no_found_rows' 		=> true,
							'post__not_in'			=> $exclude
						]);
						if ( $estados->have_posts() ):
							while ( $estados->have_posts() ): $estados->the_post();
								get_template_part( 'template-parts/components/ri', 'estado' );

								$exclude[] = get_the_ID();
							endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php
				do_action('ri_clickio_single_page');
				?>
			</div>
		</section>
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

			$related = new WP_Query([
				'post_type' 		=> get_post_type(),
				'posts_per_page' 	=> 3,
				'post_status'      	=> 'publish',
				'suppress_filters' 	=> false,
				'no_found_rows' 	=> true,
				'post__not_in'		=> $exclude,
				'tax_query' 		=> [
					[
						'taxonomy' 	=> $tema->taxonomy,
						'field'	   	=> 'slug',
						'terms'	 	=> $tema->slug
					]
				]
			]);

			if( $related->have_posts() ) : 
				while ( $related->have_posts() ) : $related->the_post();
					get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vmini" ] );

					$exclude[] = get_the_ID();
				endwhile;
			else:
				Reporte_indigo_test::log('No hay post para el bloque');
			endif;

		endif;
		?>
	</div>
</article>
<?php Reporte_indigo_test::comment('Newsletter'); ?>
<div class="content-max">
	<div class="content">
	<?php Reporte_indigo_templates::componente_boletin( get_permalink( get_page_by_path( 'Newsletter' ) ) ); ?>
	</div>
</div>