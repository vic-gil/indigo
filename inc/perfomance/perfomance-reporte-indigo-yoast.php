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
?>
