<?php

/**
 * Añade indices de JWPlayer
 *
 * @param array  $data Datos de la plantilla
 *
 * @return array Datos de la plantilla modificados
 *
**/

function ri_amp_set_jwplayer( $data ) {
	$jwplayer = get_post_meta( get_the_id(), '_mediaid_jwp_meta', TRUE );

	if( ! empty($jwplayer) ){
		$jwplayer = explode(',', $jwplayer);
		
		if( count($jwplayer) > 0 ) {
			$data[ 'jwplayer' ] = $jwplayer;
		}

	} else {
		$data[ 'jwplayer' ] = false;
	}
	
	return $data;
}

add_filter( 'amp_post_template_data', 'ri_amp_set_jwplayer' );

/**
 * Añade un enlace HTML a la taxonomía de tema si existe
 *
 * @param array  $data Datos de la plantilla
 *
 * @return array Datos de la plantilla modificados
 *
**/

function ri_amp_set_taxonomy_tema( $data ) {
	$tema = get_the_terms( get_the_ID(), 'ri-tema');

	if( ! empty($tema) ) : $tema = $tema[0];
		$data[ 'tema' ]['amp_html'] = '<a href="' . get_term_link($tema) . '" title="' . $tema->name . '">' . $tema->name . '</a>';
	endif;
	
	return $data;
}

add_filter( 'amp_post_template_data', 'ri_amp_set_taxonomy_tema' );

/**
 * Añade un arrreglo con las entradas relacionadas por tema
 *
 * @param array  $data Datos de la plantilla
 *
 * @return array Datos de la plantilla modificados
 *
**/

function ri_amp_related_posts( $data ) {
	$tema = get_the_terms( get_the_ID(), 'ri-tema');

	$data[ 'recomendados' ] = false;

	if( false !== $tema && ! is_wp_error( $tema ) ) : $tema = $tema[0];

		$related = new WP_Query([
			'post_type' 		=> get_post_type(),
			'posts_per_page' 	=> 6,
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> false,
			'post__not_in'		=> [ get_the_ID() ],
			'no_found_rows' 	=> true,
			'tax_query' 		=> [
				[
					'taxonomy' 	=> $tema->taxonomy,
					'field'	   	=> 'slug',
					'terms'	 	=> $tema->slug
				]
			]
		]);

	endif;

	$data[ 'recomendados' ] = $related;
	
	return $data;
}

add_filter( 'amp_post_template_data', 'ri_amp_related_posts' );

/**
 * Añade un arrreglo con las entradas relacionadas por tema
 *
 * @param array  $embed_handler_classes Manejadores
 *
 * @return array Manejadores modificados
 *
**/

function ri_amp_add_clickio_banners( $embed_handler_classes ) {
	require_once( get_template_directory() . '/classes/amp/amp-clickio-post-embed.php' );
	$embed_handler_classes[ 'RI_AMP_Clickio_Banner_Embed' ] = [];
	return $embed_handler_classes;
}

add_filter( 'amp_content_embed_handlers', 'ri_amp_add_clickio_banners', 10, 2 );


/**
 * Añade estilos a la entrada
 *
 * @return void
 *
**/

