<?php
/**
 * Parte de la plantilla para mostrar contenido extras de la nota
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

?>

<section class="entry-extras">
	<div class="components">
		<?php
		Reporte_indigo_test::comment('Edición Digital');
		Reporte_indigo_templates::componente_edicion();
		?>
	</div>
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
</section>