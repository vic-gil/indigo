<?php
/**
 * Plantilla para las entradas
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
get_header(); ?>
<main>
	<?php
	while ( have_posts() ) : the_post();
		$voto = get_the_terms( get_the_ID(), 'ri-voto' );
		if ( false !== $voto && ! is_wp_error( $voto ) ):
			get_template_part( 'template-parts/voto/single/ri', 'single', [ 'terms' => $terms ] );
		else:
			get_template_part( 'template-parts/single/ri', 'general' );
		endif;
	endwhile; // End the loop.
	?>
</main>
<?php get_footer(); ?>