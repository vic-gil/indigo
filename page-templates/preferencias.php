<?php
/**
 * Template Name: Preferencias
 *
 * Página para el control de las preferencias
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
			<button class="accordion active">Notificaciones</button>
			<div class="panel" id="panel-notification">
				<div class="onload-accordion">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: transparent; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
						<circle cx="50" cy="50" fill="none" stroke="#AFCAE9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
					  		<animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.408450704225352s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
						</circle>
					</svg>
					<span>Recuperando preferencias</span>
				</div>
				<form onsubmit="event.preventDefault(); sendTags(this);">
					<fieldset class="components">
						<?php
						$post_types = get_theme_mod('ri_temas_push', FALSE );
						if( ! empty($post_types) ): $post_types = explode(',', $post_types);
							foreach ($post_types as $post_type) {
								$tag = get_post_type_object( $post_type );
								?>
								<label for="tag-<?=$tag->name?>">
									<input type="checkbox" id="tag-<?=$tag->name?>" name="tags" value="<?=$tag->name?>">
									<?=$tag->label?>
								</label>
								<?php
							}
						endif;
						?>
						<div class="submit">
							<input type="submit" value="Guardar" class="btn-general">
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>