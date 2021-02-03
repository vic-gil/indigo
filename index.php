<?php get_header(); ?>
<?php $response = index::get(); ?>
<main>
	<h1 class="hh1"><?=bloginfo('name');?></h1>
	<?php
	Reporte_indigo_test::comment('Slide 8 notes');

	if( array_key_exists('top', $response) ) {
		$posts = $response['top'];

		if( utilerias_cm::validate_array($posts) ) {
			?>
			<div class="container-main">
				<div class="swiper-container" id="sc-home-top">
				    <div class="swiper-wrapper">
						<?php 
						$size = wp_is_mobile() ? "medium" : "large";
						$args = array("size" => $size);
						$total = count($posts);

						foreach ($posts as $kp => $p) {
							$post = utilerias_cm::get_slim_elements($p, $args);
							Reporte_indigo_templates::componente_deslizador($post, $kp, $total);
						}
						?>
					</div>
					<?php Reporte_indigo_templates::componente_boton_deslizamiento(); ?>
				</div>
			</div>
			<?php
		} else {
			Reporte_indigo_test::log('No hay posts 100');
		}
	} else {
		Reporte_indigo_test::log('No hay post para el bloque');
	}
	?>

	<?php 
	Reporte_indigo_test::comment('5 Notas administradas, 8 Notas generales, Player, Edicion Digital, Publicidad');
	?>

	<div class="container">
		<div class="components">
			<div class="col-lg-8">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('5 Notas administradas');
					if( array_key_exists('general_top', $response) ) {
						$posts = $response['general_top'];

						if( utilerias_cm::validate_array($posts) && array_key_exists(0, $posts) ) {
							$size = wp_is_mobile() ? "medium" : "medium_large";
							$args = array("size" => $size);
							foreach ($posts as $kp => $p){
								$post = utilerias_cm::get_slim_elements($p, $args);
								Reporte_indigo_templates::componente_general($post, $kp == 0 ? "" : "vsmall");
							}
						} else {
							Reporte_indigo_test::log('No hay post para el bloque 100-101');
						}
					} else {
						Reporte_indigo_test::log('No hay post para el bloque');
					}

					print('<div class="separator"><hr></div>');

					Reporte_indigo_test::comment('8 Notas Generales');

					if( array_key_exists('generales', $response) ) {
						$posts = $response['generales'];

						if( utilerias_cm::validate_array($posts) ) {
							foreach ($posts as $kp => $p) { 
								$post = utilerias_cm::get_slim_elements($p);
								Reporte_indigo_templates::componente_lista($post, 'vsmall');
							}
						} else {
							Reporte_indigo_test::log('No hay posts');
						}
					} else {
						Reporte_indigo_test::log('No hay post para el bloque');
					}
					?>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Reproductor');
					if( class_exists("Ri_player_db") ) {
						$data = Ri_player_db::get_front();

						if( $data["success"] == 1 ) {
							Reporte_indigo_templates::componente_reproductor($data["db"]);
						} else {
							Reporte_indigo_test::log( $data["message"] );
						}
					} else {
						Reporte_indigo_test::log('Plugin no esta activo');
					}

					Reporte_indigo_test::comment('Edición Digital');
					Reporte_indigo_templates::componente_edicion();
					?>
					
					<div class="col-lg-12 col-md-6 mt-3 text-center">
						<div class="position-relative py-3 bgs-110 shadow-sm">
							<div class="container" style="height: 600px;"></div>
						</div>
					</div>

					<div class="col-lg-12 col-md-6 mt-3 text-center">
						<div class="position-relative py-3 bgs-110 shadow-sm">
							<div class="container" style="height: 300px;"></div>
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
	?>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("reporte", "Reporte");
			?>
		</div>
	</div>

	<div class="container">
		<div class="components">
			<?php 
				if( array_key_exists('reporte', $response) ) {
					$reporte = $response['reporte']["primary"];
					if( utilerias_cm::validate_array($reporte) && array_key_exists(0, $reporte) ) {
						$size = wp_is_mobile() ? "medium" : "medium_large";
						$args = array("size" => $size);
						foreach ($reporte as $kp => $p){
							$post = utilerias_cm::get_slim_elements($p, $args);
							if($kp == 0){
								Reporte_indigo_templates::componente_general($post, "vlarge", true, true);
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
									$estados = $response['reporte']["secondary"];
									if( utilerias_cm::validate_array($estados) ) {
										$size_1 = wp_is_mobile() ? "medium" : "medium_large";
										$args_1 = array("size" => $size_1);
										foreach ($estados as $kp_1 => $p_1){
											$post_1 = utilerias_cm::get_slim_elements($p_1, $args_1);
											Reporte_indigo_templates::componente_estados($post_1);
										}
									}
									?>
								</div>
								<?php
								print('<div class="separator"><hr></div>');
							} else {
								Reporte_indigo_templates::componente_general($post, "vmini", true, true);
							}

						}
					} else {
						Reporte_indigo_test::log('No hay posts 100 - 101');	
					}
				} else {
					Reporte_indigo_test::log('No hay post para el bloque');
				}

			?>
		</div>
	</div>

	<?php 
	Reporte_indigo_test::comment('Indigonomics, Filosofia financiera'); 

	?>

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
			Reporte_indigo_test::comment('Indigonomics 1 Nota');
			if( array_key_exists('indigonomics', $response) ) {
				$indigonomics = $response['indigonomics'];

				if( utilerias_cm::validate_array($indigonomics) && array_key_exists(0, $indigonomics) ) {
					$size = wp_is_mobile() ? "medium" : "medium_large";
					$args = array("size" => $size);
					foreach ($indigonomics as $kp => $p){
						$post = utilerias_cm::get_slim_elements($p, $args);
						if($kp == 0){
							Reporte_indigo_templates::componente_general($post, "vlarge");
							print("<!-- Filosofia financiera 1 nota -->");
							if( array_key_exists('filosofia', $response) ) {
								$filosofia 		= $response['filosofia'];

								if( utilerias_cm::validate_array($filosofia) && array_key_exists(0, $filosofia) ) {
									$post_content = $filosofia[0]->post_content;
									$post_content = wptexturize($post_content, false);
									$post_content = wpautop($post_content);
									$post_content = apply_filters('the_content', $post_content);
									Reporte_indigo_templates::componente_twitt_plus($post_content);
								} else {
									print("<div class='component-twitt-plus'></div>");
									error_log("No hay posts 100 - 101");
									print("<!-- ERROR: 'No hay posts 100 - 101' -->");
								}
							} else {
								print("<div class='component-twitt-plus'></div>");
								error_log("No hay post para el bloque");
								print("<!-- ERROR: 'No hay post para el bloque' -->");
							}
							print('<div class="separator"><hr></div>');
						} else {
							Reporte_indigo_templates::componente_general($post, "vmini");
						}

					}
				} else {
					Reporte_indigo_test::log('No hay posts 100 - 101');	
				}
			} else {
				Reporte_indigo_test::log('No hay post para el bloque');
			}
			?>
		</div>
	</div>

	<?php
	Reporte_indigo_test::comment('Latitud y Lo más visto');
	?>

	<div class="container">
		<div class="components">
			<div class="col-lg-8">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Latitud');

					Reporte_indigo_templates::componente_titulo("latitud", "Latitud");
					if( array_key_exists('latitud', $response) ) {
						$posts = $response['latitud'];

						if( utilerias_cm::validate_array($posts) && array_key_exists(0, $posts) ) {
							$size = wp_is_mobile() ? "medium" : "medium_large";
							$args = array("size" => $size);
							foreach ($posts as $kp => $p){
								$post = utilerias_cm::get_slim_elements($p, $args);
								if ($kp == 0) {
									Reporte_indigo_templates::componente_general($post);
								} else {
									Reporte_indigo_templates::componente_general($post, "vsmall", false);
								}
							}
						} else {
							Reporte_indigo_test::log('No hay post para el bloque 100-101');
						}
					} else {
						Reporte_indigo_test::log('No hay post para el bloque');
					}
					?>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="components">
				<?php
				Reporte_indigo_test::comment('Lo más visto');
				Reporte_indigo_templates::componente_titulo("", "Lo más visto");
				$posts_types = unserialize(POST_TYPE);
				$posts_types = is_array($posts_types) ? implode(",", $posts_types) : "any";
				if ( function_exists('wpp_get_mostpopular') ) {
					wpp_get_mostpopular([
						'limit' 		=> 6,
						'range' 		=> 'last7days',
						'post_type' 	=> $posts_types,
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

			if(array_key_exists('piensa', $response)) {
				$piensa = $response['piensa'];
				if(utilerias_cm::validate_array($piensa) && array_key_exists(0, $piensa)) {
					$size = wp_is_mobile() ? "medium" : "medium_large";
					$args = array("size" => $size);
					$total = count($piensa);
					foreach ($piensa as $kp => $p){
						$post = utilerias_cm::get_slim_elements($p, $args);
						if($kp == 0){
							Reporte_indigo_templates::componente_general($post, "vmedium");
							
							if(array_key_exists('enfoque', $response)) {
								$enfoque = $response['enfoque'];
								if(utilerias_cm::validate_array($piensa) && array_key_exists(0, $piensa) ){
									$post = utilerias_cm::get_slim_elements($enfoque[0]);
									$gallery = utilerias_cm::get_gallery($enfoque[0]);
									Reporte_indigo_templates::componente_enfoque($post, $gallery);
								} else {
									Reporte_indigo_test::log('No hay post para el bloque 100-101');
								}
							} else {
								Reporte_indigo_test::log('No hay post para el bloque');
							}
						} 

						Reporte_indigo_templates::componente_contenedor(
							function($index, $total, $post){
								echo ($index == 0) ? '<div class="col-lg-8 col-md-12"><div class="components">' : '';
								if($index > 0 && $index < 4) Reporte_indigo_templates::componente_piensa($post, '__a');
								if($index >= 4) Reporte_indigo_templates::componente_piensa($post, '__b vmedium', false);
								echo ($index == $total - 1) ? '</div></div>' : '';
							}, [
								"index" => $kp,
								"total" => $total,
								"posts" => $post
							]
						);
					}

					Reporte_indigo_templates::componente_contenedor(
						function($index, $total, $post){
						?>
						<div class="col-md-6 col-lg-4">
							<div class="components">
								
							</div>
						</div>
						<?php
						}
					);
				} else {
					Reporte_indigo_test::log('No hay post para el bloque 100-101');
				}
			} else {
				Reporte_indigo_test::log('No hay post para el bloque');
			}
			?>
		</div>
	</div>

	<?php 
	Reporte_indigo_test::comment('Fan, Dato del día');
	?>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("fan", "Fan");
			?>
		</div>
	</div>

	<div class="container">
		<div class="components">
			<?php 
			Reporte_indigo_test::comment('Fan 4 Notas');

				if( array_key_exists('fan', $response) ) {
					$fan = $response['fan'];

					if( utilerias_cm::validate_array($fan) && array_key_exists(0, $fan) ) {
						$size = wp_is_mobile() ? "medium" : "medium_large";
						$args = array("size" => $size);
						foreach ($fan as $kp => $p){
							$post = utilerias_cm::get_slim_elements($p, $args);
							if($kp == 0){
								Reporte_indigo_templates::componente_general($post, "vlarge");
								if( array_key_exists('dato', $response) ) {
									$dato 		= $response['dato'];

									if( utilerias_cm::validate_array($filosofia) && array_key_exists(0, $dato) ) {
										$post_content = $dato[0]->post_content;
										$post_content = wptexturize($post_content, false);
										$post_content = wpautop($post_content);
										$post_content = apply_filters('the_content', $post_content);
										Reporte_indigo_templates::componente_twitt_plus($post_content);
									} else {
										print("<div class='component-twitt-plus'></div>");
										Reporte_indigo_test::log('No hay posts 100 - 101');
									}
								} else {
									print("<div class='component-twitt-plus'></div>");
									Reporte_indigo_test::log('No hay post para el bloque');
								}
								print('<div class="separator"><hr></div>');
							} else {
								Reporte_indigo_templates::componente_general($post, "vmini");
							}

						}
					} else {
						Reporte_indigo_test::log('No hay posts 100 - 101');	
					}
				} else {
					Reporte_indigo_test::log('No hay post para el bloque');
				}

			?>
		</div>
	</div>

	<?php
		Reporte_indigo_test::comment('IndigoPlay');
	?>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("indigo-videos", "IndigoPlay");
			?>
		</div>
	</div>


	<div class="content-max">
		<div class="content">
			<div class="components">
			<?php
			if( array_key_exists('play', $response) ) {
				$posts = $response['play'];
				if( utilerias_cm::validate_array($posts) && array_key_exists(0, $posts)) {
					$size = wp_is_mobile() ? "medium" : "medium_large";
					$args = array("size" => $size);
					foreach ($posts as $kp => $p){
						$post = utilerias_cm::get_slim_elements($p, $args);
						if($kp == 0){
							Reporte_indigo_templates::componente_play($post, "large");
						} else {
							echo $aux = ($kp == 1) ? '<hr>' : '';
							Reporte_indigo_templates::componente_play($post, "mini");
						}
					}
				} else {
					Reporte_indigo_test::log('No hay posts 100 - 101');
				}
			} else {
				Reporte_indigo_test::log('No hay post para el bloque');
			}
			?>
			</div>
		</div>
	</div>

	<?php 
	Reporte_indigo_test::comment('Opinión, Publicidad');
	?>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("opinion", "Opinión");
			?>
		</div>
	</div>

	<div class="container">
		<div class="components">
			<div class="col-lg-8">
				<div class="components">
					<?php
					if( array_key_exists('opinion', $response) ) {
						$posts = $response['opinion'];

						if( utilerias_cm::validate_array($posts) && array_key_exists(0, $posts) ) {
							$size = wp_is_mobile() ? "medium" : "medium_large";
							$args = array("size" => $size);
							$total = count($posts);
							foreach ($posts as $kp => $p){
								$post = utilerias_cm::get_slim_elements($p, $args);
								if($total == 5)
									Reporte_indigo_templates::componente_opinion($post, $kp > 2 ? 'vmedium' : '');
								else if($total == 8)
									Reporte_indigo_templates::componente_opinion($post, $kp > 5 ? 'vmedium' : '');
								else 
									Reporte_indigo_templates::componente_opinion($post);
							}
						} else {
							Reporte_indigo_test::log('No hay post para el bloque 100-101');
						}
					} else {
						Reporte_indigo_test::log('No hay post para el bloque');
					}
					?>
				</div>
			</div>
			<div class="col-lg-4">
				<col class="components">
					<!-- Faltan -->
				</col>
			</div>
		</div>
	</div>

	<?php 
	Reporte_indigo_test::comment('Selección del editor'); 
	?>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("", "Selección del editor");
			?>
		</div>
	</div>

	<div class="container-editor">
		<div class="container">
			<div class="components">
				<?php
				if( array_key_exists('seleccion', $response) ) {
					$posts = $response['seleccion'];

					if(utilerias_cm::validate_array($posts)) {
						foreach ($posts as $kp => $p) {
							$post = utilerias_cm::get_slim_elements($p);
							Reporte_indigo_templates::componente_editor($post);
						}
					} else {
						Reporte_indigo_test::comment('No hay posts 100');
					}
				} else {
					Reporte_indigo_test::comment('No hay post para el bloque');
				}
				?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("desglose", "Desglose");
			?>
		</div>
	</div>

	<?php
	Reporte_indigo_test::comment('Desglose');

	if( array_key_exists('desglose', $response) ) {
		$posts = $response['desglose'];

		if( utilerias_cm::validate_array($posts) ) {
			?>
			<div class="container">
				<div class="swiper-container" id="sc-home-desglose">
				    <div class="swiper-wrapper">
						<?php 
						$size = wp_is_mobile() ? "medium" : "large";
						$args = array("size" => $size);
						$total = count($posts);

						foreach ($posts as $kp => $p) {
							$post = utilerias_cm::get_slim_elements($p, $args);
							Reporte_indigo_templates::componente_deslizador($post, $kp, $total);
						}
						?>
					</div>
					<?php Reporte_indigo_templates::componente_boton_deslizamiento(); ?>
				</div>
			</div>
			<?php
		} else {
			Reporte_indigo_test::log('No hay posts 100');
		}
	} else {
		Reporte_indigo_test::log('No hay post para el bloque');
	}
	?>

	<div class="container">
		<div class="components">
			<?php
				Reporte_indigo_templates::componente_titulo("", "Especial");
			?>
		</div>
	</div>

	<?php
	Reporte_indigo_test::comment('Especial');
	?>

	<div class="container-especial">
		<div class="container">
			<div class="components">
				<?php
				if( array_key_exists('especial', $response) ){
					$posts = $response['especial'];

					if( utilerias_cm::validate_array($posts) && array_key_exists(0, $posts) ){
						$post = $posts[0];

						if( property_exists($post, 'array_posts') && ! empty($post->array_posts) ) {
							$array_posts = $post->array_posts;
							$total = count($array_posts);
							$size = wp_is_mobile() ? "medium" : "medium_large";
							$args = array("size" => $size);
							$post = utilerias_cm::get_slim_elements($post, $args);
							Reporte_indigo_templates::componente_especial($post);
							
							foreach ($array_posts as $kap => $ap){
								$size = wp_is_mobile() ? "medium" : "medium_large";
								$args = array("size" => $size);
								$post = utilerias_cm::get_slim_elements($ap, $args);

								Reporte_indigo_templates::componente_contenedor(
									function($index, $total, $post){
										echo ($index == 0) ? '<div class="container-lista-especial"><div class="components">' : '';
										Reporte_indigo_templates::componente_lista_especial($post);
										echo ($index == $total - 1) ? '</div></div>' : '';
									}, [
										"index" => $kap,
										"total" => $total,
										"posts" => $post
									]
								);
							}
						} else {
							Reporte_indigo_test::log('No hay posts');
						}
					} else {
						Reporte_indigo_test::log('No hay posts');
					}
				} else {
					Reporte_indigo_test::log('No hay post para el bloque');
				}
				?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
