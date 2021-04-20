<?php
/**
 * Parte de la plantilla para mostrar el contenido de la nota
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

?>

<section class="entry-content">
	<div class="components">
		<div class="entry-info">
			<span><?php the_time('d \d\e M, Y');?></span>
			<button type="button" onclick="shareDialog();" class="ri-icon-share-alt" aria-label="comparte" ></button>
		</div>
		<div class="main-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* Traducciones: %s: Título de la entrada. Visible unicamente por lectores de pantalla */
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
		?>
		</div>
	</div>
</section>