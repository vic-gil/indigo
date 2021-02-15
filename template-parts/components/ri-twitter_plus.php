<?php
/**
 * Parte de la plantilla para mostrar el componente twitter plus
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$class = array_key_exists('class', $args) ? $args['class'] : '';
?>
<div class="component-twitt-plus <?=$class;?>">
	<div class="entries">
		<div class="header">
			<img src="<?=IMAGESPATH;?>/svgs/filosofia-financiera.svg" alt="Filosofía financiera" width="35">
			<h2>Filosofía financiera</h2>	
		</div>
		<div class="body">
			<h3><?php the_content();?></h3>
		</div>
		<div class="footer">
			<button 
				class="btn-general"
				type="button" 
				data-title="<?=get_the_content();?>" 
				onclick="copyTwitt(this);">TWEET</button>
		</div>
	</div>
	<div class="ticket-cut"></div>
</div>