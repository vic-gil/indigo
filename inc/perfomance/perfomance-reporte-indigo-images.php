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
		if ( $attr['loading'] === 'lazy' ) :
			$attr['class'] = $attr['class'] . ' lazyload';

			if( ! empty( $attr['src'] ) ) :
				/**
				 * Pasamos los valores de src a data-src para el plugin
				 * Si tus imagenes se encuentran en un CDN (Amazon S3, Cludfront) aquí puedes cambiarlas
				 * mediante una exprresión regular
				 *
				 */
				$url = $attr['src'];

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

				$attr['data-srcset'] = $srcset;

				/**
				 * Limpiamos el campo srcset
				 *
				 */
			   	$attr['srcset'] = '';

			endif;
		endif;
		
	endif;

	return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'custom_media_responsive_size', 10 , 3);


/**
 * Añadir attributos a la imagen del author
 *
 * @uses object $avatar 		El componente de imagen
 * @param int|string $id_or_email	El id o email del autor
 * @param int|string $size 			Tamaño de la imagen
 * @param string $align				El alineado de la imagen
 * @param string $alt 				El texto alternativo
 *
 * @return object get_wp_user_avatar()
**/

function custom_user_avatar($avatar, $id_or_email = NULL, $size = NULL, $align = NULL, $alt = NULL) {
	$avatar = str_replace( 'photo"', 'photo lazyload" width="150" height="150" loading="lazy"', $avatar );

	if($size == 'thumbnail')
		$avatar = str_replace( 'photo"', 'photo lazyload" width="150" height="150" loading="lazy"', $avatar );
	else 
		$avatar = str_replace( 'photo"', 'photo lazyload" loading="lazy"', $avatar );

	return $avatar;
}

add_filter( 'get_wp_user_avatar', 'custom_user_avatar', 1, 5);

?>
