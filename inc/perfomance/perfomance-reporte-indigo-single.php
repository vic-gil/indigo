<?php
function reporte_indigo_add_image_class($class){
    $class .= ' lazyload';

    return $class;
}

add_filter('get_image_tag_class','reporte_indigo_add_image_class');

function reporte_indigo_add_lazy_image($content){
	$content = str_replace('<img loading="lazy" class="','<img loading="lazy" class="lazyload ', $content);

	return $content;
}

add_filter('the_content','reporte_indigo_add_lazy_image');

function reporte_indigo_replace_url_image($content){
	$content = str_replace('src="http://staging.reporteindigo.com','src="https://images.reporteindigo.com', $content);

	return $content;
}

add_filter('the_content','reporte_indigo_replace_url_image');

?>