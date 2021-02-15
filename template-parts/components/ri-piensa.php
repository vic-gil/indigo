<?php
/**
 * Parte de la plantilla para mostrar una tarjeta de la sección piensa
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$categoria = get_the_terms( get_the_ID(), 'ri-categoria' );
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$share = array_key_exists('share', $args) ? $args['share'] : TRUE;
$jwplayer = get_post_meta( get_the_ID(), 'value_mediaid_jwp_meta', TRUE );
$class = array_key_exists('class', $args) ? $args['class'] : '';
$type = array_key_exists('type', $args) ? $args['type'] : '';
?>
<div class="<?=$class;?> component-piensa <?=$type;?>">
	<article itemtype="http://schema.org/Article">
		<?php
		if( ! empty($categoria) ) : $categoria = $categoria[0]
		?>
		<header>
			<h2>
				<a href="<?=get_term_link($categoria);?>" title="<?=$categoria->name;?>">
					<?=$categoria->name;?>
				</a>
			</h2>
			<?php
			if($type == "__b")
				Reporte_indigo_templates::componente_icon($categoria->slug);
			?>
		</header>
		<?php
		endif;
		?>
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
		<?php
		if($share):
		?>
		<footer>
			<button type="button" onclick="shareDialog(this);" data-link="<?php the_permalink(); ?>" data-title="<?=get_the_title();?>" class="fas fa-share-alt" aria-label="comparte">
			</button>
		</footer>
		<?php
		endif;
		?>
	</article>
</div>