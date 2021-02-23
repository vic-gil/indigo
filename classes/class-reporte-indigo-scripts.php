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
	                    text: shareTitle,
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

		$script = '<script type="text/javascript">"use strict";var shareTitle,shareLink;const getLink=e=>{let t=shareTitle,o=shareLink;return{facebook:{desktop:`https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=${encodeURIComponent(o)}`,mobile:`https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=${encodeURIComponent(o)}`},twitter:{desktop:`https://twitter.com/intent/tweet?text=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`,mobile:`https://twitter.com/intent/tweet?text=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`},whatsapp:{desktop:`https://api.whatsapp.com/send?text=${encodeURIComponent(t)}-${encodeURIComponent(o)}`,mobile:`whatsapp://send?text=${encodeURIComponent(t)}-${encodeURIComponent(o)}`},line:{desktop:`https://lineit.line.me/share/ui?url=${encodeURIComponent(o)}&text=${encodeURIComponent(t)}`,mobile:`line://msg/text/?${encodeURIComponent(t)}-${encodeURIComponent(o)}`},telegram:{desktop:`https://t.me/share/url?url=${encodeURIComponent(o)}&text=${encodeURIComponent(t)}`,mobile:`tg://msg?text=${encodeURIComponent(t)}-${encodeURIComponent(o)}`},tumblr:{desktop:`https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&caption=&tags=`,mobile:`https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&caption=&tags=`},linkedin:{desktop:`https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&summary=&source=CapitalMéxico`,mobile:`https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&summary=&source=CapitalMéxico`},flipboard:{desktop:`https://share.flipboard.com/bookmarklet/popout?v=2&title=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`,mobile:`https://share.flipboard.com/bookmarklet/popout?v=2&title=${encodeURIComponent(t)}&url=${encodeURIComponent(o)}`},pinterest:{desktop:`http://pinterest.com/pin/create/button/?url=${encodeURIComponent(o)}`,mobile:`http://pinterest.com/pin/create/button/?url=${encodeURIComponent(o)}`},reddit:{desktop:`https://reddit.com/submit?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}`,mobile:`https://reddit.com/submit?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}`},vk:{desktop:`http://vk.com/share.php?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&comment=`,mobile:`http://vk.com/share.php?url=${encodeURIComponent(o)}&title=${encodeURIComponent(t)}&comment=`}}[e]},shareDialog=(e=!1)=>{if(shareTitle=!1!==e?e.dataset.title:document.title,shareLink=!1!==e?e.dataset.link:window.location.href,navigator.share)navigator.share({title:shareTitle,text:shareTitle,url:shareLink}).then(()=>console.log("Compartido exitoso")).catch(e=>console.log("Error al compartir",e));else{let e=document.getElementById("m-share");const t=new bootstrap.Modal(e);e.addEventListener("show.bs.modal",function(){this.querySelector(".title h2").innerHTML=shareTitle}),t.show()}},share=e=>{let t=getLink(e);/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?window.open(t.mobile,"_blank"):window.open(t.desktop,"_blank")};</script>';

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

	static function swiperPiensa($echo = TRUE) {
		$all = '
		<script type="text/javascript">
		"use strict";
			let swiperInstances = [];
			
			const initSlider = () => {
			   	sliders("sc-home-enfoque", 2, 2);
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

		$script = '<script type="text/javascript">"use strict";let swiperInstances=[];const initSlider=()=>{sliders("sc-home-enfoque",2,2)};var sliders=(e,t,i)=>{let s=document.getElementById(e);if(void 0!==s&&null!=s){let n={slidesPerView:1,spaceBetween:15,autoHeight:!0};if(1==i){let e=s.querySelectorAll(".pagination");n.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},n.on={slideChangeTransitionEnd:()=>{for(let e of s.querySelectorAll(".pagination span"))e.classList.remove("active");for(let i of e)i.querySelector(`span:nth-child(${swiperInstances[t].activeIndex+1})`).classList.add("active")}};for(let i of e)i.addEventListener("click",function(){let e=event.target.dataset.index;swiperInstances[t].slideTo(e,800)})}else n.pagination={el:"#sp-enfoque",clickable:!0};swiperInstances[t]=new Swiper(`#${e}`,n)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js",initSlider);</script>';

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
		$all = '
		<script type="text/javascript">
			"use strict";
			
			var jwPlay, modalPlayer;

			const removePrevPlayer = () => {
				if( typeof jwPlay !== "undefined" ) 
					jwPlay.remove();

				for ( let player of document.querySelectorAll(".inner-player") ) {
					player.remove();
				}
			}

			const apiUrl = (mediaid) => `https://cdn.jwplayer.com/v2/media/${mediaid}`;

			const jwEvent = ( attr ) => {
				let title = attr.dataset.title;
				let media = attr.dataset.json;
					media = media.split(",");

				let id = media[0];

				let playlists = [];
					playlists.push(media);

				let parent = attr.parentElement;
				let innerPlayer = document.createElement("DIV");
					innerPlayer.classList.add("inner-player");

				playlists = playlists.map(playlist => {
					if (typeof playlist === "string") {
						return apiUrl(playlist);
					}
					const fetches = playlist.map(item => fetch(apiUrl(item)).then(r => r.json()));
					return Promise.all(fetches).then(media => media.flatMap(m => m.playlist));
				});

				if( parent.classList.contains("interno") ){
					removePrevPlayer();
					innerPlayer.innerHTML = `<div id="_jwp_${id}"></div>`;
					parent.appendChild(innerPlayer);

					Promise.all(playlists).then(playlists => {
						loadScript("https://cdn.jwplayer.com/libraries/ixhD10k3.js", function(){
							jwplayer(`_jwp_${id}`).setup({
								playlist: playlists[0],
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
					});
				} else {

					modalPlayer = document.getElementById("m-jwplayer");
					var modalShare = new bootstrap.Modal(modalPlayer);

					modalPlayer.querySelector(".title h2").innerHTML = title;
					innerPlayer.innerHTML = `<div id="_jwp_${id}"></div>`;
					document.querySelector("#modal-player figure").appendChild(innerPlayer);

					Promise.all(playlists).then(playlists => {
						loadScript("https://cdn.jwplayer.com/libraries/ixhD10k3.js", function(){
							jwPlay = jwplayer(`_jwp_${id}`).setup({
								playlist: playlists[0],
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
					});

					modalPlayer.addEventListener("hidden.bs.modal", removePrevPlayer);

					modalShare.show();
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";var jwPlay,modalPlayer;const removePrevPlayer=()=>{void 0!==jwPlay&&jwPlay.remove();for(let e of document.querySelectorAll(".inner-player"))e.remove()},apiUrl=e=>`https://cdn.jwplayer.com/v2/media/${e}`,jwEvent=e=>{let t=e.dataset.title,a=e.dataset.json,l=(a=a.split(","))[0],r=[];r.push(a);let i=e.parentElement,n=document.createElement("DIV");if(n.classList.add("inner-player"),r=r.map(e=>{if("string"==typeof e)return apiUrl(e);const t=e.map(e=>fetch(apiUrl(e)).then(e=>e.json()));return Promise.all(t).then(e=>e.flatMap(e=>e.playlist))}),i.classList.contains("interno"))removePrevPlayer(),n.innerHTML=`<div id="_jwp_${l}"></div>`,i.appendChild(n),Promise.all(r).then(e=>{loadScript("https://cdn.jwplayer.com/libraries/ixhD10k3.js",function(){jwplayer(`_jwp_${l}`).setup({playlist:e[0],ga:{label:"mediaid"},autostart:!0,mute:!1,tracks:[{file:`https://cdn.jwplayer.com/strips/${l}-120.vtt`,kind:"thumbnails"}]})})});else{modalPlayer=document.getElementById("m-jwplayer");var s=new bootstrap.Modal(modalPlayer);modalPlayer.querySelector(".title h2").innerHTML=t,n.innerHTML=`<div id="_jwp_${l}"></div>`,document.querySelector("#modal-player figure").appendChild(n),Promise.all(r).then(e=>{loadScript("https://cdn.jwplayer.com/libraries/ixhD10k3.js",function(){jwPlay=jwplayer(`_jwp_${l}`).setup({playlist:e[0],ga:{label:"mediaid"},autostart:!0,mute:!1,tracks:[{file:`https://cdn.jwplayer.com/strips/${l}-120.vtt`,kind:"thumbnails"}]})})}),modalPlayer.addEventListener("hidden.bs.modal",removePrevPlayer),s.show()}};</script>';

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

			const removePrevYTPlayer = () => {
				for ( let player of document.querySelectorAll(".inner-player-yt") ) {
					player.remove();
				}
				for ( let player of document.querySelectorAll("ri-youtube") ) {
					player.remove();
				}
			}
			
			const ytEvent = ( attr ) => {
				let id = attr.dataset.id;
				let title = attr.dataset.title;

				removePrevYTPlayer();

				let parent = attr.parentElement;
				let innerPlayer = document.createElement("DIV");
					innerPlayer.classList.add("inner-player-yt");

				innerPlayer.innerHTML = `<iframe type="text/html" style="max-width: 100%; width: 100%;" src="https://www.youtube.com/embed/?listType=playlist&list=${id}&disablekb=1&autoplay=1&playsinline=1&origin=" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;

				if( parent.classList.contains("interno") ){
					parent.appendChild(innerPlayer);
				} else {
					document.querySelector("#indigo-play figure").appendChild(innerPlayer);	
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const removePrevYTPlayer=()=>{for(let e of document.querySelectorAll(".inner-player-yt"))e.remove();for(let e of document.querySelectorAll("ri-youtube"))e.remove()},ytEvent=e=>{let t=e.dataset.id;e.dataset.title;removePrevYTPlayer();let l=e.parentElement,r=document.createElement("DIV");r.classList.add("inner-player-yt"),r.innerHTML=`<iframe type="text/html" style="max-width: 100%; width: 100%;" src="https://www.youtube.com/embed/?listType=playlist&list=${t}&disablekb=1&autoplay=1&playsinline=1&origin=' . get_site_url() . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`,l.classList.contains("interno")?l.appendChild(r):document.querySelector("#indigo-play figure").appendChild(r)};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la fachada para reproducción de videos en youtube
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function youtubeFachadePlayer($echo = TRUE) {
		$all = '
		<script type="text/javascript">
			"use strict";
			setTimeout( () => {
				const elem = document.createElement("script");
				elem.src = "' . get_template_directory_uri() . '/assets/js/ri-youtube.js";
				document.head.append(elem);
			}, 3000);
		</script>';

		$script = '<script type="text/javascript">"use strict";setTimeout(()=>{const e=document.createElement("script");e.src="' . get_template_directory_uri() . '/assets/js/ri-youtube.js",document.head.append(e)},3e3);</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la fachada para reproducción de videos en youtube
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function singleLazyEmbeds($echo = TRUE) {
		$all = '
		<script type="text/javascript">
		"use strict";

		const ratio = "0px 0px 200px 0px"; // Radio de deteccion arr-der-aba-izq.

		const twitter = (entries, observer) =>
		    entries.forEach(entry => {
		        if (entry.isIntersecting) {
		            window.twttr = (function(d, s, id) {
		                var js, fjs = d.getElementsByTagName(s)[0],
		                    t = window.twttr || {};
		                if (d.getElementById(id)) return t;
		                js = d.createElement(s);
		                js.id = id;
		                js.src = "https://platform.twitter.com/widgets.js";
		                fjs.parentNode.insertBefore(js, fjs);

		                t._e = [];
		                t.ready = function(f) {
		                    t._e.push(f);
		                };

		                return t;
		            }(document, "script", "twitter-wjs"));
		            observer.unobserve(entry.target);
		        }
		    });

		const facebook = (entries, observer) =>
		    entries.forEach(entry => {
		        if (entry.isIntersecting) {
		            window.fbAsyncInit = function() {
		                FB.init({
		                    xfbml: true,
		                    version: "v3.2"
		                });
		            };
		            (function(d, s, id) {
		                var js, fjs = d.getElementsByTagName(s)[0];
		                if (d.getElementById(id)) { return; }
		                js = d.createElement(s);
		                js.id = id;
		                js.src = "https://connect.facebook.net/en_US/sdk.js";
		                fjs.parentNode.insertBefore(js, fjs);
		            }(document, "script", "facebook-jssdk"));
		            observer.unobserve(entry.target);
		        }
		    });

		const instagram = (entries, observer) =>
		    entries.forEach(entry => {
		        if (entry.isIntersecting) {
		            window.twttr = (function(d, s, id) {
		                var js, fjs = d.getElementsByTagName(s)[0],
		                    t = window.twttr || {};
		                if (d.getElementById(id)) return t;
		                js = d.createElement(s);
		                js.id = id;
		                js.src = "https://www.instagram.com/static/bundles/metro/EmbedSDK.js/33cd2c5d5d59.js";
		                fjs.parentNode.insertBefore(js, fjs);

		                t._e = [];
		                t.ready = function(f) {
		                    t._e.push(f);
		                };

		                return t;
		            }(document, "script", "instagram-jssdk"));
		            observer.unobserve(entry.target);
		        }
		    });

		const observerTwitter = new IntersectionObserver(twitter, {
		    rootMargin: ratio
		});

		const observerFacebook = new IntersectionObserver(facebook, {
		    rootMargin: ratio
		});

		const observerInstagram = new IntersectionObserver(instagram, {
		    rootMargin: ratio
		});

		document.querySelectorAll(".twitter-tweet").forEach(block => observerTwitter.observe(block));
		document.querySelectorAll(".facebook-media").forEach(block => observerFacebook.observe(block));
		document.querySelectorAll(".instagram-media").forEach(block => observerInstagram.observe(block));
		</script>';

		$script = '<script type="text/javascript">"use strict";const ratio="0px 0px 200px 0px",twitter=(e,t)=>e.forEach(e=>{e.isIntersecting&&(window.twttr=function(e,t,r){var n,o=e.getElementsByTagName(t)[0],s=window.twttr||{};return e.getElementById(r)?s:((n=e.createElement(t)).id=r,n.src="https://platform.twitter.com/widgets.js",o.parentNode.insertBefore(n,o),s._e=[],s.ready=function(e){s._e.push(e)},s)}(document,"script","twitter-wjs"),t.unobserve(e.target))}),facebook=(e,t)=>e.forEach(e=>{e.isIntersecting&&(window.fbAsyncInit=function(){FB.init({xfbml:!0,version:"v3.2"})},function(e,t,r){var n,o=e.getElementsByTagName(t)[0];e.getElementById(r)||((n=e.createElement(t)).id=r,n.src="https://connect.facebook.net/en_US/sdk.js",o.parentNode.insertBefore(n,o))}(document,"script","facebook-jssdk"),t.unobserve(e.target))}),instagram=(e,t)=>e.forEach(e=>{e.isIntersecting&&(window.twttr=function(e,t,r){var n,o=e.getElementsByTagName(t)[0],s=window.twttr||{};return e.getElementById(r)?s:((n=e.createElement(t)).id=r,n.src="https://www.instagram.com/static/bundles/metro/EmbedSDK.js/33cd2c5d5d59.js",o.parentNode.insertBefore(n,o),s._e=[],s.ready=function(e){s._e.push(e)},s)}(document,"script","instagram-jssdk"),t.unobserve(e.target))}),observerTwitter=new IntersectionObserver(twitter,{rootMargin:ratio}),observerFacebook=new IntersectionObserver(facebook,{rootMargin:ratio}),observerInstagram=new IntersectionObserver(instagram,{rootMargin:ratio});document.querySelectorAll(".twitter-tweet").forEach(e=>observerTwitter.observe(e)),document.querySelectorAll(".facebook-media").forEach(e=>observerFacebook.observe(e)),document.querySelectorAll(".instagram-media").forEach(e=>observerInstagram.observe(e));</script>';

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
			self::youtubePlayer();
			self::youtubeFachadePlayer();
		}

		if( is_single() ) {
			if( get_theme_mod('ri_embed', false) == 1 )
				self::singleLazyEmbeds();
		}

		if ( is_post_type_archive('ri-piensa') ) {
			self::swiperPiensa();
		}

		if ( is_post_type_archive('ri-fan') ) {
			self::swiperFan();
		}

		if( is_page_template('page-templates/indigo_noticias.php') ) {
			
			if( get_theme_mod('ri_yt_video', false) == 0 )
				self::youtubePlayer();
			
			if( get_theme_mod('ri_yt_video', false) == 2 )
				self::youtubeFachadePlayer();

		} else {
			self::jwplayer();
		}

	}

}

$plugin = new Reporte_Indigo_Scripts();
add_action('wp_footer', array($plugin, 'on_loaded'), 99);
