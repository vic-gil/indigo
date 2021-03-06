<?php
/**
 * Agrega la clase lazyload a las imagenes adjuntas
 *
 * @param string  $class  El nombre de la clase o lista de clases separadas por espacios
 *
 * @return string El nombre de la clase o lista de clases separadas por espacios modificados
 *
**/

function reporte_indigo_add_image_class($class){
    $class .= ' lazyload';

    return $class;
}

add_filter('get_image_tag_class','reporte_indigo_add_image_class');

/**
 * Agrega la clase lazyload a las imagenes adjuntas en el contenido de la entrada
 *
 * @param string  $content  Contenido de la entrada actual
 *
 * @return string El contenido modificado
 *
**/

function reporte_indigo_add_lazy_image($content){
	$content = str_replace('<img loading="lazy" class="','<img loading="lazy" class="lazyload ', $content);

	return $content;
}

add_filter('the_content','reporte_indigo_add_lazy_image');
?>
