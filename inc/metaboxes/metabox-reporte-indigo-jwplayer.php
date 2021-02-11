<?php
/**
 * Reporte_Indigo_Jwplayer Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 1.0.0
 *
 */

/**
 * Una clase que proveé un ID de reproductor y un metabox
 * para embeber un video alojado en JSPlayer
 *
**/
class Reporte_Indigo_Jwplayer {
		
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
			'ri-jwplayer-id',
			'Videos JWPlayer',
			['Reporte_Indigo_Jwplayer', 'ri_html'],
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

	static function ri_html($post){
		wp_nonce_field( '_jwplayer_nonce', 'jwplayer_nonce' ); 

		$player_id = self::ri_get('value_playerid_video_jwp_meta');
		$media_id = self::ri_get('value_mediaid_jwp_meta');

		if(empty($player_id))
			$player_id = "ixhD10k3";

		<<<EOL
			<p>
				<label for="value_mediaid_jwp_meta">Media ID</label><br>
				<input 	type="text" 
						name="value_mediaid_jwp_meta" 
						id="value_mediaid_jwp_meta" 
						value="{$media_id}"
						placeholder="id,id,...">
			</p>	
			<p>
				<label for="value_playerid_video_jwp_meta">Player ID</label><br>
				<input type="text" name="value_playerid_video_jwp_meta" id="value_playerid_video_jwp_meta" value="{$player_id}" readonly>
			</p>
		EOL;	
	}

	/**
	 * Obtiene las opciones guardadas en base de datos
	 *
	 * @param string $value nombre del meta dato del post
	 *
	 * @return void
	**/

	static function ri_get($value){
		global $post;

		$field 	= get_post_meta($post->ID, $value, true);

		if( ! empty( $field ) ) {
			return is_array($field) ? stripslashes_deep($field) : stripslashes(wp_kses_decode_entities($field));
		} else {
			return false;
		}
	}

	/**
	 * Guarda el valor del reproductor y el video en 
	 * los metadatos de la misma.
	 *
	 * @param int  $post_id El identificador de la entrada
	 *
	 * @return void
	**/

	static function ri_save($post_id){
		if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) 
			return;

		if (!isset( $_POST['jwplayer_nonce'] ) || ! wp_verify_nonce( $_POST['jwplayer_nonce'], '_jwplayer_nonce' )) 
			return;

		if (!current_user_can( 'edit_post', $post_id )) 
			return;

		if (isset( $_POST['value_mediaid_jwp_meta'] ))
			update_post_meta($post_id, 'value_mediaid_jwp_meta', esc_attr( $_POST['value_mediaid_jwp_meta'] ) );
	}

}

add_action( 'add_meta_boxes', ['Reporte_Indigo_Jwplayer', 'ri_add'] );
add_action( 'save_post', ['Reporte_Indigo_Jwplayer', 'ri_save'] ); ?>