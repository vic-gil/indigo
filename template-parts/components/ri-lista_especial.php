<?php
/**
 * Parte de la plantilla para mostrar el componente especial
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-lista-especial <?=$class;?>" data-link="<?php the_post_thumbnail_url('medium_large');?>" onmouseover="hoverSpecial(this);" onmouseout="originalSpecial(this);">
	<article itemtype="http://schema.org/Article">
		<div class="entry-content">
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
	</article>
</div>