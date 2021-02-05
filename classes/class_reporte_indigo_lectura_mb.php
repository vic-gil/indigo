<?php
/**
 * Reporte_Indigo_Lectura_Mb Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 1.0.0
 *
 */

/**
 * Una clase que proveé el tiempo de lectura 
 * de las entradas del tema
 *
**/

class Reporte_Indigo_Lectura_Mb {

	/**
	 * Agrega un metabox a los post types seleccionados
	 *
	**/

	static function ri_add() {
		$post_types = [
			'post',
			'ri-reporte',
			'ri-opinion',
			'ri-latitud',
			'ri-indigonomics',
			'ri-piensa',
			'ri-fan',
			'ri-desglose',
			'ri-documento-indigo',
			'ri-salida-emergencia'
		];

		add_meta_box(
			'ri-tiempo-lectura-id',
			'Tiempo de lectura',
			['Reporte_Indigo_Lectura_Mb', 'ri_html'],
			$post_types,
			'side',
			'default'
		);
	}

	/**
	 * Crea la entrada que se usará para el metabox
	 *
	 * @param WP_Post 	$post objeto WP_Post
	 *
	 * @return void
	**/

	static function ri_html($post) {
		wp_nonce_field( '_tiempo_lectura_nonce', 'tiempo_lectura_nonce' );
		$tiempo = self::ri_get('_tiempo_estimado_meta');
		$tiempo = empty($tiempo) ? '0 min' : $tiempo;
		echo <<<EOL
			<p>
				<label for="_tiempo_estimado_meta">Tiempo áprox. min.</label><br>
				<input type="text" name="_tiempo_estimado_meta" id="_tiempo_estimado_meta" value="<?=$tiempo;?>" readonly>
			</p>
		EOL;
	}

	/**
	 * Obtiene el tiempo guardado en base de datos
	 *
	 * @param int 	 $value Tiempo aproximado de lectura
	 *
	 * @return void
	**/

	static function ri_get($value) {
		global $post;

		$field = get_post_meta($post->ID, $value, true);

		if( ! empty( $field ) ):
			return is_array($field) ? stripslashes_deep($field) : stripslashes(wp_kses_decode_entities($field));
		else:
			return false;
		endif;
	}

	/**
	 * Calcula el tiempo de lectura 
	 *
	 * @param String  $content El contenido del post
	 *
	 * @return int Tiempo aproximado de lectura
	**/

	static function ri_calculate($content) {
		$palabras = str_word_count( strip_tags( $content ) );
		
		return ceil( $palabras / 200 );
	}

	/**
	 * Guarda el valor del tiempo de lectura en 
	 * los metadatos de la misma.
	 *
	 * @param int  $post_id El identificador de la entrada
	 *
	 * @return void
	**/

	static function ri_save($post_id) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return;
	
		if (!isset( $_POST['tiempo_lectura_nonce'] ) || ! wp_verify_nonce( $_POST['tiempo_lectura_nonce'], '_tiempo_lectura_nonce')) 
			return;

		if (!current_user_can( 'edit_post', $post_id)) 
			return;

		$content = get_post($post_id);
		$minutos = self::ri_calculate($content->post_content);
		$minutos = $minutos . ' min';

    	update_post_meta( $post_id, '_tiempo_estimado_meta', $minutos);
	}

}

add_action('add_meta_boxes', ['Reporte_Indigo_Lectura_Mb', 'ri_add']);
add_action('save_post', ['Reporte_Indigo_Lectura_Mb', 'ri_save']);
?>
