<?php
/**
 * Post author date template part.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */
$post_author = $this->get( 'post_author' );
$image = '';
if( FALSE !== ( $src = get_wp_user_avatar_src( $post_author, 'thumbnail', '' ) ) ):
	$name = get_the_author_meta('display_name', $post_author);
	$image = '<amp-img src="' . esc_url( $src ) . '" alt="' . esc_attr( $name ) . '" width="48" height="48" layout="fixed"></amp-img>';
endif;
?>
<div class="amp-wp-meta amp-wp-byline">
	<?=$image;?>
	<div class="amp-wp-author author vcard">
		<?=get_the_author_posts_link();?>
		<div>
			<span><?=get_the_time('d \d\e M, Y');?></span>
		</div>
	</div>
</div>