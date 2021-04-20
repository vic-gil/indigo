<?php
/**
 * Parte de la plantilla para mostrar el componente tarjeta del valor del voto
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-tarjeta <?=$class?>">
	<article itemtype="http://schema.org/Article">
		<div class="header">
			<img src="<?=get_template_directory_uri()?>/assets/images/custom/elecciones-2021.svg" alt="logo-elecciones-2021" />
		</div>
		<div class="body">
			<h2 class="section">
				<a href="<?=get_permalink( get_page_by_title( 'El Valor del Voto' ) );?>">El valor del voto</a>
			</h2>
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
					<?php
					if( ! empty($tema) ) : $tema = $tema[0];
					?>
					<h2 class="tema">
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
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
						<?php the_author_posts_link();?>
					</address>
				</div>
			</div>
		</div>
	</article>
</div>