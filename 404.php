<?php
/**
 * Plantilla error 404
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
get_header();?>
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
							404
						</h1>
					</li>
				</ol>
			</nav>
			<section class="component-error">
				<div class="entries">
					<span class="fas fa-exclamation-circle"></span>
					<p><span class="error">error</span></p>
					<p><span class="code">404</span></p>
					<p><span class="msg">LO SENTIMOS, ESTA PÁGINA NO EXISTE</span></p>
				</div>
			</section>
			<?php
			Reporte_indigo_test::comment('Te recomendamos');
			Reporte_indigo_templates::componente_titulo("", "Te recomendamos");
			$posts_types = unserialize(POST_TYPE);
			$posts_types = is_array($posts_types) ? implode(",", $posts_types) : "any";
			if ( function_exists('wpp_get_mostpopular') ) {
				wpp_get_mostpopular([
					'limit' 		=> 4,
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
	</div>
</main>
<?php get_footer(); ?>