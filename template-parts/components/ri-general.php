<?php
/**
 * Parte de la plantilla para mostrar el componente general mini
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$categoria = get_the_terms( get_the_ID(), 'ri-categoria' );
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$ciudad = get_post_meta( get_the_ID(), '_ciudad_meta', TRUE );
$jwplayer = get_post_meta( get_the_ID(), 'value_mediaid_jwp_meta', TRUE );
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>

<div class="component-general <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<?php
		if( ! empty($categoria) ) : $categoria = $categoria[0]
		?>
			<div class="entry-local">
				<h3>
					<a href="<?=get_term_link($categoria);?>" title="<?=$categoria->name;?>">
						<?=$categoria->name;?>
					</a>
				</h3>
			</div>
		<?php
		elseif( ! empty( $ciudad ) ) : $link = get_permalink( get_page_by_path( 'Ciudad' ) ) . '?city=' . $ciudad;	
		?>
			<div class="entry-local">
				<h3>
					<a href="<?=$link;?>" title="<?=$ciudad;?>">
						<?=$ciudad;?>
					</a>
				</h3>
			</div>
			<?php
		endif;
		?>
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
				<?php the_excerpt(); ?>
			</div>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
		</div>
	</article>
</div>