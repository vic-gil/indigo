<?php

namespace Indigo\Oembed;

class Settings {
    private $wpConfigSettings;

    public function __construct() {
        $this->wpConfigSettings = defined('OEMBED_FACEBOOK_APP_ID') && defined('OEMBED_FACEBOOK_SECRET');
    }

	public static function runHook(): void {
		$instance = new static();
		$instance->addSection();
		$instance->registerSettings();
		$instance->addSettingsFields();
	}

	public function addSection(): void {
		add_settings_section(
			'oembed_facebook_api_keys',
			'Opciones de incrustación de Facebook e Instagram',
			[$this, 'sectionCallback'],
			'writing'
		);
	}

	public function addSettingsFields(): void {
		add_settings_field(
			'oembed_facebook_app_id',
			'App ID',
			[$this, 'fieldAppIdCallback'],
			'writing',
			'oembed_facebook_api_keys'
		);
		add_settings_field(
			'oembed_facebook_app_secret',
			'App Secret',
			[$this, 'fieldAppSecretCallback'],
			'writing',
			'oembed_facebook_api_keys'
		);
	}

	public function registerSettings(): void {
		register_setting( 'writing', 'oembed_facebook_app_id', [
			'type' => 'integer',
			'description' => 'El App ID de la aplicación de Facebook',
			'sanitize_callback' => static function(?string $string): ?string {
				return (int) $string;
			}
		]);

		register_setting( 'writing', 'oembed_facebook_app_secret', [
			'type' => 'string',
			'description' => 'El App secret de la aplicación de Facebook',
			'sanitize_callback' => static function(?string $string): ?string {
				return strtolower(preg_replace("/[^A-z0-9]+/", '', $string));
			}
		]);
	}

	public function sectionCallback(): void {
		echo '<p> Las credenciales de desarrollador de aplicaciones de Facebook e Instagram son requeridas para el contenido en el editor de bloques. ';
		echo 'Necesitas ir al <a href="https://developers.facebook.com/apps/" target="_blank" rel="noopener noreferrer">registro de aplicaciones de Facebook</a>, activar <a href="https://developers.facebook.com/docs/plugins/oembed#oembed-product">incrustados</a> y agregar las App ID y secreto en los campos inferiores.</p>';
		echo '<p>Encontrarás una guía detallada disponible en <a target="_blank" rel="noopener noreferrer" href="https://php.watch/articles/wordpress-facebook-instagram-oembed">está liga</a>.</p>';

        if ($this->wpConfigSettings) {
            echo '<p><strong>Configuration options are currently <a target="_blank" rel="noopener noreferrer" href="https://php.watch/articles/wordpress-facebook-instagram-oembed#wp-config">set with PHP constants</a>. This settings form is disabled.</strong>';
        }
	}

	public function fieldAppIdCallback(): void {
        if ($this->wpConfigSettings) {
            echo '<em> - Set in configuration file - </em>';
            return;
        }
		echo '<input name="oembed_facebook_app_id" title="Facebook App ID" class="regular-text" min="10000000000" max="9999999999999999" title="Numeric App ID" inputmode="numeric" id="oembed_facebook_app_id" type="number" value="'.esc_attr(get_option('oembed_facebook_app_id')).'" />';
	}

	public function fieldAppSecretCallback(): void {
        if ($this->wpConfigSettings) {
            echo '<em> - Set in configuration file - </em>';
            return;
        }
		echo '<input name="oembed_facebook_app_secret" pattern="[A-z0-9]{32}" class="regular-text" title="32 characters of a-z and 0-9 app secret" autocomplete="off" id="oembed_facebook_app_secret" type="text" value="'.esc_attr(get_option('oembed_facebook_app_secret')).'" />';
	}

	public static function deleteSettings(): void {
		$options = [
			'oembed_facebook_app_id',
			'oembed_facebook_app_secret',
		];

		foreach ($options as $option) {
			delete_option($option);
			delete_site_option($option);
		}
	}
}
