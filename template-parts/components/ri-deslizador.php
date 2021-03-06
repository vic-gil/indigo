<?php
/**
 * Parte de la plantilla para mostrar el componente deslizador
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$loading = array_key_exists('loading', $args) ? $args['loading'] : 'lazy';
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$total = array_key_exists('total', $args) ? intval($args['total']) : FALSE;
?>
<div class="swiper-slide">
	<article class="deslizador" itemtype="http://schema.org/Article">
		<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<picture>
					<?php the_post_thumbnail("full", [ 'loading' => $loading ]); ?>
				</picture>
			</a>
		</figure>
		<div class="entry-data">
			<?php
			if( ! empty( $jwplayer ) ) {
				Reporte_indigo_templates::componente_boton_jwplayer( $jwplayer, '', 'jw-play-lg' );
			}
			?>
			<div class="entry-title">
				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_title();?>
					</a>
				</h2>
			</div>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
			<div class="pagination">
				<?php
				for($i = 0; $i < $total; $i++) {
				?>
					<span class="ri-icon-circle <?= ($i == 0) ? 'active' : ''?>" data-index="<?=($i);?>"></span>
				<?php
				}
				?>
			</div>
		</div>
	</article>
</div>
