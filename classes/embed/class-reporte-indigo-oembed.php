<?php
/**
 *
 * Agrega soporte para incrustar publicaciones de Facebook e Instagram en el editor de bloques y editor clásico
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 * 
 */

use Indigo\Oembed\Embed;
use Indigo\Oembed\Settings;

add_filter('oembed_providers', static function (array $providers): array {
	require_once __DIR__ . '/src/Embed.php';
	return Embed::registerProviders($providers);
});

add_filter('oembed_fetch_url', static function ($provider_url): string {
	if (strpos($provider_url, 'https://graph.facebook.com/v9.0/') !== 0) {
		return $provider_url;
	}

	require_once __DIR__ . '/src/Embed.php';

	if (defined('OEMBED_FACEBOOK_APP_ID') && defined('OEMBED_FACEBOOK_SECRET')) {
		$embed = new Embed(OEMBED_FACEBOOK_APP_ID, OEMBED_FACEBOOK_SECRET);
	} elseif ( ($app_id = get_option('oembed_facebook_app_id', null)) && ($app_secret = get_option('oembed_facebook_app_secret', null))) {
		$embed = new Embed($app_id, $app_secret);
	} else {
		return $provider_url;
	}

	return $embed->processProviderUrls($provider_url);
}, 9999);

add_filter('oembed_fetch_url', static function ($provider_url): string {
	if (strpos($provider_url, 'https://publish.twitter.com/') !== 0) {
		return $provider_url;
	}

	return $provider_url . '&hide_media=true&omit_script=true&dnt=true';
}, 9999);

add_action('admin_init', static function (): void {
	if (defined('OEMBED_HIDE_ADMIN_UI') && !empty(OEMBED_HIDE_ADMIN_UI)) {
		return;
	}
	require_once __DIR__ . '/src/Settings.php';
	Settings::runHook();
});
