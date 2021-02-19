<?php
/**
 * Parte de la plantilla para mostrar el componente dato del día
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-dato-dia <?=$class;?>">
	<div class="entries">
		<div class="header">
			<h2>Dato del día</h2>
			<figure>
				<picture>
					<?php the_post_thumbnail("large"); ?>
				</picture>
			</figure>	
		</div>
		<span class="triangle"></span>
		<div class="body">
			<div>
				<h3><?php the_content();?></h3>
			</div>
		</div>
		<div class="footer">
			<button 
				class="btn-general"
				type="button" 
				data-title="<?=strip_tags( get_the_content() );?>" 
				onclick="copyTwitt(this);">TWEET</button>
		</div>
	</div>
</div>