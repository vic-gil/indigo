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
            'amp-ad' 		=> 'https://cdn.ampproject.org/v0/amp-ad-0.1.js',
            'amp-iframe' 	=> 'https://cdn.ampproject.org/v0/amp-iframe-0.1.js',
            'amp-sticky-ad' 	=> 'https://cdn.ampproject.org/v0/amp-sticky-ad-1.0.js'
        ];
	}

	public function add_clickio_banners( $content ) {

        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        $dom->loadHTML('<?xml encoding="utf-8" ?><root>' . $content . '</root>');

        $xPath = new DOMXPath( $dom );
        $pTags = $xPath->query('//p');

        $count = 0;
        foreach ( $pTags as $pTag ) {
            $loop_every = ( $pTags->length > 25) ? 4 : 3;
            $count = ( $count == $loop_every ) ? 1 : $count + 1;

            if($count == $loop_every) {
                $ad = $dom->createElement('amp-ad');
                $ad->setAttribute('width', '336');
                $ad->setAttribute('height', '280');
                $ad->setAttribute('type', 'doubleclick');
                $ad->setAttribute('data-slot', '/45470634/clickio_area_652881_336x280');
                $ad->setAttribute('data-multi-size-validation', 'false');
                $pTag->appendChild($ad);
            }

        }

        $content = preg_replace('#.*?<root>\s*(.*)\s*</root>#s', '\1', $dom->saveHTML() );

		$banner = [
			'<amp-ad width="300" height="250" type="doubleclick" data-slot="/45470634/clickio_area_642195_300x250" data-multi-size-validation="false"></amp-ad>',
			'<amp-ad width="300" height="250" type="doubleclick" data-slot="/45470634/clickio_area_642194_300x250" data-multi-size-validation="false"></amp-ad>',
			'<amp-ad width="1" height="1" type="smartadserver" data-site="70494" data-page="535121" data-format="47944" data-target="" data-domain="https://www5.smartadserver.com/config.js?nwid=1056"></amp-ad>',
			'<amp-sticky-ad layout="nodisplay"><amp-ad width="320" height="100"	type="doubleclick" data-enable-refresh="30" json=\'{"targeting":{"autorefresh":"30_sec"}}\' data-slot="/45470634/clickio_area_652880_320x100" data-multi-size-validation="false"></amp-ad></amp-sticky-ad>'
		];

		$content = '<div class="amp-ad-container">' . $banner[0]. '</div>' . $content . '<div class="amp-ad-container">' . $banner[1]. '</div>' . $banner[2] . $banner[3];

		return $content;
	}
}
?>
