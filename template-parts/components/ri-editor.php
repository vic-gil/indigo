<?php
/**
 * Parte de la plantilla para mostrar el componente selección del editor
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-editor <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<div class="entry-content">
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
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_title();?>
					</a>
				</h3>
				<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
					<?php the_author_posts_link();?>
				</address>
			</div>
		</div>
		<footer>
			<button type="button" onclick="shareDialog(this);" data-link="<?php the_permalink(); ?>" data-title="<?=get_the_title();?>" class="fas fa-share-alt" aria-label="comparte">
			</button>
		</footer>
	</article>
</div>