<?php
/**
 * Parte de la plantilla para mostrar el componente opinion
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$class = array_key_exists('class', $args) ? $args['class'] : '';
$voto = get_the_terms( get_the_ID(), 'ri-voto' );
$author = $post->post_author;
?>
<div class="component-opinion <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<header>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
		</header>
		<div class="entry-content">
			<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
				<?php printf(
					'<a href="%1$s" title="%2$s" rel="author"><picture>%3$s</picture></a>',
					esc_url( get_author_posts_url( $author, get_the_author_meta("nicename", $author) ) ),
					esc_attr( sprintf( __( 'Posts by %s' ), get_the_author_meta("display_name", $author) ) ),
					get_wp_user_avatar( $author, "thumbnail" )
  				); ?>
			</figure>
			<div class="entry-title">
				<?php
				if( ! empty($voto) ) : $voto = $voto[0];
				?>
				<h2>
					<a href="<?=get_term_link($voto);?>" title="<?=$voto->name;?>">
						<?=$voto->name;?>
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
			</div>
		</div>
		<footer>
			<button type="button" onclick="shareDialog(this);" data-link="<?php the_permalink(); ?>" data-title="<?=get_the_title();?>" class="ri-icon-share-alt" aria-label="comparte">
			</button>
		</footer>
	</article>
</div>