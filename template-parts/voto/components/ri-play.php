<?php
/**
 * Parte de la plantilla para mostrar el componente play
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$post_type = get_post_type_object(get_post_type());
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$contain_local = array_key_exists('local', $args) ? $args['local'] : TRUE;
$is_share = array_key_exists('share', $args) ? $args['share'] : TRUE;
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-play <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<?php
		if($contain_local) :
		?>
		<div class="entry-local">
			<h2>
				<a href="<?=get_post_type_archive_link( get_post_type() );?>" title="<?=$post_type->label;?>">
					<?=$post_type->label;?>
				</a>
			</h2>
		</div>
		<?php
		endif;
		?>
		<div class="entry-content">
			<figure class="interno" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
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
				<?php
				if($class == "large") {
				?>
				<div class="entry-excerpt">
					<p><?php the_excerpt(); ?></p>	
				</div>
				<?php
				}
				?>
				<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
					<?php the_author_posts_link();?>
				</address>
				<?php
				if($is_share) {
				?>
				<div class="share">
					<?php
					if($class == "large") {
					?>
					<button type="button" onclick="shareDialog(this);" data-link="<?php the_permalink(); ?>" data-title="<?=get_the_title();?>" aria-label="comparte">Compartir</button>
					<?php
					} else {
					?>
					<button type="button" onclick="shareDialog(this);" data-link="<?php the_permalink(); ?>" data-title="<?=get_the_title();?>" class="fas fa-share-alt" aria-label="comparte"></button>
					<?php
					}
					?>
				</div>
				<?php	
				}
				?>
			</div>
		</div>
	</article>
</div>