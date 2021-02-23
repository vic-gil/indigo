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
					Reporte_indigo_templates::componente_videos($playlist, 'vmini', false, false, 'high');

				if( $key == 3 ){
				?>
				<div class="component-spotify">
					<div class="wrap">
						<div class="msg">
							<span class="txt">Escucha el playlist de Indigo Noticias desde tu Spotify</span>
							<span class="icon fab fa-spotify"></span>
						</div>
						<div>
							<a href="https://open.spotify.com/show/1RWrVBm0irB3PP5AripRRC?si=bV88dX_cQmOKxGPrppK6lg" class="btn-general" title="spotify" target="_blank">Ir a playlist</a>
						</div>
					</div>
				</div>
				<?php
				}

				if( $key == 7 ){
					echo '<div class="anuncios mt"><div class="wrap"><div style="height:90px;"></div></div></div>';
				}
			}
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
