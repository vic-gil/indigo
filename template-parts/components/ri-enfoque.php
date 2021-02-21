<?php
/**
 * Parte de la plantilla para mostrar el componente enfoque índigo
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$galeria = get_post_gallery( get_the_ID(), FALSE );
$imagenes = explode(',', $galeria['ids']);
$categoria = get_the_terms( get_the_ID(), 'ri-categoria' );
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$class = array_key_exists('class', $args) ? $args['class'] : '';
$share = array_key_exists('share', $args) ? $args['share'] : true;
?>
<div class="component-enfoque <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<?php
		if( $class == 'vmedium' && ! empty($categoria) ) : $categoria = $categoria[0];
		?>
		<header>
			<h2>
				<a href="<?=get_term_link($categoria);?>" title="<?=$categoria->name;?>">
					<?=$categoria->name;?>
				</a>
			</h2>
		</header>
		<?php
		endif;
		?>
		<div class="entry-content">
			<div class="entry-title">
				<div class="enfoque-title">
					EnfoqueIndigo
				</div>
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
			</div>
			<div class="entry-excerpt">
				<p><?php the_excerpt(); ?></p>	
			</div>
			<div class="swiper-container" id="sc-home-enfoque">
				<div class="swiper-wrapper" itemscope itemtype="http://schema.org/ImageGallery">
					<?php
					foreach ($imagenes as $key => $imagen) {
					?>
					<figure class="swiper-slide" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<picture>
								<?=wp_get_attachment_image($imagen, 'thumbnail');?>
							</picture>
						</a>
					</figure>
					<?php
					}
					?>
				</div>
				<div class="swiper-pagination" id="sp-enfoque"></div>
			</div>
		</div>
		<?php
		if($share){
		?>
		<footer>
			<button type="button" onclick="shareDialog(this);" data-link="<?php the_permalink();?>" data-title="<?=get_the_title();?>" aria-label="comparte">
				Compartir
			</button>
		</footer>
		<?php
		}
		?>
	</article>
</div>