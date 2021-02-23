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
$ciudad = get_the_terms( get_the_ID(), 'ri-ciudad' );
$jwplayer = get_post_meta( get_the_ID(), '_mediaid_jwp_meta', TRUE );
$class = array_key_exists('class', $args) ? $args['class'] : '';
$contain_author = array_key_exists('author', $args) ? $args['author'] : TRUE;
$contain_image = array_key_exists('image', $args) ? $args['image'] : TRUE;
$contain_category = array_key_exists('category', $args) ? $args['category'] : TRUE;
$contain_local = array_key_exists('local', $args) ? $args['local'] : TRUE;
$contain_excerpt = array_key_exists('excerpt', $args) ? $args['excerpt'] : TRUE;
?>

<div class="component-general <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<?php
		if( ! empty($categoria) && $contain_category ) : $categoria = $categoria[0]
		?>
			<div class="entry-local">
				<h3>
					<a href="<?=get_term_link($categoria);?>" title="<?=$categoria->name;?>">
						<?=$categoria->name;?>
					</a>
				</h3>
			</div>
		<?php
		elseif( ! empty( $ciudad ) && $contain_local ) : $ciudad = $ciudad[0];
		?>
			<div class="entry-local">
				<h3>
					<a href="<?=get_term_link($ciudad);?>" title="Ir a entradas de <?=$ciudad->name;?>">
						<?=$ciudad->name;?>
					</a>
				</h3>
			</div>
			<?php
		endif;
		?>
		<?php
		if($contain_image){
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
		<?php
		}
		?>
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
			<?php
			if($contain_excerpt) {
			?>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<?php
			}
			if($contain_author) {
			?>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
			<?php
			}
			?>
		</div>
	</article>
</div>