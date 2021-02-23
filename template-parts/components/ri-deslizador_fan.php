<?php
/**
 * Parte de la plantilla para mostrar el componente deslizador de la sección fans
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$class = array_key_exists('class', $args) ? $args['class'] : '';
$bullets = array_key_exists('total', $args) ? intval($args['total']) : FALSE;
?>
<div class="swiper-slide <?=$class;?>">
	<article class="deslizador-fan" itemtype="http://schema.org/Article">
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
		<div class="entry-data">
			<div class="entry-title">
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_title();?>
					</a>
				</h3>
			</div>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
			<?php
			if ( FALSE !== $bullets ) {
				$max = ($bullets >= 3) ? 3 : $bullets;
			?>
			<div class="pagination">
				<?php
				for($j = 0; $j < $max; $j++) {
				?>
					<span class="fas fa-circle <?= ($j == 0) ? 'active' : ''?>"></span>
				<?php
				}
				?>
			</div>
			<?php
			}
			?>
		</div>
	</article>
</div>