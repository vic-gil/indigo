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
			$banners = [3,7];
			$code = false;
			if( class_exists("Ri_player_db") ){
				$player = get_option("wp_player_ri");
				$player = ( ! empty( $player ) ) ? unserialize( base64_decode($player) ) : false;
				$playlists = ( array_key_exists("youtube", $player) ) ? $player["youtube"]["playlists"] : [];
				$schedule = ( array_key_exists("programacion", $player) ) ? $player["programacion"] : false;
				$code = Reporte_Indigo_Utils::get_live_code($schedule);
			}

			if( false !== $code ) {
				$banners = [2,6];
				Reporte_indigo_templates::componente_videos($code, '', true, true);
				Reporte_indigo_templates::componente_titulo(false, "Más Playlist");
			}

			foreach ($playlists as $key => $playlist) {

				if( $key == 0 ) {
					if( false !== $code ) {
						Reporte_indigo_templates::componente_videos($playlist, 'vmini', false, false, 'high');
					} else {
						Reporte_indigo_templates::componente_videos($playlist, '', true, true);
						Reporte_indigo_templates::componente_titulo(false, "Más Playlist");
					}
				}

				if( $key >= 1 )
					Reporte_indigo_templates::componente_videos($playlist, 'vmini', false, false, 'high');
				

				if( $key == $banners[0] )
					Reporte_indigo_templates::componente_spotify('Escucha el playlist de Indigo Noticias desde tu Spotify','https://open.spotify.com/show/1RWrVBm0irB3PP5AripRRC?si=bV88dX_cQmOKxGPrppK6lg');

				if( $key == $banners[1] ){
				?>
				<div class="anuncios mt">
					<div class="wrap">
					<?php
					get_template_part('template-parts/sponsors/ri', 'anuncio', [
						'format' => '70741',
						'site' => '70494',
						'page' => '535121',
						'delay' => 3500
					]);
					?>
					</div>
				</div>
				<?php
				}
			}
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>