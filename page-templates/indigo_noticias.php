<?php
/**
 * Template Name: Indigo Noticias
 *
 * Página de Índigo Noticias
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

get_header();
?>
<main>
	<div class="container wm">
		<div class="components">
			<?php
			$playlists = [];
			if( class_exists("Ri_player_db") ){
				$db = get_option("wp_player_ri");
				$db = ( ! empty( $db ) ) ? unserialize( base64_decode($db) ) : [];
				$playlists = ( array_key_exists("youtube", $db) ) ? $db["youtube"]["playlists"] : [];
			}
			foreach ($playlists as $key => $playlist) {
				if( $key == 0 ) {
					Reporte_indigo_templates::componente_videos($playlist, '', true, true);
					Reporte_indigo_templates::componente_titulo(false, "Más Playlist");
				}

				if( $key >= 1 )
					Reporte_indigo_templates::componente_videos($playlist, 'vmini');

				//if( $key == 3 )
					//echo '<div class="anuncios vmicro mt"><div class="wrap"><div style="height:300px;"></div></div></div>';

				if( $key == 7 ){
					echo '<div class="anuncios mt"><div class="wrap"><div style="height:90px;"></div></div></div>';
				}
			}
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>