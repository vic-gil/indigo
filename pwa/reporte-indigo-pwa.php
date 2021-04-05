<?php

/**
 * Edita el manifest por defecto
 *
 * @param array $manifest El array con las configuraciones del manifest
 *
 * @return array Retorna el array editado
**/

function reporte_indigo_manifest( $manifest ) {
	
	$manifest['orientation'] = 'portrait';

   	$manifest['theme_color'] = '#3474be';

   	$manifest['background_color'] = '#ffffff';

	$manifest['icons'] = [
		[
			'src' 	  => get_template_directory_uri() . '/assets/images/iconos/icon192x192.png',
			'sizes'   => '192x192',
			'type' 	  => 'image/png',
			'purpose' => 'any'
		],
		[
			'src' 	  => get_template_directory_uri() . '/assets/images/iconos/icon.png',
			'sizes'   => '512x512',
			'type' 	  => 'image/png',
			'purpose' => 'any'
		],
	];

    return $manifest;

}

add_filter( 'web_app_manifest', 'reporte_indigo_manifest');

/**
 * Agrega el cache para las imagenes
 *
 * @param Object $scripts Un objecto para registrar cache
 *
 * @return void 
**/

function reporte_indigo_cache_images( \WP_Service_Worker_Scripts $scripts ) {
	$scripts->caching_routes()->register(
		'/wp-content/.*\.(?:png|gif|jpg|jpeg|svg|webp)(\?.*)?$',
		[
			'strategy'  => WP_Service_Worker_Caching_Routes::STRATEGY_CACHE_FIRST,
			'cacheName' => 'theme_image',
			'plugins' 	=> [
				'expiration' => [
					'maxEntries'    => 60,
					'maxAgeSeconds' => 60 * 60 * 24,
				]
			]
		]
	);

	$scripts->caching_routes()->register(
		'https://images.reporteindigo.com/wp-content/.*\.(?:png|gif|jpg|jpeg|svg|webp)(\?.*)?$',
		[
			'strategy'  => WP_Service_Worker_Caching_Routes::STRATEGY_CACHE_FIRST,
			'cacheName' => 'images',
			'plugins' 	=> [
				'expiration' => [
					'maxEntries'    => 60,
					'maxAgeSeconds' => 60 * 60 * 24 * 30,
				]
			]
		]
	);

	$scripts->caching_routes()->register(
		'https://cdn.jsdelivr.net/npm/.*\.(?:png|gif|jpg|jpeg|svg|webp|js|css)(\?.*)?$',
		[
			'strategy'  => WP_Service_Worker_Caching_Routes::STRATEGY_CACHE_FIRST,
			'cacheName' => 'images',
			'plugins' 	=> [
				'expiration' => [
					'maxEntries'    => 60,
					'maxAgeSeconds' => 60 * 60 * 24 * 30,
				]
			]
		]
	);

	$scripts->caching_routes()->register(
		'https://cdnjs.cloudflare.com/ajax/libs/.*\.(?:png|gif|jpg|jpeg|svg|webp|js|css)(\?.*)?$',
		[
			'strategy'  => WP_Service_Worker_Caching_Routes::STRATEGY_CACHE_FIRST,
			'cacheName' => 'images',
			'plugins' 	=> [
				'expiration' => [
					'maxEntries'    => 60,
					'maxAgeSeconds' => 60 * 60 * 24 * 30,
				]
			]
		]
	);
}

add_action( 'wp_front_service_worker', 'reporte_indigo_cache_images' );

?>








