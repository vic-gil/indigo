<?php
/**
 * Clase Templates
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
		 * Componente web botón JWPlayer
		 *
		 * @param JSON $json     JSON player data.
		 * @return void
		 */
		public static function componente_boton_jwplayer($json) {
		?>
			<button data-json="<?=$json?>" data-title="<?=$json?>" type="button">
				<i class="fas fa-play"></i>
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
				<button class="fas fa-angle-left"></button>
			</div>
			<div class="sw-arrow next">
				<button class="fas fa-angle-right"></button>
			</div>
		<?php
		}

		/**
		 * Componente web botón Slider
		 *
		 * @param Array $data    Array image data.
		 * @param Array $author  Is an author
		 * @return void
		 */
		public static function componente_imagen($data, $author = false) {
			$title = $author ? $data['name'] : $data['caption'];
			$url = $author ? $data['photo'] : $data['link'];
		?>
			<img itemprop="contentUrl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="  data-src="<?=$url?>" alt="<?=$title?>" title="<?=$title?>" class="lazy" loading="lazy" />
		<?php
		}

		/**
		 * Componente web lista
		 *
		 * @param array $data    Array post data.
		 * @param int $total     Number of posts.
		 * @return void
		 */
		public static function componente_deslizador($data, $total = FALSE) {
		?>
			<div class="swiper-slide">
				<article class="deslizador" itemtype="http://schema.org/Article">
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<picture>
								<?php
									//get_the_post_thumbnail($data["ID"], "large");
									Reporte_indigo_templates::componente_imagen($data['post_image']);
									if( ! empty($data['post_jwplayer']) ) {
										Reporte_indigo_templates::componente_boton_jwplayer($data);
									}
								?>
							</picture>
						</a>
					</figure>
					<div class="entry-data">
						<div class="entry-title">
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
						<ul id="sw-nav-top">
							<?php
							for($j = 0; $j < $total; $j++) {
							?>
							<li class="nav-item">
							    <a href="javascript:void(0);" class="nav-link <?=$active = $j == 0 ? 'active' : '';?>">
							    	<i class="fas fa-circle"></i>
							    </a>
							</li>
							<?php
							}
							?>
						</ul>
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
		 * @param bool $image HTML Class string.
		 * @return void
		 */
		public static function componente_general($data, $variation = "", $image = true, $local = false) {
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
					?>
					<?php
					if($image) {
					?>
					<figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<picture>
								<?php
								//get_the_post_thumbnail($data["ID"], "large");
								Reporte_indigo_templates::componente_imagen($data['post_image']);
								if( ! empty($data['post_jwplayer']) ) {
									Reporte_indigo_templates::componente_boton_jwplayer($data);
								}
								?>
							</picture>
						</a>
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
		 * @return void
		 */
		public static function componente_lista($data) {
		?>
			<div class="component-list">
				<article itemtype="http://schema.org/Article">
					<header>
						<?php if( ! empty( $tema = $data["post_tema"] ) ) { ?>
							<a href="<?=$tema->link?>" title="<?=$tema->name?>">
								<h2><?=$tema->name?></h2>
							</a>
						<?php } ?>
						<a href="<?=$data["format_link"]?>" title="<?=$data["post_title"];?>">
							<h3><?=$data["post_title"];?></h3>
						</a>
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
				<div class="container">
					<img src="<?=IMAGESPATH;?>/svgs/premium.svg" alt="premium" title="premium" width="60px">
					<div class="suscribete">
						<p>Suscríbete y recibe diariamente nuestro Newsletter y acceso ilimitado a toda la información de Reporte Indigo</p>
						<a href="<?=$link;?>" alt="Newsletter" title="Newsletter">
							<div class="form">
								<input type="text" name="" />
								<button type="button" id="button-suscribe">
									<i class="fas fa-paper-plane"></i>
								</button>
							</div>
						</a>
					</div>
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
				<a href="<?=site_url($slug);?>" title="<?=$title?>">
					<?=$title;?><i class="fas fa-angle-double-right"></i>
				</a>
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
							//get_the_post_thumbnail($data["ID"], "large");
							Reporte_indigo_templates::componente_imagen($data['author'], true);
							?>
						</picture>
					</figure>
					<div class="entry-title">
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>		">
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
					<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" class="fas fa-share-alt">
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
									//get_the_post_thumbnail($data["ID"], "large");
									Reporte_indigo_templates::componente_imagen($data['post_image']);
									if( ! empty($data['post_jwplayer']) ) {
										Reporte_indigo_templates::componente_boton_jwplayer($data);
									}
								?>
							</picture>
						</a>
					</figure>
					<div class="entry-title">
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>		">
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
					<button type="button" onclick="utilerias.share(this);" data-link="<?=$data["format_link"]?>" data-title="<?=rawurlencode($data["post_title"]);?>" class="fas fa-share-alt">
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
								//get_the_post_thumbnail($data["ID"], "large");
								Reporte_indigo_templates::componente_imagen($data['post_image']);
								if( ! empty($data['post_jwplayer']) ) {
									Reporte_indigo_templates::componente_boton_jwplayer($data);
								}
							?>
						</picture>
					</a>
				</figure>
				<div class="entry-data">
					<div class="entry-title">
						<h2>
							<a href="<?=$data["post_tema"]->link?>" title="<?=$data["post_tema"]->name;?>		">
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

	}

}