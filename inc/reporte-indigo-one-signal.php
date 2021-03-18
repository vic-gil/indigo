<?php
/**
 * Reporte_Indigo_Scripts Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee scripts por defecto
 * 
**/

class Reporte_Indigo_One_Signal {

	/**
	 * Obtiene un objeto/arreglo de los tipos de entrada seleccionados en la sección
	 * de el personalizador ubicada en la siguiente secuencia.
	 *
	 * Notificaciones push -> temas
	 *
	 * @param bool  $is_object Define el formato de salida del arreglo
	 *
	 * @return Object|array Devuelve un objeto/arreglo con un formato definido;
	**/
	static function get_push_post_types($is_object = FALSE) {
		$post_types = get_theme_mod('ri_temas_push', FALSE );
		$tags = [];

		if( ! empty($post_types) ): $post_types = explode(',', $post_types);

			foreach ($post_types as $post_type) {
				$tag = get_post_type_object( $post_type );
				$tags[] = [
					'tag' => $tag->name,
					'label' => $tag->label,
				];
			}

		endif;

		if($is_object) 
			return json_encode($tags);
		else
			return $tags;
	}

	/**
	 * Configuraciones para personalizar one signal
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function custom_script($echo = TRUE) {

		$script = '
			<script type="text/javascript">
		   		window.addEventListener(\'load\', function() {
				    window._oneSignalInitOptions.promptOptions = {
				        slidedown: {
				            autoPrompt: true,
				            enabled: true,
				            timeDelay: 1,
				            pageViews: 3,
				            actionMessage: "Suscríbete a nuestras notificaciones",
				            acceptButtonText: "Aceptar",
				            cancelButtonText: "Cancelar",
				            categories: {
				                updateMessage: "¿Desea cambiar sus preferencias?",
				                positiveUpdateButton: "Deseo hacerlo",
				                negativeUpdateButton: "Cancelar",
				                tags: ' . self::get_push_post_types(TRUE) . '
				            }
				        }
				    };
				    window.OneSignal = window.OneSignal || [];
				    window.OneSignal.push(function() {
				        window.OneSignal.init(window._oneSignalInitOptions);
				    });
				})
			</script>
		';

		if( $echo )
			echo $script;
		else
			return $script;

	}

	/**
	 * Estilo de los componentes
	 *
	 * @return void
	**/
	static function custom_style($echo = TRUE) {
		$style = '<style>#onesignal-slidedown-container{top:4rem!important;left:unset!important;right:1rem!important}#onesignal-slidedown-dialog{width:300px!important;border-radius:.3rem!important}#onesignal-slidedown-container .tagging-container-col{padding-left:0!important}#onesignal-slidedown-dialog .slidedown-body-icon,#onesignal-slidedown-dialog .slidedown-body-icon img{width:45px!important;height:45px!important}#onesignal-slidedown-dialog .slidedown-body-message{width:calc(100% - 45px)!important;font-family:Roboto!important;font-size:12pt!important;font-weight:700!important;font-style:normal!important}#onesignal-slidedown-dialog .tagging-container label{font-family:Roboto!important;font-size:10pt!important;font-weight:500!important;font-style:normal!important;margin-bottom:1rem}#onesignal-slidedown-container .onesignal-category-label{padding-left:1.75em!important;line-height:1.4em!important}#onesignal-slidedown-container #onesignal-slidedown-dialog .slidedown-button{display:inline-block;font-family:Roboto;font-size:10pt!important;font-weight:400!important;font-style:normal!important;text-transform:uppercase!important;border:none;border-radius:25rem;color:#fff!important;background-color:#007bff!important;padding:.375rem .75rem;text-align:center;vertical-align:middle;line-height:1.5;transition:opacity .25s linear}#onesignal-slidedown-container #onesignal-slidedown-dialog .slidedown-button.secondary{color:#c4302b!important}#onesignal-slidedown-container .onesignal-category-label .onesignal-checkmark{width:1rem!important;height:1rem!important}#onesignal-slidedown-container .onesignal-category-label .onesignal-checkmark:after{left:.45em;top:.2em;width:.35em!important}</style>';
		
		if( $echo )
			echo $style;
		else
			return $style;
	}

	function on_loaded_head() {
		if( ! empty( get_theme_mod('ri_temas_push', FALSE ) ) )
			self::custom_script();
	}

	function on_loaded_footer() {
		if( ! empty( get_theme_mod('ri_temas_push', FALSE ) ) )
			self::custom_style();
	}

	function onesignal_send_notification_filter($fields, $new_status, $old_status, $post) {
		$fields['filters'] = [
			[
				'field' 	=> 'tag',
				'key' 		=> get_post_type(),
				'relation' 	=> '=',
				'value' 	=> '1'
			]	
		];

		$fields['web_buttons'] = [
			[
				'id'	=> 'configuration-button',
				'text'	=> 'Configuración de preferencias',
				'icon'	=> 'https://www.reporteindigo.com/iconos/icon150x150.png',
				'url'	=> 'https://www.reporteindigo.com/preferencias/',
			]
		];

		return $fields;
	}

}

$ri_one_signal = new Reporte_Indigo_One_Signal();
add_action('wp_head', [$ri_one_signal, 'on_loaded_head'], 99);
add_action('wp_footer', [$ri_one_signal, 'on_loaded_footer'], 99);

add_filter('onesignal_send_notification', [$ri_one_signal, 'onesignal_send_notification_filter'], 10, 4);
