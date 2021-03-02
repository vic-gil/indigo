<?php
add_action('rest_api_init', function() {
	register_rest_field(
		'post',
	    'image_media',
	    [
	        'get_callback'    => function($object){
	        	$new_image = null;

	        	error_log($object);

	        	if( $object['featured_media'] ){
	        		$image = wp_get_attachment_image_src($object['featured_media'], 'medium_large');
	        	}

	        	return $new_image;

	        },
	        'update_callback' => null,
	        'schema'          => null
	    ]
	);
});
?>