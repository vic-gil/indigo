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
	$origin = get_theme_mod( 'ri_images_original', FALSE );
	$replace = get_theme_mod( 'ri_images_replace', FALSE );

	if ( FALSE !== $origin && FALSE !== $replace ) {
		$content = preg_replace("/(http|https):\/\/(?:.*?)\/wp-content\//i", "https://{$replace}/wp-content/", $content);
	}

	return $content;
}

add_filter('the_content','reporte_indigo_replace_url_image');

?>