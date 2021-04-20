<?php
/**
 * Template Name: Edicion impresa
 *
 * Página de Edición impresa
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
get_header(); 
$edicion = get_query_var( 'publisher' );
$edicion = intval( $edicion );
$edicion = in_array( $edicion, [1158, 1156, 1157] ) ? $edicion : 1158;
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
					<div class="select-publish">
						<div class="btn-group" role="group" aria-label="select">
							<a class="<?=($edicion == 1158) ? "active" : "";?>" href="<?=esc_url( add_query_arg( 'publisher', 1158, home_url("edicion-impresa") ) );?>" title="Ir a edición impresa Nacional" role="button">Nacional</a>
							<a class="<?=($edicion == 1156) ? "active" : "";?>" href="<?=esc_url( add_query_arg( 'publisher', 1156, home_url("edicion-impresa") ) );?>" title="Ir a edición impresa Monterrey" role="button">Monterrey</a>
							<a class="<?=($edicion == 1157) ? "active" : "";?>" href="<?=esc_url( add_query_arg( 'publisher', 1157, home_url("edicion-impresa") ) );?>" title="Ir a edición impresa Guadalajara" role="button">Guadalajara</a>
						</div>
					</div>
					<div class="embed-container">
						<iframe class="lazyload" load="lazy" src="https://services.publish88.com/app/newspaper/publicacion-<?=$edicion;?>#DisablePreview=true" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>