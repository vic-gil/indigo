<?php

function action_amp_post_template_head( $amp_template ) {
	?>
	<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
	<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
	<script async custom-element="amp-sticky-ad" src="https://cdn.ampproject.org/v0/amp-sticky-ad-1.0.js"></script>
	<?php
};
         
add_action( 'amp_post_template_head', 'action_amp_post_template_head', 10, 2 );

function amp_post_sponsors_tags( $content ) {
	if( amp_is_request() ) {
		$clickio = [
			'<amp-ad width="300" height="250" type="doubleclick" data-slot="/45470634/clickio_area_642195_300x250" data-multi-size-validation="false"></amp-ad>',
			'<amp-ad width="300" height="250" type="doubleclick" data-slot="/45470634/clickio_area_642194_300x250" data-multi-size-validation="false"></amp-ad>'
		];

		return $clickio[0] . $content . $clickio[1];
	}

	return $content;
}

add_filter( 'the_content', 'amp_post_sponsors_tags', 1 ); 

?>