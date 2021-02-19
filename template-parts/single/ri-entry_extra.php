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
		<div class="col-md-6 col-lg-12">
		<?php
		Reporte_indigo_test::comment('Edición Digital');
		Reporte_indigo_templates::componente_edicion();
		?>	
		</div>
		<div class="anuncios mt">
			<div class="wrap">
				<div style="height:300px;"></div>
			</div>
		</div>
		<div class="col-md-6 col-lg-12">
		<?php
		Reporte_indigo_test::comment('Lo más visto');
		Reporte_indigo_templates::componente_titulo(FALSE, "Lo más visto");
		if ( function_exists('wpp_get_mostpopular') ) {
			wpp_get_mostpopular([
				'limit' 		=> 6,
				'range' 		=> 'last7days',
				'post_type' 	=> 'ri-reporte,ri-opinion,ri-latitud,ri-indigonomics,ri-piensa,ri-fan,ri-desglose,ri-documento-indigo,ri-salida-emergencia,ri-especial',
				'cat' 			=> '',
				'title_length' 	=> 55
			]);
		} else {
			Reporte_indigo_test::log('No existe el plugin para popular post');
		}
		?>
		</div>
		<div class="anuncios mt">
			<div class="wrap">
				<div style="height:300px;"></div>
			</div>
		</div>
	</div>
</section>