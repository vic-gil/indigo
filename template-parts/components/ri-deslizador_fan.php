<?php
/**
 * Parte de la plantilla para mostrar el componente deslizador de la sección fans
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$jwplayer = get_post_meta( get_the_ID(), 'value_mediaid_jwp_meta', TRUE );
$class = array_key_exists('class', $args) ? $args['class'] : '';
$bullets = array_key_exists('total', $args) ? intval($args['total']) : FALSE;
?>
<div class="swiper-slide <?=$class;?>">
	<article class="deslizador-fan" itemtype="http://schema.org/Article">
		<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
			<a href="<?=$data['format_link']?>" title="<?=$data['post_title'];?>">
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
			?>
			<ul id="sw-nav-top">
			<?php
			$max = ($bullets >= 3) ? 3 : $bullets;
				for($j = 0; $j < $max; $j++) {
			?>
				<li class="<?=$active = $j == 0 ? 'active' : '';?>" role="group">
				    <a href="javascript:void(0);" title="<?=($j + 1);?> / <?=$max;?>">
				    	<i class="fas fa-circle"></i>
				    </a>
				</li>
			<?php
				}
			?>
			</ul>
			<?php
			}
			?>
		</div>
	</article>
</div>