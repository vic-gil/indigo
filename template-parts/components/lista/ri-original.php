<?php
/**
 * Parte de la plantilla para mostrar una lista de entradas
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
?>

<div class="component-list vinh">
	<article itemtype="http://schema.org/Article">
		<header>
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
		</header>
	</article>
</div>