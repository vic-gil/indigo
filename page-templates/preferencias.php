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
			<?php
			if( ! wp_is_mobile() ):
			?>
			<button class="accordion">Notificaciones</button>
			<div class="panel">
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
			<?php
			endif;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>

