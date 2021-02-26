<?php
/**
 * Parte de la plantilla para mostrar contenido extras de la nota
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

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
					'no_found_rows' 		=> true
				]);
				if ( $estados->have_posts() ):
					while ( $estados->have_posts() ): $estados->the_post();
						get_template_part( 'template-parts/components/ri', 'estado' );
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