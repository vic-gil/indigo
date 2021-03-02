<?php
/**
 * HTML jwplayer template
 *
  * @package AMP
**/

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$jwplayer = $this->get( 'jwplayer' );

if ( empty( $jwplayer ) ) {
	return;
}

if( count($jwplayer) > 1 ){
?>
<amp-carousel id="carousel-with-preview" width="16" height="10" layout="responsive" type="slides" role="region" aria-label="Carrúsel de videos">
	<?php
	foreach ($jwplayer as $id) {
	?>
	<amp-jwplayer data-player-id="ixhD10k3" data-media-id="<?=$id;?>" layout="responsive" width="16" height="10"></amp-jwplayer>
	<?php
	}
	?>
</amp-carousel>
<?php
} else {
?>
<amp-jwplayer data-player-id="ixhD10k3" data-media-id="<?=$jwplayer[0];?>" layout="responsive" width="16" height="10"></amp-jwplayer>
<?php
}
?>