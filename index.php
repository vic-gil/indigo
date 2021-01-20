<?php get_header(); ?>
<?php $response = index::get(); ?>
<main>
	<h1><span class="d-none"><?=bloginfo('name');?></span></h1>
	<?php
	Reporte_indigo_test::comment('Slide 8 notes');

	if( array_key_exists('top', $response) ) {
		$posts = $response['top'];

		if( utilerias_cm::validate_array($posts) ) {
			?>
			<div class="container">
				<div class="swiper-container" id="sc-home-top">
				    <div class="swiper-wrapper">
						<?php 
						$size = wp_is_mobile() ? "medium" : "large";
						$args = array("size" => $size);
						$total = count($posts);

						foreach ($posts as $kp => $p) {
							$post = utilerias_cm::get_slim_elements($p, $args);
							Reporte_indigo_templates::componente_deslizador($post, $total);
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
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
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
								Reporte_indigo_templates::componente_lista($post);
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
				<div class="row">
					<!-- Player -->
					<?php try{
						if(!class_exists("Ri_player_db"))
							throw new Exception("Plugin no esta activo", 1);

						$data 						= Ri_player_db::get_front();

						if($data["success"] != 1)
							throw new Exception($data["message"], 1);
							
						$data						= $data["db"];
						$player 					= "";
						$rss 						= array();
						$live 						= intval($data["live"]);
						$title 						= "-";
						$description 				= "-";
						$rss 						= $data["rss"];
						
						if($live == 1){
							$title 					= $data["item"]["title"];
							$description 			= $data["item"]["description"];
							$player 				= $data["item"]["embed"];
						}else{
							if(is_array($rss)){
								if(array_key_exists(0, $rss)){
									$title 			= $rss[0]["title"];
									$description 	= $rss[0]["description"];
									$guid 			= $rss[0]["guid"];
									$ID 			= "_jwp_".$guid;
 									$player 		= '<div data-json="'.$guid.'" id="'.$ID.'"></div>';
								}
							}
						} ?>

						<div class="col-lg-12 col-md-6 mt-3" id="indigo-play">
							<picture class="c-media-100 bgs-110 shadow-sm">
								<?=$player;?>
								<?php if ($live == 1) { ?>
									<img class="live" src="<?=IMAGESPATH;?>/svgs/vivo.svg" alt="<?=$title;?>" title="<?=$title;?>">
								<?php } ?>
							</picture>

							<div class="position-relative py-3 bgs-108 shadow-sm rounded-101">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div class="d-flex bd-highlight border-101 pb-3" id="info-player">
											  	<div class="w-100 bd-highlight">
											  		<article class="">
												  		<header>
															<span class="c-title line-clamp-2">
																<h3 class="col-104 fsize-16 roboto-bold"><?=$title;?></h3>
															</span>
														</header>
												  		<p class="c-summary line-clamp-2 fsize-10 col-100 mt-1"><?=$description;?></p>
											  		</article>
											  	</div>
											  	<div class="flex-shrink-1 bd-highlight d-block d-md-none">
											  		<button type="button" class="btn btn-primary btn-sm btn-playlist">
											  			<i class="fas fa-stream"></i>
											  		</button>
											  	</div>
											</div>

											<div class="position-relative" id="c-video-playlist">
												<ul class="list-group list-group-flush">
													<?php if(is_array($rss)){ 
														foreach ($rss as $kr => $r) { ?>
															<li class="list-group-item bgs-unset border-101">
																<a data-json="<?=rawurlencode(json_encode($r));?>" alt="<?=$r['title'];?>" title="<?=$r['title'];?>" class="roboto-regular fsize-10 col-100 item-playlist-jwp"><?=$r['title'];?></a>
															</li>	 		
														<?php } ?>
													<?php } ?>
												</ul>
											</div>
										</div>
										<div class="col-12 text-center mt-3">
											<button type="button" class="btn btn-primary rounded-pill fsize-10" onclick="utilerias.share(this);" data-title="IndigoPlay" data-link="<?=site_url('indigo-videos');?>">COMPARTIR</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } catch(Exception $e){
						print_r("<!-- ERROR: ".$e->getMessage()." -->");
					} ?>

					<!-- Edicion Digital -->
					<div class="col-lg-12 col-md-6 mt-3">
						<div class="position-relative py-3 bgs-109 shadow-sm rounded-100">
							<div class="container">
								<div class="row">
									<div class="col-12">
										<picture class="c-picture-102 bgs-110 shadow-sm">
							      			<img class="lazy" data-src="https://services.publish88.com/app/newspaper/publicacion-1158/cover" alt="REPORTE INDIGO MÉXICO" title="REPORTE INDIGO MÉXICO">
							      			<div class="display-overlay"></div>
							      		</picture>
									</div>
									<?php $link_edicio 	= home_url("edicion-impresa")."?edition_id=1158"; ?>
									<div class="col-12 mt-3 text-center">
										<a class="btn btn-primary rounded-pill btn-sm" role="button" href="<?=$link_edicio;?>" alt="EDICIÓN DIGITAL" title="EDICIÓN DIGITAL">VER EDICIÓN DIGITAL</a>
									</div>
								</div>
							</div>	
						</div>
					</div>

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
	Reporte_indigo_templates::componente_boletin( get_permalink(get_page_by_path( 'Newsletter' )) );
	
	Reporte_indigo_test::comment('Reporte, Estados');
	?>

	<div class="container">
		<div class="row">
			<?php
				Reporte_indigo_templates::componente_titulo("reporte", "Reporte");
			?>
		</div>
	</div>

	<div class="container">
		<div class="row">
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
		<div class="row">
			<?php
				Reporte_indigo_templates::componente_titulo("indigonomics", "Indigonómics");
			?>
		</div>
	</div>

	<div class="container">
		<div class="row">
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
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
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
				<div class="row">
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
						'title_length' 	=> 55,
						'wpp_start' 	=> '&#32;',
						'wpp_end' 		=> '&#32;',
						'post_html' 	=> '
							<div class="component-lista-imagen">
								<article itemtype="http://schema.org/Article">
									<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
										<a href="{post_topic_link}" title="{post_topic_name}">
											<picture>
												<img itemprop="contentUrl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="  data-src="{thumbnail_image}" alt="{thumbnail_image}" title="{thumbnail_image}" class="lazy" loading="lazy" />
											<picture>
										</a>
									</figure>
									<div class="entry-data">
										<div class="entry-title">
											<h2>
												<a href="{post_topic_link}" title="{post_topic_name}">
													{post_topic_name}
												</a>
											</h2>
											<h3>
												<a href="{url}" title="{text_title}">
													{text_title}
												</a>
											</h3>
										</div>
									</div>
								</article>
							</div>'
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
		<div class="row">
			<?php
				Reporte_indigo_templates::componente_titulo("piensa", "Piensa");
			?>
		</div>
	</div>

	<div class="container">
		<div class="row">
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

						Reporte_indigo_templates::componente_contenedor([
							"index" => $kp,
							"total" => $total,
							"class" => "col-md-6 col-lg-8",
							"posts" => $post
						], function($index, $post){
							if($index > 0 && $index < 4)
								Reporte_indigo_templates::componente_piensa($post);
							if($index >= 4)
								Reporte_indigo_templates::componente_piensa($post, "vmedium", false);
						});
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

	<?php 
	Reporte_indigo_test::comment('Fan, Dato del día');
	?>

	<div class="container">
		<div class="row">
			<?php
				Reporte_indigo_templates::componente_titulo("fan", "Fan");
			?>
		</div>
	</div>

	<div class="container">
		<div class="row">
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

	<!-- Indigo Play -->
	<div class="container">
		<div class="row">
			<div class="col-12 mt-3 section-title">
				<a href="<?=site_url('indigo-videos');?>" alt="IndigoPlay" title="IndigoPlay">
					<h2 class="pb-2">IndigoPlay<i class="fas fa-angle-double-right"></i></h2>
				</a>
			</div>
		</div>
	</div>

	<?php try{
		if(!array_key_exists('play', $response))
			throw new Exception("No hay post para el bloque", 1);

		$posts 			= $response['play'];

		if(!utilerias_cm::validate_array($posts))
			throw new Exception("No hay posts 100", 1);

		if(!array_key_exists(0, $posts))
			throw new Exception("No hay posts 101", 1);
		
		$size 			= wp_is_mobile() ? "medium" : "medium_large";
		$args 			= array("size" => $size);
		$post 			= utilerias_cm::get_slim_elements($posts[0], $args);

		$post_title 	= $post["post_title"];
		$post_excerpt 	= $post["post_excerpt"];
		$post_image 	= $post["post_image"];
		$format_link 	= $post["format_link"];
		$author  		= $post["author"];
		$post_jwplayer 	= $post["post_jwplayer"];
		$post_tema 		= $post["post_tema"];
		$post_ciudad 	= $post["post_ciudad"];
		$post_type 		= $post["post_type"];
		
		unset($posts[0]);

		$posts 			= utilerias_cm::fix_array($posts); ?>

		<div class="position-relative w-100 h-auto py-3 bgs-108 shadow-sm">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<a href="<?=$post_type['link'];?>" alt="<?=$post_type['name'];?>" title="<?=$post_type['name'];?>" class="c-topic">
							<h2 class="fsize-12 col-106"><?=$post_type['name'];?></h2>
						</a>
						<div class="row mt-1">
							<div class="col-lg-8 position-relative">
								<picture class="c-picture-100 shadow-sm bgs-110 rounded-102">
									<img class="lazy" data-src="<?=$post_image['link'];?>" alt="<?=$post_image['caption'];?>" title="<?=$post_image['caption'];?>">
									<div class="display-overlay"></div>
									<?php if(!empty($post_jwplayer)){ ?>
										<div class="position-absolute w-100 h-100 t-0 l-0">
											<div class="d-flex flex-row bd-highlight justify-content-center align-items-center h-100">
											  	<div class="bd-highlight">
											  		<button type="button" class="btn btn-primary rounded-circle btn-jwplayer" data-json="<?=$post_jwplayer;?>" data-title="<?=$post_title;?>">
											  			<i class="fas fa-play"></i>
											  		</button>
											  	</div>
											</div>
										</div>
									<?php } ?>
								</picture>
							</div>
							<div class="col-lg-4 mt-768-3">
								<article>
									<header>
										<?php if(!empty($post_tema)){ ?>
											<a href="<?=$post_tema->link;?>" alt="<?=$post_tema->name;?>" title="<?=$post_tema->name;?>" class="c-topic">
												<h2 class="fsize-12 col-103"><?=$post_tema->name;?></h2>
											</a>
										<?php } ?>
										<a href="<?=$format_link;?>" alt="<?=$post_title;?>" title="<?=$post_title;?>" class="c-title line-clamp-3">
											<h3 class="col-104 fsize-22-26 fsize-768-16-22"><?=$post_title;?></h3>
										</a>
									</header>

									<p class="pt-2 col-104 fsize-14-18 fsize-768-12-18 c-summary line-clamp-3"><?=$post_excerpt;?></p>

									<footer>
										<a href="<?=$author['link'];?>" alt="<?=$author['name'];?>" title="<?=$author['name'];?>" class="c-author pt-2">
											<h2 class="col-111 fsize-10"><?=$author['name'];?></h2>
										</a>
									</footer>
								</article>
								<div class="row text-center mt-4">
									<div class="col-12 text-center">
										<button type="button" class="btn btn-primary rounded-pill text-center fsize-10 btn-share" onclick="utilerias.share(this);" data-link="<?=$format_link;?>" data-title="<?=rawurlencode($post_title);?>">COMPARTIR</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 mt-3">
						<hr class="border-101">
					</div>

					<?php if(!empty($posts)){
						foreach ($posts as $kp => $p) {
							$post 			= utilerias_cm::get_slim_elements($p);

							$post_title 	= $post["post_title"];
							$post_excerpt 	= $post["post_excerpt"];
							$post_image 	= $post["post_image"];
							$format_link 	= $post["format_link"];
							$author  		= $post["author"];
							$post_jwplayer 	= $post["post_jwplayer"];
							$post_tema 		= $post["post_tema"];
							$post_type 		= $post["post_type"]; ?>

							<div class="col-lg-3 col-md-6 mt-3">
								<a href="<?=$post_type['link'];?>" alt="<?=$post_type['name'];?>" title="<?=$post_type['name'];?>" class="roboto-medium">
									<h2 class="fsize-12 col-106 text-uppercase"><?=$post_type['name'];?></h2>
								</a>
				
								<picture class="c-picture-100 shadow-sm bgs-110 mt-1 rounded-102 mb-3">
									<img class="lazy" data-src="<?=$post_image['link'];?>" alt="<?=$post_image['caption'];?>" title="<?=$post_image['caption'];?>">
									<div class="display-overlay"></div>
									<?php if(!empty($post_jwplayer)){ ?>
										<div class="position-absolute w-100 h-100 t-0 l-0">
											<div class="d-flex flex-row bd-highlight justify-content-center align-items-center h-100">
											  	<div class="bd-highlight">
											  		<button type="button" class="btn btn-primary rounded-circle btn-jwplayer" data-json="<?=$post_jwplayer;?>" data-title="<?=$post_title;?>">
											  			<i class="fas fa-play"></i>
											  		</button>
											  	</div>
											</div>
										</div>
									<?php } ?>
								</picture>

								<article>
									<header>
										<?php if(!empty($post_tema)){ ?>
											<a href="<?=$post_tema->link;?>" alt="<?=$post_tema->name;?>" title="<?=$post_tema->name;?>" class="c-topic">
												<h2 class="fsize-12 col-103"><?=$post_tema->name;?></h2>
											</a>
										<?php } ?>
										<a href="<?=$format_link;?>" alt="<?=$post_title;?>" title="<?=$post_title;?>" class="c-title line-clamp-3">
											<h3 class="col-104 fsize-14-18 fsize-768-16-22"><?=$post_title;?></h3>
										</a>
									</header>

									<footer>
										<a href="<?=$author['link'];?>" alt="<?=$author['name'];?>" title="<?=$author['name'];?>" class="c-author pt-2">
											<h2 class="col-111 fsize-10"><?=$author['name'];?></h2>
										</a>
									</footer>
								</article>

								<div class="row mt-1">
									<div class="col-12 text-right">
										<button type="button" class="btn btn-primary btn-sm rounded-circle btn-share" onclick="utilerias.share(this);" data-link="<?=$format_link;?>" data-title="<?=rawurlencode($post_title);?>">
											<i class="fas fa-share-alt"></i>
										</button>
									</div>
								</div>
							</div>
						<?php }
					} ?>
				</div>
			</div>
		</div>
	<?php }catch(Exception $e){
		print_r("<!-- ERROR: ".$e->getMessage()." -->");
	} ?>


	<?php 
	Reporte_indigo_test::comment('Opinión, Publicidad');
	?>

	<div class="container">
		<div class="row">
			<?php
				Reporte_indigo_templates::componente_titulo("opinion", "Opinión");
			?>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
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
				<col class="row">
					<!-- Faltan -->
				</col>
			</div>
		</div>
	</div>

	<?php 
	Reporte_indigo_test::comment('Selección del editor'); 
	?>

	<div class="container">
		<div class="row">
			<?php
				Reporte_indigo_templates::componente_titulo("", "Selección del editor");
			?>
		</div>
	</div>

	<div class="container-editor">
		<div class="container">
			<div class="row">
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
		<div class="row">
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
							Reporte_indigo_templates::componente_deslizador($post, $total);
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
		<div class="row">
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
			<div class="row">
				<div class="componente-especial">
					
				</div>
				<div class="componente-lista-especial">
					
				</div>
			</div>
		</div>
	</div>

	<?php try{
		if(!array_key_exists('especial', $response))
			throw new Exception("No hay post para el bloque", 1);

		$posts 			= $response['especial'];

		if(!utilerias_cm::validate_array($posts))
			throw new Exception("No hay posts", 1);

		if(!array_key_exists(0, $posts))
			throw new Exception("No hay posts", 1);

		$post 			= $posts[0];

		if(!property_exists($post, 'array_posts'))
			throw new Exception("No hay posts", 1);

		$array_posts  	= $post->array_posts;

		if(empty($array_posts))
			throw new Exception("No hay posts", 1);

		$size 			= wp_is_mobile() ? "medium" : "medium_large";
		$args 			= array("size" => $size);
		$post 			= utilerias_cm::get_slim_elements($post, $args);

		$post_title 	= $post["post_title"];
		$post_image 	= $post["post_image"];
		$post_tema 		= $post["post_tema"]; ?>
	
		<div class="position-relative w-100 h-auto bgs-112 pb-3">
			<div class="container">
				<div class="row c-especial">
					<div class="col-lg-8 col-md-7" >
						<div class="position-relative py-4 mt-3 bgs-102 shadow-sm rounded-100">
							<div class="container">
								<div class="row">
									<div class="col-12">
										<article>
											<header>
												<?php if(!empty($post_tema)){ ?>
													<a href="<?=$post_tema->link;?>" alt="<?=$post_tema->name;?>" title="<?=$post_tema->name;?>" class="c-topic">
														<h2 class="fsize-12 col-103"><?=$post_tema->name;?></h2>
													</a>
												<?php } ?>

												<h3 class="col-104 fsize-22-26 fsize-768-16-22 c-title line-clamp-2"><?=$post_title;?></h3>
											</header>
										</article>
										<picture class="c-picture-100 shadow-sm bgs-110 mt-3 rounded-102">
											<img class="lazy" data-src="<?=$post_image['link'];?>" alt="<?=$post_image['caption'];?>" title="<?=$post_image['caption'];?>">
											<div class="display-overlay"></div>
										</picture>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="col-lg-4 col-md-5 pl-0">
						<div class="row c-posts">
							<?php foreach ($array_posts as $kap => $ap) {
								$size 			= wp_is_mobile() ? "medium" : "medium_large";
								$args 			= array("size" => $size);
								$post 			= utilerias_cm::get_slim_elements($ap, $args);

								$post_title 	= $post["post_title"];
								$post_image 	= $post["post_image"];
								$post_tema 		= $post["post_tema"];
								$format_link 	= $post["format_link"];

								$bb 			= $kap == 3 ? "" : " border-100 "; ?>
								<div class="col-12" data-image="<?=$post_image['link'];?>">
									<div class="container">
										<div class="row py-3 <?=$bb;?>">
											<div class="col-12">
												<article>
													<header>
														<?php if(!empty($post_tema)){ ?>
															<a href="<?=$post_tema->link;?>" alt="<?=$post_tema->name;?>" title="<?=$post_tema->name;?>" class="c-topic">
																<h2 class="fsize-12 col-102"><?=$post_tema->name;?></h2>
															</a>
														<?php } ?>

														<a href="<?=$format_link;?>" alt="<?=$post_title;?>" title="<?=$post_title;?>" class="c-title line-clamp-2">
															<h3 class="col-101 fsize-16-22"><?=$post_title;?></h3>
														</a>
													</header>
												</article>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }catch(Exception $e){
		print_r("<!-- ERROR: ".$e->getMessage()." -->");
	} ?>
</main>
<?php get_footer(); ?>
