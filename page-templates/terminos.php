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
			<div id="breadcrumb">
				<span>
					<a href="<?=home_url()?>" title="Regresar a página de inicio">Inicio</a>
				</span>
				<span class="active">
					<h1>Términos de uso</h1>
				</span>
			</div>
			<div class="col-lg-8 entry-content">
				<h2>GRUPO CAPITAL MEDIA</h2>
				<?php
				if ( have_posts() ): 
					while ( have_posts() ): the_post();
						the_content();
					endwhile;
				endif;
				?>
			</div>
			<div class="col-lg-4">
				
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
