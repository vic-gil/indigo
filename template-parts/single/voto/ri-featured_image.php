<?php
/**
 * Parte de la plantilla para mostrar imagen relacionada
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$galeria = get_post_gallery( get_the_ID(), FALSE );
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
?>
<header class="component-cabecera-voto">
	<div class="components">
	<?php
	if ( false !== $galeria ){
		$imagenes = explode(',', $galeria['ids']);
	} else {
	?>
		<div>
			<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
				<picture>
					<?php the_post_thumbnail("large"); ?>
				</picture>
				<?php
				if( ! empty( $jwplayer ) ) {
					Reporte_indigo_templates::componente_boton_jwplayer( $jwplayer, get_the_title() );
				}
				?>
			</figure>
			<div>
				<a href=""></a>
			</div>
			<div>
				<?php the_title('<h1 itemprop="headline">', '</h1>');?>
			</div>
			<div class="entry-excerpt">
				<?php the_excerpt();?>
			</div>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
		</div>
	<?php
	}
	?>
	</div>
</header>

