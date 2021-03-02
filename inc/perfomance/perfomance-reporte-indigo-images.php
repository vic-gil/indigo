<?php
/**
 * Filtra los atributos de una imagen adjunta
 *
 * @param  string[] $attr 	   Matriz de valores de atributo para el marcado de la imagen.
 * @param  WP_Post $attachment Imagen adjunta a publicación.
 * @param  string|int[] $size  Tamaño de imagen solicitado
 */

function custom_media_responsive_size($attr, $attachment, $size) {
	if( ! is_admin() && ! amp_is_request() ) :

		/**
		 * Agregamos la clase lazyload a todas las imágenes
		 *
		 */
		$attr['class'] = $attr['class'] . ' lazyload';

		if( ! empty( $attr['src'] ) ) :
			$origin = get_theme_mod( 'ri_images_original', FALSE );
			$replace = get_theme_mod( 'ri_images_replace', FALSE );

			/**
			 * Pasamos los valores de src a data-src para el plugin
			 * Si tus imagenes se encuentran en un CDN (Amazon S3, Cludfront) aquí puedes cambiarlas
			 * mediante una exprresión regular
			 *
			 */
			$url = $attr['src'];
			
			if ( FALSE !== $origin && FALSE !== $replace ) {
				$url = str_replace(get_site_url(), 'https://' . $replace, $url);
				$url = str_replace($origin, $replace, $url);
			}

			$attr['data-src'] = $url;

			/**
			 * Pixel 1x1 transparente
			 *
			 */
			if( ! amp_is_request() ) :
				$attr['src'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';
			endif;

		endif;

		if( ! empty( $attr['srcset'] ) ) :

			/**
			 * Pasamos los valores de srcset a data-srcset para el plugin
			 * Si tus imagenes se encuentran en un CDN (Amazon S3, Cludfront) aquí puedes cambiarlas
			 * mediante una exprresión regular
			 *
			 */
			$srcset = $attr['srcset'];

			if ( FALSE !== $origin && FALSE !== $replace ) {
				$srcset = str_replace(get_site_url(), 'https://' . $replace, $url);
				$srcset = str_replace($origin, $replace, $url);
			}

			$attr['data-srcset'] = $srcset;

			/**
			 * Limpiamos el campo srcset
			 *
			 */
		   	$attr['srcset'] = '';

		endif;
		
		/**
		 * ¡LA MAGIA OCURRE AQUÍ!
		 * Esto requiere de mucho análisis y de requisitos de tu tema
		 * usa la configuracion que necesites mediante una medida
		 * ejemplo `medium_large`, `large` y la sección ejemplo
		 * is_home(), is_category() para mostrar las imagenes en su tamaño 
		 * ideal mediante diseño responsivo.
		 *
		 * Si no estás familiarizado con esto consulta. HTML y AMP
		 * @link https://developer.mozilla.org/es/docs/Learn/HTML/Multimedia_and_embedding/Responsive_images
		 * @link https://amp.dev/es/documentation/guides-and-tutorials/develop/style_and_layout/art_direction/
		 *
		 */
		$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";

		if( is_home() ) :
			
			if( $size === "medium_large" ) :
				$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";
			endif;

			if( $size === "large" ) :
				$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";
			endif;

		endif;

		if ( is_post_type_archive('ri-latitud') ) : 

			if( $size === "medium_large" ) :
				$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";
			endif;

			if( $size === "large" ) :
				$attr['sizes'] = "(min-width: 1024px) 500px, (min-width: 768px) 300px, (min-width: 414px) 200px, 300px";
			endif;

		endif;

		if ( is_category() ) :

		endif;

		if ( is_tax() ) :

		endif;

		if ( is_search() ) :

		endif;

		if ( is_author() ) :

		endif;

	endif;

	return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'custom_media_responsive_size', 10 , 3);


/**
 * Añadir attributos a la imagen del author
 *
**/

function custom_user_avatar($avatar, $id_or_email = NULL, $size = NULL, $align = NULL, $alt = NULL) {
	$origin = get_theme_mod( 'ri_images_original', FALSE );
	$replace = get_theme_mod( 'ri_images_replace', FALSE );

	if ( FALSE !== $origin && FALSE !== $replace ) {
		$avatar = str_replace( $origin, $replace, $avatar );
	}

	$avatar = str_replace( 'photo"', 'photo lazyload" width="150" height="150" loading="lazy"', $avatar );

	if($size == 'thumbnail')
		$avatar = str_replace( 'photo"', 'photo lazyload" width="150" height="150" loading="lazy"', $avatar );
	else 
		$avatar = str_replace( 'photo"', 'photo lazyload" loading="lazy"', $avatar );

	return $avatar;
}

add_filter( 'get_wp_user_avatar', 'custom_user_avatar', 1, 5);

/**
 * Añadir attributos a la url imagen
 *
**/

function images_cdn_filter( $image, $attachment_id, $size, $icon ) {
	$origin = get_theme_mod( 'ri_images_original', FALSE );
	$replace = get_theme_mod( 'ri_images_replace', FALSE );

	if ( FALSE !== $origin && FALSE !== $replace ) {
		$image[0] = str_replace( $origin, $replace, $image[0] );
	}

    return $image;
}
add_filter('wp_get_attachment_image_src', 'images_cdn_filter', 10, 4);


/**
 * Cambia el dominio de la imagen de yoast
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

function wpseo_cdn_filter( $uri ) {
  	$origin = get_theme_mod( 'ri_images_original', FALSE );
	$replace = get_theme_mod( 'ri_images_replace', FALSE );
	
	if ( FALSE !== $origin && FALSE !== $replace ) {
		return str_replace( $origin, $replace, $uri );
	}

	return $uri;
}

add_filter( 'wpseo_xml_sitemap_img_src', 'wpseo_cdn_filter' );

function wpseo_schema_image_object( $data ) {
	$replace = get_theme_mod( 'ri_images_replace', FALSE );
	$optional = get_theme_mod( 'ri_images_bucket', FALSE );

	if ( ! empty($replace) && ! empty($optional) ) {
		$data['url'] = str_replace( $replace, $optional, $data['url'] );
	}

	return $data;
}

add_filter( 'wpseo_schema_imageobject', 'wpseo_schema_image_object' );

function filter_canonical( $canonical ) {
	return str_replace('pre.reporteindigo.com', 'www.reporteindigo.com', $canonical);
}

add_filter( 'wpseo_canonical', 'filter_canonical' );

function opengraph_url( $url ) {
	return str_replace('pre.reporteindigo.com', 'www.reporteindigo.com', $url);
}

add_filter( 'wpseo_opengraph_url', 'opengraph_url' );

?>