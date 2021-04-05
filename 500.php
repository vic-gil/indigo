<?php
/**
 * Plantilla preeterminada para error 500
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
					<img src="<?=get_template_directory_uri() . '/assets/images/custom/500.png'?>">
				</figure>
			</div>
			<div>
				<h1>Error 500</h1>
				<p>Tenemos problemas para mostrar está publicación vuelve a intentarlo más tarde</p>
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