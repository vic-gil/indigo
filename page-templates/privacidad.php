<?php
/**
 * Template Name: Privacidad
 *
 * Página de Privacidad
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

get_header();?>
<main>
	<div class="container wm">
		<div class="components">
			<nav aria-label="Breadcrumb" class="breadcrumb">
				<ol>
					<li>
						<a href="<?=home_url()?>" title="Regresar a página de inicio">Inicio</a>
					</li>
					<li>
						<h1>
							<a href="<?=get_permalink();?>" aria-current="page">
								<?=get_the_title();?>
							</a>
						</h1>
					</li>
				</ol>
			</nav>
			<section class="entry-content">
				<h2>GRUPO CAPITAL MEDIA</h2>
				<?php
				if ( have_posts() ): 
					while ( have_posts() ): the_post();
						the_content();
					endwhile;
				endif;
				?>
			</section>
			<section class="entry-extras">
				<div class="components">
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
					<?php
					Reporte_indigo_test::comment('Lo más visto');
					Reporte_indigo_templates::componente_titulo("", "Lo más visto");
					$posts_types = unserialize(POST_TYPE);
					$posts_types = is_array($posts_types) ? implode(",", $posts_types) : "any";
					if ( function_exists('wpp_get_mostpopular') ) {
						wpp_get_mostpopular([
							'limit' 		=> 6,
							'range' 		=> 'last7days',
							'post_type' 	=> $posts_types,
							'cat' 			=> '',
							'title_length' 	=> 55
						]);
					} else {
						Reporte_indigo_test::log('No existe el plugin para popular post');
					}
					?>
				</div>
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Recientes');
					Reporte_indigo_templates::componente_titulo("", "Recientes");
					/**
					 * Datos transitorios para noticias recientes
					 * Use esta función para borrar los datos:
					 *
					 * delete_transient('ri_cache_recientes');
					**/
					if( false === $recientes = get_transient('ri_cache_recientes') ) {

						$recientes = new WP_Query([
							'post_type' 		=> ['ri-reporte','ri-opinion','ri-latitud','ri-indigonomics','ri-piensa','ri-fan','ri-desglose','ri-documento-indigo','ri-salida-emergencia','ri-especial'],
							'posts_per_page' 	=> 5,
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true
						]);

						if ( ! is_wp_error( $recientes ) && $recientes->have_posts() ) {
			   				set_transient('ri_cache_recientes', $recientes, 1 * HOUR_IN_SECONDS );
						}

					}
					if ( $recientes->have_posts() ): 
						while ( $recientes->have_posts() ): $recientes->the_post();
							get_template_part( 'template-parts/components/ri', 'lista_imagen' );
						endwhile;
					endif;
					?>
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
				</div>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>