function ri_amp_custom_css() {
?>
* {
	font-family: "Roboto", sans-serif !important;
}
.amp-wp-header {
	position: sticky;
	top: 0;
	background: #3474be;
	z-index: 10;
}
.amp-wp-header > div {
	display: flex;
    justify-content: space-between;
    padding: 0rem;
}
.amp-wp-header a {
	margin: .875em;
}
.amp-wp-header .btn-container{
	display: inline-flex;
	padding: .875em;
	background: #3e4c59;
}
button.hamburger {
	width: 32px;
	height: 32px;
	border: none;
	background-color: transparent;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Menu' fill='%23FFF' x='0px' y='0px' viewBox='0 0 384 384' style='enable-background:new 0 0 384 384;' xml:space='preserve'%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Crect x='0' y='277.333' width='384' height='42.667'/%3E%3Crect x='0' y='170.667' width='384' height='42.667'/%3E%3Crect x='0' y='64' width='384' height='42.667'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3C/svg%3E");
}
amp-jwplayer {
	margin-bottom: 1rem;
}
.amp-wp-article-featured-image.wp-caption .wp-caption-text {
	margin: 0;
}
header.amp-wp-header a,
footer .amp-ri-logo a,
amp-sidebar .amp-ri-logo a {
	background-image: url( '<?=get_template_directory_uri() . '/assets/images/generales/logo-light.png';?>' );
	background-repeat: no-repeat;
	background-size: contain;
	display: block;
	height: 32px;
	width: 135px;
	text-indent: -9999px;
}
.amp-wp-extra {
	margin: 0 16px;
	margin-bottom: 1rem;
}
.amp-wp-article-featured-image.wp-caption,
.amp-ad-container {
	text-align:center;
}
.amp-wp-article-content h3 {
	font-size: 20pt;
	line-height: 22pt	
}
.amp-wp-article-content h4 {
	font-size: 18pt;
	line-height: 22pt	
}
.amp-ri-share {
	text-align: right;
}
.amp-wp-article-content p {
	font-size: 16pt;
	line-height: 22pt	
}
.amp-wp-byline amp-img {
	border: none;
}
.amp-wp-byline .amp-wp-author {
	margin-top: 4px;
	margin-left: 6px;
}
.amp-wp-byline a {
	text-decoration: none;
	color: inherit;
	font-size: 12pt;
	font-weight: 700;
}
.amp-wp-title {
	font-size: 24pt;
	line-height: 27pt;
}
.amp-wp-tema {
	margin: 0;
	margin-bottom: 1rem;
}
.amp-wp-tema a{
	font-size: 18pt;
	line-height: 22pt;
	text-decoration: none;
}
amp-social-share {
	border-radius: 3px;
}
amp-sidebar {
	background: #3e4c59;
	padding: 1rem 2rem;
}
amp-sidebar ul {
	padding: 0;
	margin-bottom: 0;
    list-style: none;
}
amp-sidebar ul li a {
	display: inline-block;
	font-size: 14pt;
	font-weight: 500;
	line-height: 14pt;
	padding: .75rem 0rem;
	color: #fff !important;
	text-decoration: none;
}
.amp-carousel-button {
	border-radius: 50%;
}
.amp-wp-footer {
	background: #000;
}
.amp-wp-footer p {
	font-size: 10pt;
	color: #FFF;
}
.amp-wp-footer .addr {
	margin-bottom: 1rem;
}
.amp-ri-featured {
	padding: 16px;
}
.amp-ri-featured ul {
	display: grid;
    grid-template-columns: auto;
    grid-gap: 15px 0;
    justify-content: center;
    padding: 0;
	margin-bottom: 0;
    list-style: none;
}
.amp-ri-featured ul li img{
	border-radius: .3rem;
	overflow: hidden;
}
.amp-ri-featured .amp-ri-tema{
	font-weight: 500 !important;
    font-style: normal !important;
    font-size: 12pt !important;
    color: #3474be;
}
.amp-ri-featured h3 {
	margin: 0;
	color: #000;
}
.amp-ri-featured a {
	text-decoration: none;
}
.amp-ri-featured address {
    margin: 0;
}
.amp-ri-featured address a {
    font-weight: 500;
	font-style: normal;
    font-size: 10pt;
    color: #67737d;
}
@media screen and (min-width: 576px) {
	.amp-ri-featured ul {
		grid-template-columns: auto auto;
	    grid-gap: 30px 20px !important;
	    padding: 0;
		margin-bottom: 0;
	    list-style: none;
	}
}
<?php
}

add_action( 'amp_post_template_css', 'ri_amp_custom_css');
?>