<?php
/**
 * Clase Reporte_indigo_templates
 *
 * Plantillas de los componentes web
 * (Esto no sustituye template parts sólo es provisional)
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

if ( ! class_exists( 'Reporte_indigo_templates' ) ) {
	
	/**
	 * Una clase que provee templates para los diferentes componentes web
	 */

	class Reporte_indigo_templates{

		/**
		 * Componente web Contenedor
		 *
		 * @param callable $component   function HTML Component.
		 * @param Array $args  			Array configuration [ index => (int), total => (int), posts => [Array] ]
		 * @return void
		 */
		public static function componente_tag_domain($link, $title, $args) {
		if( FALSE !== $args && array_key_exists('chk_option_tag', $args) ) :
			if($args["chk_option_tag"] === 1) :
			$domain = str_replace($args["input_search_domain"], $args["input_replace_domain"], $link);
			?>
			<div class="tag-domain">
				<h2>
					<a href="<?=$link;?>" title="<?=$title;?>">
						<?=$domain;?>
					</a>
				</h2>
			</div>
			<?php
			endif;
		endif;
		}

		/**
		 * Componente web Contenedor
		 *
		 * @param callable $component   function HTML Component.
		 * @param Array $args  			Array configuration [ index => (int), total => (int), posts => [Array] ]
		 * @return void
		 */
		public static function componente_contenedor(callable $fn, $args = []) {
			$index = array_key_exists( 'index', $args ) ? $args['index'] : 0;
			$total = array_key_exists( 'total', $args ) ? $args['total'] : 0;
			$posts = array_key_exists( 'posts', $args ) ? $args['posts'] : false;

			$fn($index, $total, $posts);
		}

		/**
		 * Componente web botón JWPlayer
		 *
		 * @param JSON $json     JSON player data.
		 * @return void
		 */
		public static function componente_boton_jwplayer($json, $title = "", $class = "jw-play") {
		?>
			<button type="button" class="<?=$class;?>" data-json="<?=$json?>" data-title="<?=$title;?>" aria-label="play" title="<?=$title;?>" onclick="jwEvent(this); return false;">
				<i class="ri-icon-play"></i>
			</button>
		<?php
		}

		/**
		 * Componente web botón JWPlayer
		 *
		 * @param JSON $json     JSON player data.
		 * @return void
		 */
		public static function componente_boton_youtube($data) {
		?>
			<button type="button" class="jw-play" data-id="<?=$data['id']?>" data-title="<?=$data['title']?>" aria-label="play" onclick="ytEvent(this); return false;">
				<i class="ri-icon-play"></i>
			</button>
		<?php
		}

		/**
		 * Componente web botón Slider
		 *
		 * @return void
		 */
		public static function componente_boton_deslizamiento() {
		?>
			<div class="sw-arrow prev">
				<button class="ri-icon-angle-left" aria-label="anterior"></button>
			</div>
			<div class="sw-arrow next">
				<button class="ri-icon-angle-right" aria-label="siguiente"></button>
			</div>
		<?php
		}

		/**
		 * Componente web Imagen
		 *
		 * @param Array $data    Array image data.
		 * @param Array $author  Is an author
		 * @return void
		 */
		public static function componente_imagen($data, $author = false) {
			$title = $author ? $data['name'] : $data['caption'];
			$url = $author ? $data['photo'] : $data['link'];
			$width = ( ! empty($data['width']) ) ? $data['width'] : '';
			$height = ( ! empty($data['height']) ) ? $data['height'] : '';
			$id = '';

			if( array_key_exists('id', $data) ) {
				$id = "data-id='{$data['id']}'";
			}

			$rewrite = true;
			if($rewrite == true) {
				$url = str_replace(get_site_url(), 'https://images.reporteindigo.com', $url);
			}

		?>
			<img <?=$id;?> itemprop="contentUrl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=$url?>" alt="<?=$title?>" width="<?=$width;?>" height="<?=$height;?>" class="lazyload" loading="lazy" />
		<?php
		}

		/**
		 * Componente web Imagen Galería
		 *
		 * @param Array $data    Array image data.
		 * @return void
		 */
		public static function componente_imagen_galeria($data) {
			$title = $data['caption'];
			$url = $data['medium_large'];

			$rewrite = true;
			if($rewrite == true) {
				$url = str_replace(get_site_url(), 'https://images.reporteindigo.com', $url);
			}
		?>
			<img itemprop="contentUrl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=$url?>" alt="<?=$title?>" class="lazyload" loading="lazy" />
		<?php
		}

		/**
		 * Componente web iconos
		 *
		 * @param Array $data    Array image data.
		 * @return void
		 */
		public static function componente_icon($slug) {
			$icons = [
				'arte' 					=> 'arte-diseno.svg',
				'ciencia' 				=> 'ciencia.svg',
				'ciencia-y-tecnologia' 	=> 'tecnologia.svg',
				'entretenimiento' 		=> 'entretenimiento.svg',
				'innovacion' 			=> 'innovacion.svg',
				'libros' 				=> 'libros.svg',
				'literatura' 			=> 'literatura.svg',
				'musica' 				=> 'musica.svg',
				'salud' 				=> 'salud.svg',
				'sustentabilidad' 		=> 'sustentabilidad.svg'
			];
			
			if( array_key_exists($slug, $icons) ){
			?>
				<img src="<?=IMAGESPATH;?>/svgs/<?=$icons[$slug];?>" alt="<?=$slug;?>" width="50" height="50" class="lazyload" loading="lazy">
			<?php
			} else {
			?>
				<img src="<?=IMAGESPATH;?>/svgs/warning.svg" alt="<?=$slug;?>" width="50" height="50" class="lazyload" loading="lazy">
			<?php
			}
		}

		/**
		 * Componente web separador
		 *
		 * @return void
		 */

		public static function componente_separador() {
		?>
		<div class="separator"><hr></div>
		<?php
		}

		/**
		 * Componente web lista
		 *
		 * @param array $data    Array post data.
		 * @param int $index     Number of item.
		 * @param int $total     Number of posts.
		 * @return void
		 */
		public static function componente_deslizador($data, $index, $total = FALSE) {
		?>
			<div class="swiper-slide">
				<article class="deslizador" itemtype="http://schema.org/Article">
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data['format_link']?>" title="<?=$data['post_title'];?>">
							<picture>
								<?php
									Reporte_indigo_templates::componente_imagen($data['post_image']);
								?>
							</picture>
						</a>
						<?php
						if( ! empty($data['post_jwplayer']) ) {
							Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
						}
						?>
					</figure>
					<div class="entry-data">
						<div class="entry-title">
							<h3>
								<a href="<?=$data['format_link']?>" title="<?=$data['post_title'];?>">
									<?=$data['post_title']?>
								</a>
							</h3>
						</div>
						<div class="entry-excerpt">
							<p><?=$data['post_excerpt']?></p>	
						</div>
						<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
							<a href="<?=$data['author']['link'];?>" title="<?=$data['author']['name'];?>"><?=$data['author']['name'];?></a>
						</address>
						<div class="pagination">
							<?php
							for($j = 0; $j < $total; $j++) {
							?>
								<span class="ri-icon-circle"></span>
							<?php
							}
							?>
						</div>
					</div>
				</article>
			</div>
		<?php
		}

		/**
		 * Componente web general
		 *
		 * @param array $data    	Array post data.
		 * @param string $variation HTML Class string.
		 * @param bool $image 		Boolean show image.
		 * @param bool $local 		Boolean show local.
		 * @return void
		 */
		public static function componente_general($data, $variation = "", $image = true, $local = false, $category = false) {
		?>
			<div class="component-general <?=$variation?>">
				<article itemtype="http://schema.org/Article">
					<?php
					if($local) {
					$link = get_permalink( get_page_by_path( 'Ciudad' ) ) . '?city=' . $data["post_ciudad"];
					?>
					<div class="entry-local">
						<h3>
							<a href="<?=$link;?>" title="<?=$data["post_ciudad"];?>">
								<?=$data["post_ciudad"];?>
							</a>
						</h3>
					</div>
					<?php
					}
					if($category) {
						if( ! empty($data["post_categoria"]) && property_exists($data["post_categoria"], "name") ) {
						?>
						<div class="entry-local">
							<h3>
								<a href="<?=$data["post_categoria"]->link;?>" title="<?=$data["post_categoria"]->name;?>">
									<?=$data["post_categoria"]->name;?>
								</a>
							</h3>
						</div>
						<?php
						} else if( ! empty( $data["post_ciudad"] ) ) {
							$link = get_permalink( get_page_by_path( 'Ciudad' ) ) . '?city=' . $data["post_ciudad"];
							?>
							<div class="entry-local">
								<h3>
									<a href="<?=$link;?>" title="<?=$data["post_ciudad"];?>">
										<?=$data["post_ciudad"];?>
									</a>
								</h3>
							</div>
							<?php
						}
					?>
					<?php
					}
					if($image) {
					?>
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<picture>
							<?php
								Reporte_indigo_templates::componente_imagen($data['post_image']);
							?>
							</picture>
						</a>
						<?php
						if( ! empty($data['post_jwplayer']) ) {
							Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
						}
						?>
					</figure>
					<?php	
					}
					?>
					<div class="entry-data">
						<div class="entry-title">
							<h2>
								<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name?>">
									<?=$data["post_tema"]->name?>
								</a>
							</h2>
							<h3>
								<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
									<?=$data["post_title"]?>
								</a>
							</h3>
						</div>
						<div class="entry-excerpt">
							<p><?=$data["post_excerpt"]?></p>	
						</div>
						<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
							<a href="<?=$data['author']['link'];?>" title="<?=$data['author']['name'];?>"><?=$data['author']['name'];?></a>
						</address>
					</div>
				</article>
			</div>
			<?php
			if("" == $variation)
				print('<div class="separator"><hr></div>');
		}

		/**
		 * Componente web lista
		 *
		 * @param array $data    Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_lista($data, $variation = '') {
		?>
			<div class="component-list <?=$variation;?>">
				<article itemtype="http://schema.org/Article">
					<header>
						<?php if( ! empty( $tema = $data["post_tema"] ) ) { ?>
							<h2>
								<a href="<?=$tema->link?>" title="<?=$tema->name?>">
									<?=$tema->name?>
								</a>
							</h2>
						<?php } ?>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<?=$data["post_title"];?>
							</a>
						</h3>
					</header>
				</article>
			</div>
		<?php
		}

		/**
		 * Componente web boletin
		 *
		 * @param array $link    URL link..
		 * @return void
		 */
		public static function componente_boletin($link) {
		?>
		<div class="component-boletin">
			<img src="<?=IMAGESPATH;?>/svgs/premium.svg" alt="premium" title="premium" width="87" height="150">
			<div class="suscribete">
				<p>Suscríbete y recibe diariamente nuestro Newsletter y acceso ilimitado a toda la información de Reporte Indigo</p>
				<a href="<?=$link;?>" alt="Newsletter" title="Newsletter">
					<div class="form">
						<label><span class="sr-only">Suscribete</span><input type="text" name="suscribe" /></label>
						<button type="button" id="button-suscribe" aria-label="Suscríbete">
							<i class="ri-icon-paper-plane"></i>
						</button>
					</div>
				</a>
			</div>
		</div>
		<?php
		}

		/**
		 * Componente web titulo
		 *
		 * @param string $slug   Page slug.
		 * @param string $title  Page title.
		 * @return void
		 */
		public static function componente_titulo($slug, $title) {
		?>
		<div class="component-titulo">
			<h2>
				<?php
				if(FALSE !== $slug){
				?>
				<a href="<?=site_url($slug);?>" title="<?=$title?>">
					<?=$title;?><i class="ri-icon-angle-double-right"></i>
				</a>
				<?php
				} else {
				?>
				<?=$title;?><i class="ri-icon-angle-double-right"></i>
				<?php	
				}
				?>
			</h2>
		</div>	
		<?php
		}

		/**
		 * Componente web twitter
		 *
		 * @param string $content Post content.
		 * @return void
		 */
		public static function componente_twitt_plus($content) {
		?>
		<div class="component-twitt-plus">
			<article itemtype="http://schema.org/Article">
				<header>
					<a href="">
						<img src="<?=IMAGESPATH;?>/svgs/filosofia-financiera.svg" alt="Filosofía financiera" title="Filosofía financiera" width="35">
						Filosofía financiera
					</a>
				</header>
				<div class="entry-content">
					<h3>
						<a href="" title=""><?=$content;?></a>
					</h3>
				</div>
				<footer>
					<button 
						type="button" 
						data-title="<?=rawurlencode($content);?>" 
						onclick="utilerias.tweet(this);">TWEET</button>
				</footer>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web opinion
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_opinion($data, $variation = "") {
		?>
		<div class="component-opinion <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<header>
					<h2>
						<a href="<?=$data["post_columna"]->link;?>" title="<?=$data["post_columna"]->name;?>">
							<?=$data["post_columna"]->name;?>
						</a>
					</h2>
				</header>
				<div class="entry-content">
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<picture>
							<?php
							Reporte_indigo_templates::componente_imagen($data['author'], true);
							?>
						</picture>
					</figure>
					<div class="entry-title">
						<?php
						if( ! empty( $data["post_tema"] ) ){
						?>
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
								<?=$data["post_tema"]->name;?>		
							</a>
						</h2>
						<?php
						}
						?>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<?=$data["post_title"];?>
							</a>
						</h3>
						<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
							<a href="<?=$data["author"]['link'];?>" alt="<?=$data["author"]['name'];?>">
								<?=$data["author"]['name'];?>
							</a>
						</address>
					</div>
				</div>
				<footer>
					<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" class="ri-icon-share-alt" aria-label="comparte">
					</button>
				</footer>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web editor
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_editor($data, $variation = "") {
		?>
		<div class="component-editor <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<div class="entry-content">
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<picture>
								<?php
									Reporte_indigo_templates::componente_imagen($data['post_image']);
								?>
							</picture>
						</a>
						<?php
						if( ! empty($data['post_jwplayer']) ) {
							Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
						}
						?>
					</figure>
					<div class="entry-title">
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
								<?=$data["post_tema"]->name;?>		
							</a>
						</h2>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<?=$data["post_title"];?>
							</a>
						</h3>
						<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
							<a href="<?=$data["author"]['link'];?>" alt="<?=$data["author"]['name'];?>">
								<?=$data["author"]['name'];?>
							</a>
						</address>
					</div>
				</div>
				<footer>
					<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" class="ri-icon-share-alt" aria-label="comparte">
					</button>
				</footer>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web estados
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_estados($data, $variation = "") {
		?>
		<div class="component-estados">
			<article itemtype="http://schema.org/Article">
				<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
					<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
						<picture>
							<?php
								Reporte_indigo_templates::componente_imagen($data['post_image']);
							?>
						</picture>
					</a>
					<?php
					if( ! empty($data['post_jwplayer']) ) {
						Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
					}
					?>
				</figure>
				<div class="entry-data">
					<div class="entry-title">
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
								<?=$data["post_tema"]->name;?>		
							</a>
						</h2>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<span><?=$data["post_ciudad"]?></span> / <?=$data["post_title"];?>
							</a>
						</h3>
					</div>
				</div>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web piensa
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_piensa($data, $variation = "", $share = true) {
		?>
		<div class="component-piensa <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<?php
				if(  ! empty( $data["post_categoria"] ) ) {
				?>
				<header>
					<h2>
						<a href="<?=$data["post_categoria"]->link;?>" title="<?=$data["post_categoria"]->name;?>">
							<?=$data["post_categoria"]->name;?>
						</a>
					</h2>
					<?php
					if( FALSE !== strpos($variation, '__b') )
						Reporte_indigo_templates::componente_icon($data["post_categoria"]->slug);
					?>
				</header>
				<?php
				}
				?>
				<div class="entry-content">
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<picture>
								<?php
									Reporte_indigo_templates::componente_imagen($data['post_image']);
								?>
							</picture>
						</a>
						<?php
						if( ! empty($data['post_jwplayer']) ) {
							Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
						}
						?>
					</figure>
					<div class="entry-title">
						<?php
						if( ! empty( $data["post_tema"] ) ){
						?>
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
								<?=$data["post_tema"]->name;?>		
							</a>
						</h2>
						<?php
						}
						?>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<?=$data["post_title"];?>
							</a>
						</h3>
						<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
							<a href="<?=$data["author"]['link'];?>" alt="<?=$data["author"]['name'];?>">
								<?=$data["author"]['name'];?>
							</a>
						</address>
					</div>
				</div>
				<?php
				if($share){
				?>
				<footer>
					<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" class="ri-icon-share-alt" aria-label="comparte">
					</button>
				</footer>
				<?php
				}
				?>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web enfoque
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_enfoque($data, $gallery = false, $variation = "", $share = true) {
		?>
		<div class="component-enfoque <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<?php
				if( $variation == 'vmedium' && ! empty($data["post_categoria"] && property_exists($data["post_categoria"], "name") ) ) {
				?>
				<header>
					<h2>
						<a href="<?=$data["post_categoria"]->link;?>" title="<?=$data["post_categoria"]->name;?>">
							<?=$data["post_categoria"]->name;?>
						</a>
					</h2>
				</header>
				<?php
				}
				?>
				<div class="entry-content">
					<div class="entry-title">
						<div class="enfoque-title">
							<a href="" title="">
								EnfoqueIndigo
							</a>
						</div>
						<?php
						if( ! empty( $data["post_tema"] ) ){
						?>
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
								<?=$data["post_tema"]->name;?>		
							</a>
						</h2>
						<?php
						}
						?>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<?=$data["post_title"];?>
							</a>
						</h3>
					</div>
					<div class="entry-excerpt">
						<p><?=$data["post_excerpt"];?></p>	
					</div>
					<div class="swiper-container" id="sc-home-enfoque">
						<div class="swiper-wrapper" itemscope itemtype="http://schema.org/ImageGallery">
							<?php
							foreach ($gallery as $kg => $g) {
							?>
							<figure class="swiper-slide" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
								<a href="<?=$data["format_link"]?>" itemprop="contentUrl" title="<?=$data["post_title"];?>" >
									<picture>
										<?php
											Reporte_indigo_templates::componente_imagen_galeria($g);
										?>
									</picture>
								</a>
							</figure>
							<?php
							}
							?>
						</div>
						<div class="swiper-pagination" id="sp-enfoque"></div>
					</div>
					
				</div>
				<?php
				if($share){
				?>
				<footer>
					<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" aria-label="comparte">
						Compartir
					</button>
				</footer>
				<?php
				}
				?>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web especial
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_especial($data, $variation = "") {
		?>
		<div class="component-especial <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<header>
					<h3>
						<?=$data["post_title"];?>
					</h3>
				</header>
				<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
					<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
						<picture>
							<?php
								Reporte_indigo_templates::componente_imagen($data['post_image']);
							?>
						</picture>
					</a>
					<?php
					if( ! empty($data['post_jwplayer']) ) {
						Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
					}
					?>
				</figure>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web lista especial
		 *
		 * @param array $data 		Array post data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_lista_especial($data, $variation = "") {
		?>
		<div class="component-lista-especial <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<div class="entry-content">
					<h2>
						<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
							<?=$data["post_tema"]->name;?>		
						</a>
					</h2>
					<h3>
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<?=$data["post_title"];?>
						</a>
					</h3>
				</div>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web reproductor
		 *
		 * @param array $player Array player data.
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_reproductor($player, $variation = "") {
			$data = ( array_key_exists('youtube', $player) ) ? $player['youtube']['playlists'] : false;
			$schedule = ( array_key_exists('programacion', $player) ) ? $player['programacion'] : false;
			$title = $data[0]['title'];
			$code = Reporte_Indigo_Utils::get_live_code($schedule);
			?>
			<div class="component-reproductor <?=$variation;?>" id="indigo-play">
				<div class="reproductor-preview">
					<?php
					if( get_theme_mod('ri_yt_video', false) == 0 ):
						Reporte_indigo_templates::componente_boton_youtube([
							'title' => $data[0]['title'],
							'id' => $data[0]['id']
						]);
					elseif( get_theme_mod('ri_yt_video', false) == 1 ):
					?>
						<div class="inner-player">
							<iframe type="text/html" class="lazyload" style="width: 100%;" data-src="https://www.youtube.com/embed/?listType=playlist&list=<?=$data[0]['id'];?>&disablekb=1&playsinline=1&origin=<?=get_site_url();?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" load="lazy" allowfullscreen></iframe>
						</div>
					<?php
					else:
						if ( false !== $code ) {
							$title = $code['title'];
							?>
							<ri-youtube videoid="<?=$code['code'];?>" style="background-image: url('https://i.ytimg.com/vi/<?=$code['code'];?>/hqdefault.jpg');" params="disablekb=1&playsinline=1&autoplay=1&origin=<?=get_site_url();?>">
								<button type="button" class="riyt-playbtn">
									<span class="riyt-visually-hidden">En Vivo</span>
								</button>
							</ri-youtube>
							<?php
						} else {
							?>
							<ri-youtube style="background-image: url('<?=$data[0]["thumbnails"]["high"]["url"];?>');" params="listType=playlist&list=<?=$data[0]['id'];?>&disablekb=1&playsinline=1&autoplay=1&origin=<?=get_site_url();?>">
								<button type="button" class="riyt-playbtn">
									<span class="riyt-visually-hidden"><?=$data[0]['title'];?></span>
								</button>
							</ri-youtube>
							<?php
						}
					endif;
					?>
				</div>
				<div class="entry-player">
					<div class="player-title">
						<div>
							<h3><?=$title;?></h3>
						</div>
					</div>
					<div>
						<button type="button" class="btn-playlist btn-general">
							<i class="ri-icon-stream"></i>
						</button>
					</div>
				</div>
				<div class="stream-list" id="c-video-playlist">
					<ul>
						<?php
						foreach ($data as $playlist) {
						?>
						<li data-id="<?=$playlist['id']?>" title="<?=$playlist['title'];?>" onclick="ytEvent(this)">
							<span class="item-playlist-jwp" >
								<?=$playlist['title'];?>
							</span>
						</li>
						<?php
						}
						?>
					</ul>
				</div>
				<div class="share-videos">
					<button class="btn-general" type="button" onclick="shareDialog(this);" data-title="IndigoPlay" data-link="<?=site_url('indigo-videos');?>" aria-label="comparte">COMPARTIR</button>
				</div>
			</div>
			<?php
		}

		/**
		 * Componente web edición digital
		 *
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_edicion($variation = "") {
		$publicaciones = [
			[	
				'id' 		=> 1158,
				'text' 		=> 'NACIONAL',
				'caption' 	=> 'REPORTE INDIGO MÉXICO',
				'link' 		=> 'https://services.publish88.com/app/newspaper/publicacion-1158/cover',
				'width' 	=> 1346,
				'height' 	=> 1677
			],
			[	
				'id' 		=> 1156,
				'text' 		=> 'MONTERREY',
				'caption' 	=> 'REPORTE INDIGO MONTERREY',
				'link' 		=> 'https://services.publish88.com/app/newspaper/publicacion-1156/cover',
				'width' 	=> 1346,
				'height' 	=> 1677
			],
			[	
				'id' 		=> 1157,
				'text' 		=> 'GUADALAJARA',
				'caption' 	=> 'REPORTE INDIGO GUADALAJARA',
				'link' 		=> 'https://services.publish88.com/app/newspaper/publicacion-1157/cover',
				'width' 	=> 1346,
				'height' 	=> 1677
			]
		];
		?>
		<div class="component-edicion <?=$variation;?>">
			<div class="content">
				<div class="swiper-container" id="sc-impresa">
					<div class="swiper-wrapper">
						<?php
						foreach ($publicaciones as $publicacion) {
						?>
						<div class="swiper-slide">
							<figure>
								<a href="<?=esc_url( add_query_arg( 'publisher', $publicacion["id"], home_url("edicion-impresa") ) );?>" title="EDICIÓN DIGITAL">
									<picture>
										<?php
										Reporte_indigo_templates::componente_imagen($publicacion);
										?>
									</picture>
								</a>
							</figure>
							<figcaption>
								<?=$publicacion['text'];?>
							</figcaption>
						</div>
						<?php
						}
						?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<div class="share-edicion">
					<a href="<?=esc_url( add_query_arg( 'publisher', $publicaciones[0]["id"], home_url("edicion-impresa") ) );?>" title="EDICIÓN DIGITAL" role="button">
						VER EDICIÓN DIGITAL
					</a>
				</div>
			</div>
		</div>
		<?php
		}

		/**
		 * Componente web play
		 *
		 * @param string $variation HTML Class string.
		 * @return void
		 */
		public static function componente_play($data, $variation = "") {
		?>
		<div class="component-play <?=$variation;?>">
			<article itemtype="http://schema.org/Article">
				<?php
				if( ! empty($data['post_type'])) {
				?>
				<div class="entry-local">
					<h2>
						<a href="<?$data['post_type']['link'];?>" title="<?=$data['post_type']['name'];?>">
							<?=$data['post_type']['name'];?>
						</a>
					</h2>
				</div>
				<?php
				}
				?>
				<div class="entry-content">
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<picture>
								<?php
									Reporte_indigo_templates::componente_imagen($data['post_image']);
								?>
							</picture>
						</a>
						<?php
						if( ! empty($data['post_jwplayer']) ) {
							Reporte_indigo_templates::componente_boton_jwplayer($data['post_jwplayer']);
						}
						?>
					</figure>
					<div class="entry-title">
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>">
								<?=$data["post_tema"]->name;?>		
							</a>
						</h2>
						<h3>
							<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
								<?=$data["post_title"];?>
							</a>
						</h3>
						<?php
						if($variation == "large") {
						?>
						<div class="entry-excerpt">
							<p><?=$data['post_excerpt']?></p>	
						</div>
						<?php
						}
						?>
						<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
							<a href="<?=$data["author"]['link'];?>" alt="<?=$data["author"]['name'];?>">
								<?=$data["author"]['name'];?>
							</a>
						</address>
						<div class="share">
							<?php
							if($variation == "large") {
							?>
							<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" aria-label="comparte">Compartir</button>
							<?php
							} else {
							?>
							<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" class="ri-icon-share-alt" aria-label="comparte"></button>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</article>
		</div>
		<?php
		}

		/**
		 * Componente web videos
		 *
		 * @param array  $data 		Array video data.
		 * @param string $variation HTML Class string.
		 *
		 * @return void
		 */
		public static function componente_videos($data, $variation = "", $in_header = false, $share = false, $res = 'maxres') {
		?>
		<div class="component-videos <?=$variation;?>">
			<div class="wrap">
				<?php
				if ( $in_header ) {
				?>
				<div class="entry-title">
					<h3>
						<?=$data['title'];?>
					</h3>
				</div>
				<?php
				}
				?>
				<div class="reproductor-preview">
					<?php
					if( get_theme_mod('ri_yt_video', false) == 0 ):
						Reporte_indigo_templates::componente_boton_youtube([
							'title' => $data['title'],
							'id' => $data['id']
						]);
					elseif( get_theme_mod('ri_yt_video', false) == 1 ):
					?>
						<div class="inner-player">
							<iframe type="text/html" class="lazyload" style="width: 100%;" data-src="https://www.youtube.com/embed/?listType=playlist&list=<?=$data['id'];?>&disablekb=1&playsinline=1&origin=<?=get_site_url();?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" load="lazy" allowfullscreen></iframe>
						</div>
					<?php
					else:
						if( ! array_key_exists('code', $data) ) {
							?>
							<ri-youtube style="background-image: url('<?=$data["thumbnails"][$res]["url"];?>');" params="listType=playlist&list=<?=$data['id'];?>&disablekb=1&playsinline=1&autoplay=1&origin=<?=get_site_url();?>">
								<button type="button" class="riyt-playbtn">
									<span class="riyt-visually-hidden"><?=$data['title'];?></span>
								</button>
							</ri-youtube>
							<?php
						} else {
							?>
							<ri-youtube videoid="<?=$data['code'];?>" style="background-image: url('https://i.ytimg.com/vi/<?=$data['code'];?>/hqdefault.jpg');" params="disablekb=1&playsinline=1&autoplay=1&origin=<?=get_site_url();?>">
								<button type="button" class="riyt-playbtn">
									<span class="riyt-visually-hidden">En Vivo</span>
								</button>
							</ri-youtube>
							<?php
						}
					endif;
					?>
				</div>
				<?php
				if ( ! $in_header) {
				?>
				<div class="entry-title">
					<h3>
						<?=$data['title'];?>
					</h3>
				</div>
				<?php
				}
				?>
				<?php
				if ( $share ) {
				?>
				<div class="share">
					<button type="button" class="btn-general" onclick="shareDialog(this);" data-link="<?php the_permalink(); ?>" data-title="<?=$data['title'];?>" aria-label="comparte">Compartir</button>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<?php
		}

		/**
		 * Componente web spotify
		 *
		 * @param string  $title 	El titulo del componente.
		 * @param string  $url 		La URL del componente.
		 *
		 * @return void
		 */
		public static function componente_spotify($title = "", $url = "") {
		?>
		<div class="component-spotify">
			<div class="wrap">
				<div class="msg">
					<span class="txt"><?=$title;?></span>
					<span class="icon ri-icon-spotify"></span>
				</div>
				<div>
					<a href="<?=esc_url($url);?>" class="btn-general" title="spotify" target="_blank">Ir a playlist</a>
				</div>
			</div>
		</div>
		<?php
		}

	}

}