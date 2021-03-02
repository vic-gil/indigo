<?php

function amp_author_date() {
	$author = get_the_author_meta('ID');

	$image = '';

	if( FALSE !== ( $src = get_wp_user_avatar_src( $author, 'medium_large', '' ) ) ):
		$name = get_the_author_meta('display_name');
		$image = '<amp-img src="' . esc_url( $src ) . '" alt="' . esc_attr( $name ) . '" width="48" height="48" layout="fixed"></amp-img>';
	endif;

	$content = '<div class="amp-wp-meta amp-wp-byline">
		' . $image . '
		<div class="amp-wp-author author vcard">
			' . get_the_author_posts_link() . '
			<div>
			 	<span>' . get_the_time('d \d\e M, Y') . '</span>
			</div>
		</div>
	</div>';

	return $content;
}

function amp_add_share_control() {
	$networks = [
		'facebook' => [
			'aria-label' => 'Compartir en facebook'
		],
		'twitter' => [
			'aria-label' => 'Compartir en twitter'
		],
		'whatsapp' => [
			'aria-label' => 'Compartir en whatsapp'
		],
		'system' => [
			'aria-label' => 'Comparte está nota'
		]
	];

	$network = "";
	foreach ($networks as $type => $configs) {
		$args = "";
		foreach ($configs as $arg => $value) {
			$args .= $arg . '="' . $value . '" ';
		}
		$network .= '<amp-social-share type="' . $type . '" ' .$args .'></amp-social-share>';
	}

	$content = '<div class="ri-amp-share">' . $network . '</div>';

	return $content;
}

function amp_add_jwplayer($post_id) {
	$jwplayer = get_post_meta( $post_id, '_mediaid_jwp_meta', TRUE );
	$videos = explode(',', $jwplayer);

	$content = '';

	if( ! empty($videos) ) {
		if( count($videos) > 1 ){
			$content .= '<amp-carousel id="carousel-with-preview" width="450" height="300" layout="responsive" type="slides" role="region" aria-label="Carrúsel de videos">';
			foreach ($videos as $id) {
				$content .= '<amp-jwplayer data-player-id="ixhD10k3" data-media-id="' . $id . '" layout="responsive" width="16" height="10"></amp-jwplayer>';
			}
			$content .= '</amp-carousel>';
		} else {
			$content .= '<amp-jwplayer data-player-id="ixhD10k3" data-media-id="' . $videos[0] . '" layout="responsive" width="16" height="10"></amp-jwplayer>';
		}
	}

	return $content;
}


function ri_amp_add_clickio_banners( $embed_handler_classes, $post ) {
	require_once( get_template_directory() . '/classes/amp/amp-clickio-post-embed.php' );
	$embed_handler_classes[ 'RI_AMP_Clickio_Banner_Embed' ] = array();
	return $embed_handler_classes;
}

add_filter( 'amp_content_embed_handlers', 'ri_amp_add_clickio_banners', 10, 2 );

add_filter( 'amp_post_template_data', function ( $data ) {
	$data['post_amp_content'] = amp_add_jwplayer( get_the_ID() ) . $data['post_amp_content'];
	$data['post_amp_content'] = amp_add_share_control() . $data['post_amp_content'];
	$data['post_amp_content'] = amp_author_date() . $data['post_amp_content'];
	return $data;
} );

add_filter( 'amp_post_article_header_meta', function ( $data ) {
	return [];
});

add_action( 'amp_post_template_footer', function ( $amp_template ) {
	$post_id = $amp_template->get( 'post_id' );
	?>
	<amp-pixel src="https://example.com/hi.gif?x=RANDOM"></amp-pixel>
	<?php
} );

add_action( 'amp_post_template_css', function() {
?>
* {
	font-family: "Roboto", sans-serif !important;
}
amp-jwplayer {
	margin-bottom: 1rem;
}
.amp-wp-article-featured-image.wp-caption .wp-caption-text {
	margin: 0;
}
header.amp-wp-header {
	background: #3474be;
}
header.amp-wp-header a {
	background-image: url( '<?=get_template_directory_uri() . '/assets/images/generales/logo-light.png';?>' );
	background-repeat: no-repeat;
	background-size: contain;
	display: block;
	height: 32px;
	width: 135px;
	text-indent: -9999px;
}
.amp-wp-article-featured-image.wp-caption,
.ri-amp-sponsor {
	text-align:center;
}
.amp-wp-article-content h3 {
	font-size: 20pt;
	line-height: 22pt	
}
.amp-wp-article-content h4 {
	font-size: 18pt;
	line-height: 22pt	
}
.ri-amp-share {
	text-align: right;
}
.amp-wp-article-content p {
	font-size: 16pt;
	line-height: 22pt	
}
.amp-wp-byline amp-img {
	border: none;
}
.amp-wp-byline .amp-wp-author {
	margin-top: 4px;
	margin-left: 6px;
}
.amp-wp-byline a {
	text-decoration: none;
	color: inherit;
	font-size: 12pt;
	font-weight: 700;
}
<?php
});
?>