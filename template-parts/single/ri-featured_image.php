<?php
/**
 * Parte de la plantilla para mostrar imagen relacionada
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$tema = get_the_terms( get_the_ID(), 'ri-tema');
?>

<header class="component-cabecera">
	<div class="components">
		<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
			<picture>
				<?php the_post_thumbnail("large"); ?>
			</picture>
		</figure>
		<div class="entry-data">
			<?php
			if( ! empty( $jwplayer ) ) {
				Reporte_indigo_templates::componente_boton_jwplayer( $jwplayer, get_the_title(), 'jw-play-lg' );
			}
			?>
			<div class="entry-title">
				<?php
				if( ! empty($tema) ) : $tema = $tema[0];
				?>
				<h2>
					<a href="<?=get_term_link($tema);?>" title="<?=$tema->name;?>">
						<?=$tema->name;?>
					</a>
				</h2>
				<?php
				endif;
				?>
				<?php the_title('<h1>', '</h1>');?>
			</div>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
		</div>
	</div>
</header>
