<?php
/**
 * Parte de la plantilla para mostrar ta tarjeta del autor
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$author = array_key_exists('author', $args) ? $args['author'] : FALSE;
?>
<div class="component-author">
	<div class="entries">
		<figure>
			<picture>
				<?= get_wp_user_avatar( $author->ID, "thumbnail" ) ?>
			</picture>
		</figure>
		<div class="name">
			<h1><?=$author->display_name;?></h1>
		</div>
		<div class="role">
			<span>Editor</span>
		</div>
		<?php
		if( property_exists( $author, 'description' ) ) {
		?>
		<div class="description">
			<span><?=$author->description;?></span>
		</div>
		<?php
		}
		?>
		<div class="mail">
			<a href="mailto:<?=$author->user_email;?>" title="Mandar un correo electrónico a <?=$author->display_name;?>">
				<?=$author->user_email;?>
			</a>
		</div>
		<div>
			<ul>
			<?php
			if( ! empty( $social = get_the_author_meta( 'facebook', $author->ID ) ) )
				print("<li><a href='https://www.facebook.com/{$social}' target='_blank' class='ri-icon-facebook-f' rel='noopener noreferrer' title='Ir a perfil de Facebook'><span>Facebook</span></a></li>");
			if( ! empty( $social = get_the_author_meta( 'twitter', $author->ID ) ) )
				print("<li><a href='https://twitter.com/{$social}' target='_blank' class='ri-icon-twitter' rel='noopener noreferrer' title='Ir a perfil de Twitter'><span>Twitter</span></a></li>");
			if( ! empty( $social = get_the_author_meta( 'youtube', $author->ID ) ) )
				print("<li><a href='https://www.youtube.com/{$social}' target='_blank' class='ri-icon-youtube' rel='noopener noreferrer' title='Ir a canal de Youtube'><span>Youtube</span></a></li>");
			if( ! empty( $social = get_the_author_meta( 'instagram', $author->ID ) ) )
				print("<li><a href='https://www.instagram.com/{$social}' target='_blank' class='ri-icon-instagram' rel='noopener noreferrer'  title='Ir a perfil de Instagram'><span>Instagram</span></a></li>");
			print("<li><a href='https://www.instagram.com/{$social}' target='_blank' class='ri-icon-share-alt' rel='noopener noreferrer'  title='Ir a perfil de Instagram'><span>Instagram</span></a></li>");
			?>
			</ul>
		</div>
	</div>
</div>