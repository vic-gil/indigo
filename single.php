<?php 
$terms = wp_list_pluck( get_terms( 'ri-voto' ), 'term_id' );
get_header(); 
?>
<main>
	<?php
	if ( ! has_term($terms, 'ri-voto') ):
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/sections/ri', 'general' );
		endwhile; // End the loop.
		Reporte_indigo_test::comment('Newsletter');
		?>
		<div class="content-max">
			<div class="content">
			<?php
				Reporte_indigo_templates::componente_boletin( get_permalink( get_page_by_path( 'Newsletter' ) ) );
			?>
			</div>
		</div>
	<?php
	else:
		get_template_part( 'template-parts/sections/ri', 'voto' );
	endif;
	?>
</main>
<?php get_footer(); ?>
