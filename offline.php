<?php
/**
 * Plantilla preeterminada para fuera de linea
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
			<div>
				<figure>
					<img src="<?=get_template_directory_uri() . '/assets/images/custom/offline.png'?>">
				</figure>
			</div>
			<div>
				<h1>Desconectado</h1>
				<p>Parece ser que haz perdido tu conexión a Internet</p>
			</div>
		</div>
	</div>
	<style type="text/css">
		figure {
			text-align: center;
		}
		h1,
		p {
			font-family: "Roboto";
		}
	</style>
</main>
<?php get_footer(); ?>