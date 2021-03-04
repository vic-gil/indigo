<?php
/**
 * Parte de la plantilla para mostrar un listado en el componente opinion
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$class = array_key_exists('class', $args) ? $args['class'] : '';
$excerpt = array_key_exists('excerpt', $args) ? $args['excerpt'] : TRUE;
?>
<div class="component-opinion-lista <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_title();?>
			</a>
		</h3>
		<?php
		if($excerpt):
		?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php
		endif;
		?>
	</article>
</div>