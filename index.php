<?php 
get_header(); 
$exclude = reporte_indigo_exclude_posts('home');
?>
<main>
	<h1 class="hh1"><?=bloginfo('name');?></h1>
	<?php
	Reporte_indigo_test::comment('Slide 8 notes');
	if( ! empty( $selected_posts = get_option("wp_front_home_top_ri") ) ) {
	?>
	<div class="container wm">
		<div class="components">
			<?php
			$selected_posts = unserialize( $selected_posts );
			if( false === $posts = get_transient('ri_cache_home_top') ) {
				$posts = new WP_Query([
					'posts_per_page'	=> count($selected_posts),
					'post_type' 		=> 'any',
					'post__in' 			=> $selected_posts,
					'post_status'      	=> 'publish',
					'suppress_filters' 	=> false,
					'no_found_rows' 	=> true,
					'orderby' 			=> 'post__in'
				]);

				if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
		   			set_transient('ri_cache_home_top', $posts, 12 * HOUR_IN_SECONDS );
				}
			}
			?>
			<div class="swiper-container" id="sc-home-top">
				<div class="swiper-wrapper">
				<?php
				if ( $posts->have_posts() ): 
					while ( $posts->have_posts() ): $posts->the_post();
						get_template_part( 'template-parts/components/ri', 'deslizador', [ 'total' => $posts->post_count ] );
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				</div>
				<?php
				Reporte_indigo_templates::componente_boton_deslizamiento();
				?>
			</div>
		</div>
	</div>
	<?php
	} else {
		Reporte_indigo_test::log('No hay post para el bloque');
	} 
	Reporte_indigo_test::comment('5 Notas administradas, 8 Notas generales, Player, Edicion Digital, Publicidad'); 
	?>
	<div class="container wm">
		<div class="components">
			<div class="col-lg-8">
				<div class="components">
					<?php
					if( ! empty( $selected_posts = get_option("wp_front_home_general_top_ri") ) ) {
						Reporte_indigo_test::comment('5 Notas administradas');
						$selected_posts = unserialize( $selected_posts );

						if( false === $posts = get_transient('ri_cache_home_general') ) {

							$posts = new WP_Query([
								'posts_per_page'	=> count($selected_posts),
								'post_type' 		=> 'any',
								'post__in' 			=> $selected_posts,
								'post_status'      	=> 'publish',
								'suppress_filters' 	=> false,
								'no_found_rows' 	=> true,
								'orderby' 			=> 'post__in'
							]);

							if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
				   				set_transient('ri_cache_home_general', $posts, 12 * HOUR_IN_SECONDS );
							}

						}
						
						if ( $posts->have_posts() ): $index = 0;
							while ( $posts->have_posts() ): $posts->the_post();
								
								if($index == 0){
									get_template_part( 'template-parts/components/ri', 'general', [ 'local' => FALSE ] );
									Reporte_indigo_templates::componente_separador();
								}

								if($index > 0){
									get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vsmall', 'local' => FALSE ] );
								}

								$index++;
							endwhile;
						endif;

						wp_reset_postdata();
					} else {
						Reporte_indigo_test::log('No hay post para el bloque');
					}

					Reporte_indigo_test::comment('8 Notas administradas');

					$posts = new WP_Query([
						'post_type' 			=> [ 'ri-reporte', 'ri-latitud', 'ri-indigonomics', 'ri-piensa', 'ri-fan', 'ri-desglose' ],
						'posts_per_page'		=> 8,
						'post_status'      		=> 'publish',
						'suppress_filters' 		=> false,
						'no_found_rows' 		=> true,
						'ignore_sticky_posts'	=> true,
						'post__not_in'			=> $exclude,
						'tax_query' => [
							[
								'taxonomy' 	=> 'ri-categoria',
					            'field'    	=> 'slug',
					            'terms'    	=> 'enfoqueindigo',
					            'operator' 	=> 'NOT IN'
							]
						]
					]);

					if ( $posts->have_posts() ):
						while ( $posts->have_posts() ): $posts->the_post();
							get_template_part( 'template-parts/components/ri', 'lista', [ 'class' => 'vsmall' ] );
							$exclude[] = get_the_ID();
							$exclude_video = $exclude;
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Reproductor');

					if( class_exists("Ri_player_db") ){
						$db = get_option("wp_player_ri");
						$db = ( ! empty( $db ) ) ? unserialize( base64_decode($db) ) : [];
						$playlists = ( array_key_exists("youtube", $db) ) ? $db["youtube"]["playlists"] : [];

						Reporte_indigo_templates::componente_reproductor($playlists);
					} else {
						Reporte_indigo_test::log('Plugin no esta activo');
					}

					Reporte_indigo_test::comment('Edición Digital');
					Reporte_indigo_templates::componente_edicion();

					Reporte_indigo_test::comment('Publicidad');
					?>

					<div class="anuncios vcontent mt">
						<div class="wrap">
							<div style="height: 600px;"></div>
						</div>
					</div>
					<div class="anuncios vcontent mt">
						<div class="wrap">
							<?php
								get_template_part('template-parts/sponsors/ri', 'anuncio', [
									'format' => '70853',
									'site' => '70494',
									'page' => '535121',
									'delay' => 3500,
								]);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	Reporte_indigo_test::comment('Newsletter');
	?>
	<div class="content-max wm">
		<div class="content">
		<?php
			Reporte_indigo_templates::componente_boletin( get_permalink( get_page_by_path( 'Newsletter' ) ) );
		?>
		</div>
	</div>
	<?php
	Reporte_indigo_test::comment('Reporte, Estados');
	if( ! empty( $selected_posts = get_option("wp_front_home_reporte_ri") ) ) {
	?>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo("reporte", "Reporte"); ?>
		</div>
	</div>
	<div class="container">
		<div class="components">
		<?php
		$selected_posts = unserialize( $selected_posts );

		$posts = new WP_Query([
			'posts_per_page'	=> count($selected_posts["primary"]),
			'post_type' 		=> 'any',
			'post__in' 			=> $selected_posts["primary"],
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> false,
			'no_found_rows' 	=> true,
			'orderby' 			=> 'post__in'
		]);
			
		if ( $posts->have_posts() ): $index = 0;
			while ( $posts->have_posts() ): $posts->the_post();	
				if($index == 0){
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vlarge' ] );
					?>
					<div class="container-estados">
						<div class="container-title">
							<h2>
								<a href="?city=estados">
									Estados
								</a>
							</h2>
						</div>
						<?php
						$list = new WP_Query([
							'posts_per_page'	=> count($selected_posts["secondary"]),
							'post_type' 		=> 'any',
							'post__in' 			=> $selected_posts["secondary"],
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true,
							'orderby' 			=> 'post__in'
						]);

						if ( $list->have_posts() ): $index = 0;
							while ( $list->have_posts() ): $list->the_post();
								get_template_part( 'template-parts/components/ri', 'estado' );
							endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div>
					<?php
					Reporte_indigo_templates::componente_separador();
				}

				if($index > 0){
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmini' ] );
				}

				$exclude_video[] = get_the_ID();
				$index++;
			endwhile;
		endif;
		wp_reset_postdata();
		?>
		</div>
	</div>
	<?php
	} else {
		Reporte_indigo_test::log('No hay post para el bloque');
	}
	?>
	<?php Reporte_indigo_test::comment('Indigonomics, Filosofía financiera'); ?>
	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("indigonomics", "Indigonómics");
			?>
		</div>
	</div>
	<div class="container">
		<div class="components">
		<?php
		$posts = new WP_Query([
			'post_type' 			=> 'ri-indigonomics',
			'posts_per_page' 		=> 4,
			'post_status'      		=> 'publish',
			'suppress_filters' 		=> false,
			'ignore_sticky_posts'	=> true,
			'no_found_rows' 		=> true,
			'post__not_in'			=> $exclude
		]);

		if ( $posts->have_posts() ): $index = 0;
			while ( $posts->have_posts() ): $posts->the_post();
				
				if($index == 0){
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vlarge' ] );
					
					$one = new WP_Query([
						'post_type' 			=> 'ri-filosofia',
						'posts_per_page' 		=> 1,
						'post_status'      		=> 'publish',
						'suppress_filters' 		=> false,
						'ignore_sticky_posts'	=> true,
						'no_found_rows' 		=> true
					]);
					if ( $one->have_posts() ):
						while ( $one->have_posts() ): $one->the_post();
							get_template_part( 'template-parts/components/ri', 'twitter_plus' );
						endwhile;
					endif;
					wp_reset_postdata();

					Reporte_indigo_templates::componente_separador();
				}

				if($index > 0){
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmini' ] );
				}

				$exclude_video[] = get_the_ID();
				$index++;
			endwhile;
		endif;
		wp_reset_postdata();
		?>
		</div>
	</div>
	<?php Reporte_indigo_test::comment('Latitud y Lo más visto'); ?>
	<div class="container">
		<div class="components">
			<div class="col-lg-8">
				<div class="components">
				<?php
				Reporte_indigo_test::comment('Latitud');
				Reporte_indigo_templates::componente_titulo("latitud", "Latitud");

				$posts = new WP_Query([
					'post_type' 			=> 'ri-latitud',
					'posts_per_page' 		=> 3,
					'post_status'      		=> 'publish',
					'suppress_filters' 		=> false,
					'ignore_sticky_posts'	=> true,
					'no_found_rows' 		=> true,
					'post__not_in'			=> $exclude
				]);

				if ( $posts->have_posts() ): $index = 0;
					while ( $posts->have_posts() ): $posts->the_post();

						if($index == 0){
							get_template_part( 'template-parts/components/ri', 'general');
							Reporte_indigo_templates::componente_separador();
						}

						if($index > 0){
							get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vsmall', 'image' => false ] );
						}

						$exclude_video[] = get_the_ID();
						$index++;
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Lo más visto');
					Reporte_indigo_templates::componente_titulo(FALSE, "Lo más visto");
					if ( function_exists('wpp_get_mostpopular') ) {
						wpp_get_mostpopular([
							'limit' 		=> 6,
							'range' 		=> 'last7days',
							'post_type' 	=> 'ri-reporte,ri-opinion,ri-latitud,ri-indigonomics,ri-piensa,ri-fan,ri-desglose,ri-documento-indigo,ri-salida-emergencia,ri-especial',
							'cat' 			=> '',
							'title_length' 	=> 55
						]);
					} else {
						Reporte_indigo_test::log('No existe el plugin para popular post');
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("piensa", "Piensa");
			?>
		</div>
	</div>
	<div class="container">
		<div class="components">
		<?php
		Reporte_indigo_test::comment('Piensa');
		$posts = new WP_Query([
			'post_type' 			=> 'ri-piensa',
			'posts_per_page' 		=> 10,
			'post_status'      		=> 'publish',
			'suppress_filters' 		=> false,
			'ignore_sticky_posts'	=> true,
			'no_found_rows' 		=> true,
			'post__not_in'			=> $exclude,
			'tax_query' 			=> [
				[
					'taxonomy' 		=> 'ri-categoria',
					'field'	   		=> 'slug',
					'terms'	 		=> 'enfoqueindigo',
					'operator' 		=> 'NOT IN'
				]
			]
		]);
		if ( $posts->have_posts() ): $index = 0;
			while ( $posts->have_posts() ): $posts->the_post();
				
				if($index == 0) {
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmedium' ]);

					$one = new WP_Query([
						'post_type' 			=> 'ri-piensa',
						'posts_per_page' 		=> 1,
						'post_status'      		=> 'publish',
						'suppress_filters' 		=> false,
						'ignore_sticky_posts'	=> true,
						'no_found_rows' 		=> true,
						'post__not_in'			=> $exclude,
						'tax_query' 			=> [
							[
								'taxonomy' 		=> 'ri-categoria',
								'field'	   		=> 'slug',
								'terms'	 		=> 'enfoqueindigo'
							]
						]
					]);

					if ( $one->have_posts() ):
						while ( $one->have_posts() ): $one->the_post();
							get_template_part( 'template-parts/components/ri', 'enfoque' );
						endwhile;
					endif;
					wp_reset_postdata();
				}

				if($index == 1) {
					echo '<div class="col-lg-8 col-md-12"><div class="components">';
				}

				if($index >= 1 && $index <= 3){
					get_template_part( 'template-parts/components/ri', 'piensa', [ 'class' => 'vsmall', 'type' => '__a', 'excerpt' => FALSE ] );
				}

				if($index >= 4 && $index <= 9){
					get_template_part( 'template-parts/components/ri', 'piensa', [ 'class' => 'vmedium', 'type' => '__b', 'excerpt' => FALSE, 'share' => FALSE ] );
				}

				if($index == 9) {
					echo '</div></div>';
					echo '<div class="col-lg-4 col-md-12"><div class="components">';
					?>
					<div class="anuncios vcontent mt">
						<div class="wrap">
						<?php
						get_template_part('template-parts/sponsors/ri', 'anuncio', [
							'format' => '70854',
							'site' => '70494',
							'page' => '535121',
							'delay' => 3500
						]);
						?>
						</div>
					</div>
					<div class="anuncios vcontent mt">
						<div class="wrap">
						<?php
						get_template_part('template-parts/sponsors/ri', 'anuncio', [
							'format' => '70869',
							'site' => '70494',
							'page' => '535121',
							'delay' => 3500
						]);
						?>
						</div>
					</div>

					<?php
					echo '</div></div>';
				}

				$exclude_video[] = get_the_ID();
				$index++;
			endwhile;
			echo '</div></div>'; // Esto cierra cualquier componente
		endif;
		wp_reset_postdata();
		?>
		</div>
	</div>
	<?php Reporte_indigo_test::comment('Fan, Dato del día'); ?>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo("fan", "Fan"); ?>
		</div>
	</div>
	<div class="container">
		<div class="components">
		<?php
		Reporte_indigo_test::comment('Fan 4 Notas');
		$posts = new WP_Query([
			'post_type' 			=> 'ri-fan',
			'posts_per_page' 		=> 4,
			'post_status'      		=> 'publish',
			'suppress_filters' 		=> false,
			'ignore_sticky_posts'	=> true,
			'no_found_rows' 		=> true,
			'post__not_in'			=> $exclude
		]);

		if ( $posts->have_posts() ): $index = 0;
			while ( $posts->have_posts() ): $posts->the_post();
				if($index == 0){
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vlarge' ]);

					$one = new WP_Query([
						'post_type' 			=> 'ri-dato-dia',
						'posts_per_page' 		=> 1,
						'post_status'      		=> 'publish',
						'suppress_filters' 		=> false,
						'ignore_sticky_posts'	=> true,
						'no_found_rows' 		=> true
					]);
					if ( $one->have_posts() ):
						while ( $one->have_posts() ): $one->the_post();
							get_template_part( 'template-parts/components/ri', 'dato_dia' );
						endwhile;
					endif;
					wp_reset_postdata();

					Reporte_indigo_templates::componente_separador();
				}

				if($index > 0){
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmini' ] );
				}

				$exclude_video[] = get_the_ID();
				$index++;
			endwhile;
		endif;
		wp_reset_postdata();
		?>
		</div>
	</div>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo("indigo-videos", "IndigoPlay"); ?>
		</div>
	</div>
	<div class="content-max">
		<div class="content">
			<div class="components">
				<?php
				Reporte_indigo_test::comment('IndigoPlay');
				$posts = new WP_Query([
					'post_type' 			=> 'any',
					'posts_per_page' 		=> 5,
					'post_status'      		=> 'publish',
					'suppress_filters' 		=> false,
					'ignore_sticky_posts'	=> true,
					'no_found_rows' 		=> true,
					'post__not_in'			=> $exclude_video,
					'meta_query' 			=> [
						'relation' => 'AND',
						[
							'key' 		=> '_mediaid_jwp_meta',
		                	'value' 	=> '',
		                	'compare' 	=> '!='
						]
					]
				]);
				if ( $posts->have_posts() ): $index = 0;
					while ( $posts->have_posts() ): $posts->the_post();
						if( $index == 0 )
							get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'large' ] );

						if ( $index == 1 )
							echo '<hr>';

						if( $index > 0 )
							get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'mini' ] );
					$index++;
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
	<?php 
	Reporte_indigo_test::comment('Opinión, Publicidad');
	if( ! empty( $selected_posts = get_option("wp_front_home_opinion_ri") ) ) {
	?>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo("opinion", "Opinión"); ?>
		</div>
	</div>
	<div class="container">
		<div class="components">
			<div class="col-lg-8">
				<div class="components">
				<?php
					Reporte_indigo_test::comment('Opinion 8 notas');
					$selected_posts = unserialize( $selected_posts );

					if( false === $posts = get_transient('ri_cache_home_opinion') ) {

						$posts = new WP_Query([
							'posts_per_page'	=> count($selected_posts),
							'post_type' 		=> 'any',
							'post__in' 			=> $selected_posts,
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true,
							'orderby' 			=> 'post__in'
						]);

						if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
			   				set_transient('ri_cache_home_opinion', $posts, 12 * HOUR_IN_SECONDS );
						}

					}
					$total = $posts->post_count;
					if ( $posts->have_posts() ): $index = 0;
						while ( $posts->have_posts() ): $posts->the_post();
							
							if($total == 5)
								get_template_part( 'template-parts/components/ri', 'opinion', [ 'class' => ($index > 2) ? 'vmedium' : '' ]);
							else if($total == 8)
								get_template_part( 'template-parts/components/ri', 'opinion', [ 'class' => ($index > 5) ? 'vmedium' : '' ]);
							else
								get_template_part( 'template-parts/components/ri', 'opinion');

							$index++;
						endwhile;
					endif;
				?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="components">
					<div class="anuncios vcontent mt">
						<div class="wrap" style="height: 300px;"></div>
					</div>
					<div class="anuncios vcontent mt">
						<div class="wrap" style="height: 600px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	} else {
		Reporte_indigo_test::log('No hay post para el bloque');
	}
	Reporte_indigo_test::comment('Selección del editor');
	if( ! empty( $selected_posts = get_option("wp_front_home_seleccion_editor_ri") ) ) {
	?>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo(FALSE, "Selección del editor"); ?>
		</div>
	</div>
	<div class="container-editor">
		<div class="container">
			<div class="components">
			<?php
			Reporte_indigo_test::comment('Selección del editor 4 notas');
			$selected_posts = unserialize( $selected_posts );

			if( false === $posts = get_transient('ri_cache_home_editor') ) {

				$posts = new WP_Query([
					'posts_per_page'	=> count($selected_posts),
					'post_type' 		=> 'any',
					'post__in' 			=> $selected_posts,
					'post_status'      	=> 'publish',
					'suppress_filters' 	=> false,
					'no_found_rows' 	=> true,
					'orderby' 			=> 'post__in'
				]);

				if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
		   			set_transient('ri_cache_home_editor', $posts, 12 * HOUR_IN_SECONDS );
				}

			}
			if ( $posts->have_posts() ): 
				while ( $posts->have_posts() ): $posts->the_post();
					get_template_part( 'template-parts/components/ri', 'editor' );
				endwhile;
			endif;
			wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
	<?php
	} else {
		Reporte_indigo_test::log('No hay post para el bloque');
	}
	?>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo("desglose", "Desglose"); ?>
		</div>
	</div>
	<div class="container wm">
		<div class="components">
			<?php
			Reporte_indigo_test::comment('Desglose 5 notas');
			$posts = new WP_Query([
				'post_type' 			=> 'ri-desglose',
				'posts_per_page'		=> 5,
				'post_status'      		=> 'publish',
				'suppress_filters' 		=> false,
				'no_found_rows' 		=> true,
				'ignore_sticky_posts'	=> true,
				'post__not_in'			=> $exclude
			]);
			?>
			<div class="swiper-container" id="sc-home-desglose">
				<div class="swiper-wrapper">
				<?php
				if ( $posts->have_posts() ): 
					while ( $posts->have_posts() ): $posts->the_post();
						get_template_part( 'template-parts/components/ri', 'deslizador', [ 'total' => $posts->post_count ] );
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				</div>
				<?php
				Reporte_indigo_templates::componente_boton_deslizamiento();
				?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="components">
			<?php Reporte_indigo_templates::componente_titulo(FALSE, "Especial"); ?>
		</div>
	</div>
	<div class="container-especial">
		<div class="container">
			<div class="components">
			<?php
			Reporte_indigo_test::comment('Especial 1 nota');
			$posts = new WP_Query([
				'post_type' 			=> 'ri-especial',
				'posts_per_page'		=> 1,
				'post_status'      		=> 'publish',
				'suppress_filters' 		=> false,
				'no_found_rows' 		=> true,
				'ignore_sticky_posts'	=> true,
			]);
			
			if ( $posts->have_posts() ): 
				while ( $posts->have_posts() ): $posts->the_post();
					get_template_part( 'template-parts/components/ri', 'especial' );
					$asocc_posts = get_post_meta(get_the_ID(), 'array_posts_especial', TRUE);
				endwhile;
			endif;
			
			wp_reset_postdata();
			?>
			<div class="container-lista-especial">
				<div class="components">
					<?php
					$selected_posts = unserialize( $asocc_posts );
					$posts = new WP_Query([
						'posts_per_page'	=> count($selected_posts),
						'post_type' 		=> 'any',
						'post__in' 			=> $selected_posts,
						'post_status'      	=> 'publish',
						'suppress_filters' 	=> false,
						'no_found_rows' 	=> true,
						'orderby' 			=> 'post__in'
					]);

					if ( $posts->have_posts() ): 
						while ( $posts->have_posts() ): $posts->the_post();
							get_template_part( 'template-parts/components/ri', 'lista_especial' );
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
			</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>