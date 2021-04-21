<?php
/**
 * Template Name: Personalizado
 *
 * Página de personalizada
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
get_header();
?>
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
			<section class="digital">
				<div class="wrap">
					<div class="content">
						<?php
						while ( have_posts() ) : the_post();
							the_content(
								sprintf(
									wp_kses(
										__( 'Continuar leyendo<span class="screen-reader-text"> "%s"</span>', 'reporte_indigo' ),
										[
											"span" => [
												"class" => [] 
											]
										]
									),
									get_the_title()
								)
							);
						endwhile;
						?>
					</div>
				</div>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>