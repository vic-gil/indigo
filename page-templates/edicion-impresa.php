<?php
/**
 * Template Name: Edición impresa
 *
 * Página de Edición impresa
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

get_header(); ?>

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
				<iframe src="https://services.publish88.com/app/newspaper/publicacion-1158" frameborder="0" allowfullscreen></iframe>
			</section>
		</div>
	</div>
</main>

<?php get_footer(); ?>
