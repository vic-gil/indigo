<?php
/**
 * Reporte_Indigo_Scripts Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee scripts por defecto
 * 
**/

class Reporte_Indigo_Scripts {

	/**
	 * Animación para la barra
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function scroll($echo = TRUE) {
		$script = '<script type="text/javascript">"use strict";const showMenu=async(e,t,c)=>{document.getElementById(e).addEventListener("click",function(o){for(let t of document.querySelectorAll(".exec"))e!==t.id&&t.classList.remove(c);for(let e of document.querySelectorAll(".listen"))t!==e.id&&e.classList.remove(c);this.classList.toggle(c),document.getElementById(t).classList.toggle(c)})};(async()=>{showMenu("exec-search","listen-search","activo"),showMenu("exec-menu","listen-menu","activo"),document.addEventListener("scroll",function(){(document.documentElement.scrollTop||document.body.scrollTop)<document.querySelector(".navmain").offsetHeight?document.querySelector(".navbar").classList.remove("active"):document.querySelector(".navbar").classList.add("active")},{passive:!0})})();</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Script para cargar javascript
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function load_script($echo = TRUE) {
		$all = '<script type="text/javascript">
			"use strict";
			const isScriptLoad = (src) => {
				return document.querySelector(`script[src="${src}"]`) ? true : false;
			}

			const loadScript = (src, callback) => {
				let s, r, t;
				s = document.createElement("script");
				s.type = "text/javascript";
				s.src = src;
				if( ! isScriptLoad(src) ){
					s.onload = s.onreadystatechange = function() {
						if ( !r && (!this.readyState || this.readyState == "complete") ) {
							r = true;
							callback();
						}
					}
					t = document.getElementsByTagName("script")[0];
	  				t.parentNode.insertBefore(s, t);
				} else {
					callback();
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const isScriptLoad=t=>!!document.querySelector(`script[src="${t}"]`),loadScript=(t,e)=>{let c,r,a;(c=document.createElement("script")).type="text/javascript",c.src=t,isScriptLoad(t)?e():(c.onload=c.onreadystatechange=function(){r||this.readyState&&"complete"!=this.readyState||(r=!0,e())},(a=document.getElementsByTagName("script")[0]).parentNode.insertBefore(c,a))};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Script para compartir entradas de twitter
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function twitt($echo = TRUE) {
		$all = '
		<script type="text/javascript">
			"use strict";
			const copyTwitt = (data) => {
				let title = ( false !== data ) ? data.dataset.title : "";

				window.open(`http://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&via=Reporte_Indigo&`, "_blank");

			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const copyTwitt=t=>{let e=!1!==t?t.dataset.title:"";window.open(`http://twitter.com/intent/tweet?text=${encodeURIComponent(e)}&via=Reporte_Indigo`,"_blank")};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Script para compartir entradas
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function share($echo = TRUE) {
		$all = '<script type="text/javascript">
			"use strict";
			
			var shareTitle;
			var shareLink;

			const getLink = (property) => {
				let title = shareTitle;
				let link = shareLink;

				let network = {
					facebook: {
						desktop: `https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=${encodeURIComponent(link)}`,
						mobile: `https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=${encodeURIComponent(link)}`
					},
					twitter: {
						desktop: `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(link)}`,
						mobile: `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(link)}`
					},
					whatsapp: {
						desktop: `https://api.whatsapp.com/send?text=${encodeURIComponent(title)}-${encodeURIComponent(link)}`,
						mobile: `whatsapp://send?text=${encodeURIComponent(title)}-${encodeURIComponent(link)}`,
					},
					line: {
						desktop: `https://lineit.line.me/share/ui?url=${encodeURIComponent(link)}&text=${encodeURIComponent(title)}`,
						mobile: `line://msg/text/?${encodeURIComponent(title)}-${encodeURIComponent(link)}`,
					},
					telegram: {
						desktop: `https://t.me/share/url?url=${encodeURIComponent(link)}&text=${encodeURIComponent(title)}`,
						mobile: `tg://msg?text=${encodeURIComponent(title)}-${encodeURIComponent(link)}`,
					},
					tumblr: {
						desktop: `https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}&caption=&tags=`,
						mobile: `https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}&caption=&tags=`,
					},
					linkedin: {
						desktop: `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}&summary=&source=CapitalMéxico`,
						mobile: `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}&summary=&source=CapitalMéxico`,
					},
					flipboard: {
						desktop: `https://share.flipboard.com/bookmarklet/popout?v=2&title=${encodeURIComponent(title)}&url=${encodeURIComponent(link)}`,
						mobile: `https://share.flipboard.com/bookmarklet/popout?v=2&title=${encodeURIComponent(title)}&url=${encodeURIComponent(link)}`,
					},
					pinterest: {
						desktop: `http://pinterest.com/pin/create/button/?url=${encodeURIComponent(link)}`,
						mobile: `http://pinterest.com/pin/create/button/?url=${encodeURIComponent(link)}`,
					},
					reddit: {
						desktop: `https://reddit.com/submit?url=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}`,
						mobile: `https://reddit.com/submit?url=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}`,
					},
					vk: {
						desktop: `http://vk.com/share.php?url=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}&comment=`,
						mobile: `http://vk.com/share.php?url=${encodeURIComponent(link)}&title=${encodeURIComponent(title)}&comment=`,
					}
				}

				return network[property];
			}

			const shareDialog = (data = false) => {
				shareTitle = ( false !== data ) ? data.dataset.title : document.title;
				shareLink = ( false !== data ) ? data.dataset.link : window.location.href;

				if ( navigator.share ) {
					navigator.share({
	                    title: shareTitle,
	                    text: shareLink,
	                    url: shareLink
	                })
	                .then(() => console.log("Compartido exitoso"))
	                .catch(error => console.log("Error al compartir", error));
				} else {
					let modal = document.getElementById("m-share");

					const modalShare = new bootstrap.Modal(modal);

					modal.addEventListener("show.bs.modal", function () {
						this.querySelector(".title h2").innerHTML = shareTitle;
					});

					modalShare.show();
				}
			}

			const share = (network) => {
				let link = getLink(network);

				if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
					window.open(link.mobile, "_blank");
				} else {
					window.open(link.desktop, "_blank");
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";var shareTitle,shareLink;const getLink=e=>{let t=shareTitle,o=shareLink;return{facebook:{desktop:`https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=${encodeURIComponent(o)}`,mobile:`https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=${encodeURIComponent(o)}`},twitter:{desktop:`https://twitter.com/intent/tweet?text=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`,mobile:`https://twitter.com/intent/tweet?text=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`},whatsapp:{desktop:`https://api.whatsapp.com/send?text=${encodeURIComponent(t)}-${encodeURIComponent(o)}`,mobile:`whatsapp://send?text=${encodeURIComponent(t)}-${encodeURIComponent(o)}`},line:{desktop:`https://lineit.line.me/share/ui?url=${encodeURIComponent(o)}&text=${encodeURIComponent(t)}`,mobile:`line://msg/text/?${encodeURIComponent(t)}-${encodeURIComponent(o)}`},telegram:{desktop:`https://t.me/share/url?url=${encodeURIComponent(o)}&text=${encodeURIComponent(t)}`,mobile:`tg://msg?text=${encodeURIComponent(t)}-${encodeURIComponent(o)}`},tumblr:{desktop:`https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&caption=&tags=`,mobile:`https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&caption=&tags=`},linkedin:{desktop:`https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&summary=&source=CapitalMéxico`,mobile:`https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&summary=&source=CapitalMéxico`},flipboard:{desktop:`https://share.flipboard.com/bookmarklet/popout?v=2&title=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`,mobile:`https://share.flipboard.com/bookmarklet/popout?v=2&title=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`},pinterest:{desktop:`http://pinterest.com/pin/create/button/?url=${encodeURIComponent(o)}`,mobile:`http://pinterest.com/pin/create/button/?url=${encodeURIComponent(o)}`},reddit:{desktop:`https://reddit.com/submit?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}`,mobile:`https://reddit.com/submit?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}`},vk:{desktop:`http://vk.com/share.php?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&comment=`,mobile:`http://vk.com/share.php?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&comment=`}}[e]},shareDialog=(e=!1)=>{if(shareTitle=!1!==e?e.dataset.title:document.title,shareLink=!1!==e?e.dataset.link:window.location.href,navigator.share)navigator.share({title:shareTitle,text:shareLink,url:shareLink}).then(()=>console.log("Compartido exitoso")).catch(e=>console.log("Error al compartir",e));else{let e=document.getElementById("m-share");const t=new bootstrap.Modal(e);e.addEventListener("show.bs.modal",function(){this.querySelector(".title h2").innerHTML=shareTitle}),t.show()}},share=e=>{let t=getLink(e);/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?window.open(t.mobile,"_blank"):window.open(t.desktop,"_blank")};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Configuraciones para correr swiper
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function swiper($echo = TRUE) {

		$all = '
			<script type="text/javascript">
				"use strict";
				let swiperInstances = [];
				
				const initSlider = () => {
				   	sliders("sc-home-top", 1, 1);
				    sliders("sc-home-enfoque", 2, 2);
				    sliders("sc-home-desglose", 3, 1);
				}

				var sliders = (selector, index, type) => {
					let slider = document.getElementById(selector);
					if (void 0 !== slider && null != slider) {
						let config = {
							slidesPerView: 1,
				            spaceBetween: 15,
				            autoHeight: true
						};

						if(type == 1) {
							
							let element = slider.querySelectorAll(".pagination");

							config.navigation = {
								nextEl: ".sw-arrow.next",
								prevEl: ".sw-arrow.prev"
							};

							config.on = {
								slideChangeTransitionEnd: () => {
									for ( let element of slider.querySelectorAll(".pagination span") ) 
										element.classList.remove("active");

									for (let pagination of element)
										pagination.querySelector(`span:nth-child(${swiperInstances[index].activeIndex+1})`).classList.add("active");
								}
							};

							for (let pagination of element) {
								pagination.addEventListener("click", function(){
									let goto = event.target.dataset.index;
									swiperInstances[index].slideTo((goto), 800);
								});
							}

						} else {
							config.pagination = {
								el: "#sp-enfoque",
								clickable: true
							};
						}

						swiperInstances[index] = new Swiper(`#${selector}`, config);

					}
				}
				
				loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js", initSlider);
			</script>';

		$script = '<script type="text/javascript">"use strict";let swiperInstances=[];const initSlider=()=>{sliders("sc-home-top",1,1),sliders("sc-home-enfoque",2,2),sliders("sc-home-desglose",3,1)};var sliders=(e,s,t)=>{let i=document.getElementById(e);if(void 0!==i&&null!=i){let n={slidesPerView:1,spaceBetween:15,autoHeight:!0};if(1==t){let e=i.querySelectorAll(".pagination");n.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},n.on={slideChangeTransitionEnd:()=>{for(let e of i.querySelectorAll(".pagination span"))e.classList.remove("active");for(let t of e)t.querySelector(`span:nth-child(${swiperInstances[s].activeIndex+1})`).classList.add("active")}};for(let t of e)t.addEventListener("click",function(){let e=event.target.dataset.index;swiperInstances[s].slideTo(e,800)})}else n.pagination={el:"#sp-enfoque",clickable:!0};swiperInstances[s]=new Swiper(`#${e}`,n)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js",initSlider);</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Configuraciones para correr swiper
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function swiperFan($echo = TRUE) {

		$script = '
		<script type="text/javascript">
		"use strict";
			let swiperInstances = [];
			
			const initSlider = () => {
			   	sliders("slider-fan", 1, 1);
			}

			var sliders = (selector, index, type) => {
				let slider = document.getElementById(selector);
				if (void 0 !== slider && null != slider) {
					let config = {
						slidesPerView: 1,
			            spaceBetween: 15,
			            autoHeight: true
					};

					if(type == 1) {
						
						let element = slider.querySelectorAll(".pagination");

						config.navigation = {
							nextEl: ".sw-arrow.next",
							prevEl: ".sw-arrow.prev"
						};

						config.on = {
							slideChangeTransitionEnd: () => {
								for ( let element of slider.querySelectorAll(".pagination span") ) 
									element.classList.remove("active");

								for (let pagination of element)
									pagination.querySelector(`span:nth-child(${swiperInstances[index].activeIndex+1})`).classList.add("active");
							}
						};

						for (let pagination of element) {
							pagination.addEventListener("click", function(){
								let goto = event.target.dataset.index;
								swiperInstances[index].slideTo((goto), 800);
							});
						}

					} else {
						config.pagination = {
							el: "#sp-enfoque",
							clickable: true
						};
					}

					swiperInstances[index] = new Swiper(`#${selector}`, config);

				}
			}
			
			loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js", initSlider);
		
		</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la carga diferida de imagenes
	 * nativa del navegador o por medio del plugin lazysizes
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/

	static function lazyloading($native = FALSE, $echo = TRUE) {
		$lazy = $native ? "true" : "false";
		$script = '<script type="text/javascript">"use strict";let nativeLazyLoad=' . $lazy . ';(async()=>{if(nativeLazyLoad){if("loading"in HTMLImageElement.prototype){document.querySelectorAll("img.lazyload").forEach(e=>{e.dataset.src&&(e.src=e.dataset.src),e.dataset.srcset&&(e.srcset=e.dataset.srcset)})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js",document.body.appendChild(e)}if("loading"in HTMLIFrameElement.prototype){document.querySelectorAll(\'iframe[loading="lazy"]\').forEach(e=>{e.src=e.dataset.src})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js",document.body.appendChild(e)}}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js",document.body.appendChild(e)}})();</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Script para habilitar la visualización de la playlist
	 * del componente reproductor
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function playlistShow($echo = TRUE) {
		$all = '
		<script type="text/javascript">
			"use strict";
			document.querySelector(".btn-playlist").addEventListener("click", function(){
				document.querySelector("#c-video-playlist").classList.toggle("expanded");
			});
		</script>';
		
		$script = '<script type="text/javascript">"use strict";document.querySelector(".btn-playlist").addEventListener("click",function(){document.querySelector("#c-video-playlist").classList.toggle("expanded")});</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la reproducción de videos en jwplayer
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function jwplayer($echo = TRUE) {
		$script = '
		<script type="text/javascript">
			"use strict";
			
			const removePrevPlayer = () => {
				for ( let player of document.querySelectorAll(".inner-player") ) {
					player.remove();
				}
			}

			const jwEvent = ( attr ) => {
				let media = attr.dataset.json;
					media = media.split(",");

				removePrevPlayer();

				let parent = attr.parentElement;

				if( parent.classList.contains("interno") ){

					let innerPlayer = document.createElement("DIV");
					innerPlayer.classList.add("inner-player");

					for (let id of media) {
						innerPlayer.innerHTML = `<div id="_jwp_${id}"></div>`
						parent.appendChild(innerPlayer);

						loadScript("https://cdn.jwplayer.com/libraries/ixhD10k3.js", function(){
							jwplayer(`_jwp_${id}`).setup({
								playlist: `https://cdn.jwplayer.com/v2/media/${id}`,
								ga: {
									label: "mediaid"
								},
								autostart : true,
					    		mute: false,
								tracks: [
									{
										file: `https://cdn.jwplayer.com/strips/${id}-120.vtt`,
										kind: "thumbnails"
									}
								]
							});
						});
					}

				} else {
					console.log("modal");
				}
			}
		</script>';

		//$script = '<script type="text/javascript">"use strict";const jwEvent=t=>{let e=t.dataset.json;e=e.split(",");let a=t.parentElement,l=document.createElement("DIV");l.classList.add("inner-player");for(let t of e)l.innerHTML=`<div id="_jwp_${t}"></div>`,a.appendChild(l),jwplayer(`_jwp_${t}`).setup({playlist:`https://cdn.jwplayer.com/v2/media/${t}`,ga:{label:"mediaid"},autostart:!0,mute:!1,tracks:[{file:`https://cdn.jwplayer.com/strips/${t}-120.vtt`,kind:"thumbnails"}]})};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la reproducción de videos en youtube
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function youtubePlayer($echo = TRUE) {
		$all = '
		<script type="text/javascript">
			"use strict";
			
			const removePrevPlayer = () => {
				for ( let player of document.querySelectorAll(".inner-player") ) {
					player.remove();
				}
			}

			const ytEvent = ( attr ) => {
				let id = attr.dataset.id;
				let title = attr.dataset.title;

				removePrevPlayer();

				let parent = attr.parentElement;

				if( parent.classList.contains("interno") ){

					let innerPlayer = document.createElement("DIV");
					innerPlayer.classList.add("inner-player");
					innerPlayer.innerHTML = `<iframe type="text/html" style="max-width: 100%; width: 100%;" src="https://www.youtube.com/embed/?listType=playlist&list=${id}&disablekb=1&autoplay=1&playsinline=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
					parent.appendChild(innerPlayer);
				} else {
					console.log("modal");
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const removePrevPlayer=()=>{for(let e of document.querySelectorAll(".inner-player"))e.remove()},ytEvent=e=>{let t=e.dataset.id;e.dataset.title;removePrevPlayer();let l=e.parentElement;if(l.classList.contains("interno")){let e=document.createElement("DIV");e.classList.add("inner-player"),e.innerHTML=`<iframe type="text/html" style="max-width: 100%; width: 100%;" src="https://www.youtube.com/embed/?listType=playlist&list=${t}&disablekb=1&autoplay=1&playsinline=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`,l.appendChild(e)}else console.log("modal")};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	function on_loaded() {
		self::load_script();
		self::lazyloading(FALSE);
		self::scroll();
		self::share();
		self::twitt();

		if( is_home() ) {
			self::swiper();
			self::playlistShow();
		}

		if ( is_post_type_archive('ri-fan') ) {
			self::swiperFan();
		}

		if( is_page_template('page-templates/indigo-noticias.php') ) {
			self::youtubePlayer();
		} else {
			self::jwplayer();
		}

	}

}

$plugin = new Reporte_Indigo_Scripts();
add_action('wp_footer', array($plugin, 'on_loaded'), 99);



