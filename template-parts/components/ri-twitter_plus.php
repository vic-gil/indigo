<?php
/**
 * Parte de la plantilla para mostrar el componente general mini
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-twitt-plus <?=$class;?>">
	<article itemtype="http://schema.org/Article">
		<header>
			<a href="">
				<img src="<?=IMAGESPATH;?>/svgs/filosofia-financiera.svg" alt="Filosofía financiera" width="35">
				Filosofía financiera
			</a>
		</header>
		<div class="entry-content">
			<h3>
				<a href="" title=""><?php the_content();?></a>
			</h3>
		</div>
		<footer>
			<button 
				type="button" 
				data-title="<?the_content();?>" 
				onclick="utilerias.tweet(this);">TWEET</button>
		</footer>
	</article>
</div>