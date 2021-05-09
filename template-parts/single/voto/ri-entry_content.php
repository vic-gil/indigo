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
		<div style="position:relative; overflow:hidden; padding-bottom:62.5%">
			<script id="jw-iframe-embed-TQ8NKbeX-ixhD10k3" type="text/javascript" async src="https://cdn.jwplayer.com/iframe-embed/TQ8NKbeX-ixhD10k3.js"></script>
		</div>
	</div>
</section>
