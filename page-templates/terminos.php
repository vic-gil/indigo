<?php
/**
 * Template Name: Términos de uso
 *
 * Página de Términos de uso
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

get_header();?>
<main>
	<div class="container wm">
		<div class="components">
			<section id="breadcrumb">
				<div>
					<span>
						<a href="<?=home_url()?>" title="Regresar a página de inicio">Inicio</a>
					</span>
					<span class="active">
						<h1><?=get_the_title();?></h1>
					</span>
				</div>
			</section>
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
							'post_type' 				=> 'any',
							'posts_per_page' 			=> 5,
							'post_status'      			=> 'publish',
							'suppress_filters' 			=> false,
							'no_found_rows' 			=> true
						]);

						if ( ! is_wp_error( $recientes ) && $recientes->have_posts() ) {
			   				set_transient('ri_cache_recientes', $recientes, 1 );
						}

					}
					if ( $recientes->have_posts() ): 
						while ( $recientes->have_posts() ): $recientes->the_post();
							get_template_part( 'template-parts/components/ri', 'lista_imagen' );
						endwhile;
					endif;
					?>
				</div>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>
