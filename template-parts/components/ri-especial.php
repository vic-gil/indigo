<?php
/**
 * Parte de la plantilla para mostrar el componente especial
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-especial <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<header>
			<h3>
				<?php the_title();?>
			</h3>
		</header>
		<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<picture>
					<?php the_post_thumbnail("large"); ?>
				</picture>
			</a>
			<?php
			if( ! empty( $jwplayer ) ) {
				Reporte_indigo_templates::componente_boton_jwplayer( $jwplayer );
			}
			?>
		</figure>
	</article>
</div>