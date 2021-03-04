<?php

/**
 * Cambia el dominio de la dirección canonica de la nota
 * esto es temporal hasta reindexar las tablas de Yoast
 *
 * @param string  $canonical  La URL a modificar.
 *
 * @return string La URL a modificada.
 *
**/

function filter_canonical( $canonical ) {
	return str_replace('pre.reporteindigo.com', 'www.reporteindigo.com', $canonical);
}

add_filter( 'wpseo_canonical', 'filter_canonical' );

/**
 * Cambia el dominio de la dirección de la nota en opengraph
 *
 * @param string  $canonical  La URL a modificar.
 *
 * @return string La URL a modificada.
 *
**/

function opengraph_url( $url ) {
	return str_replace('pre.reporteindigo.com', 'www.reporteindigo.com', $url);
}

add_filter( 'wpseo_opengraph_url', 'opengraph_url' );

/**
 * Cambia el dominio de la imagen de open graph yoast
 *
 * @param string  $url  La URL a modificar.
 *
 * @return string La URL a modificada.
 *
**/

function change_opengraph_image_url( $url ) {
	$replace = get_theme_mod( 'ri_images_replace', FALSE );
	$optional = get_theme_mod( 'ri_images_bucket', FALSE );

	if ( ! empty($replace) && ! empty($optional) ) {
		return str_replace( $replace, $optional, $url );
	}

    return $url;
}

add_filter( 'wpseo_opengraph_image', 'change_opengraph_image_url' );

/**
 * Cambia el dominio de la imagen del sitemap de yoast
 *
 * @param string  $url  La URL a modificar.
 * @param WP_Post $post El objeto tipo Post.
 *
 * @return string La URL a modificada.
 *
**/

function wpseo_cdn_filter( $url, $post ) {
  	$origin = get_theme_mod( 'ri_images_original', FALSE );
	$replace = get_theme_mod( 'ri_images_replace', FALSE );
	
	if ( FALSE !== $origin && FALSE !== $replace ) {
		return str_replace( $origin, $replace, $url );
	}

	return $url;
}

add_filter( 'wpseo_xml_sitemap_img_src', 'wpseo_cdn_filter' );

/**
 * Cambia el dominio de la imagen del schema en yoast
 *
 * @param array $data Schema.org Arreglo con los datos del articulo
 *
 * @return array Schema.org Arreglo con los datos del articulo.
 *
**/

function wpseo_schema_image_object( $data ) {
	$replace = get_theme_mod( 'ri_images_replace', FALSE );
	$optional = get_theme_mod( 'ri_images_bucket', FALSE );

	if ( ! empty($replace) && ! empty($optional) ) {
		$data['url'] = str_replace( $replace, $optional, $data['url'] );
	}

	return $data;
}

add_filter( 'wpseo_schema_imageobject', 'wpseo_schema_image_object' );