<?php

class RI_AMP_Clickio_Banner_Embed extends AMP_Base_Embed_Handler {
	
	public function register_embed() {
		remove_filter( 'the_content', 'xyz_add_clickio_banners' );
		add_filter( 'the_content', array( $this, 'add_clickio_banners' ) );
	}

	public function unregister_embed() {
		add_filter( 'the_content', 'xyz_add_clickio_banners' );
		remove_filter( 'the_content', array( $this, 'add_clickio_banners' ) );
	}

	public function get_scripts() {
        return [
            'amp-ad' 			=> 'https://cdn.ampproject.org/v0/amp-ad-0.1.js',
            'amp-iframe' 		=> 'https://cdn.ampproject.org/v0/amp-iframe-0.1.js',
            'amp-sticky-ad' 	=> 'https://cdn.ampproject.org/v0/amp-sticky-ad-1.0.js'
        ];
	}

	public function add_clickio_banners( $content ) {
		$banner = [
			'<amp-ad width="300" height="250" type="doubleclick" data-slot="/45470634/clickio_area_642195_300x250" data-multi-size-validation="false"></amp-ad>',
			'<amp-ad width="300" height="250" type="doubleclick" data-slot="/45470634/clickio_area_642194_300x250" data-multi-size-validation="false"></amp-ad>'
		];

		$content = '<div class="ri-amp-sponsor">' . $banner[0]. '</div>' . $content . '<div class="ri-amp-sponsor">' . $banner[1]. '</div>';

		return $content;
	}
}
?>