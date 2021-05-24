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
				    sliders("sc-impresa", 4, 3);
				}

				var sliders = (selector, index, type) => {
					let slider = document.getElementById(selector);
					if (void 0 !== slider && null != slider) {
						let config = {
							slidesPerView: 1,
				            spaceBetween: 15,
				            autoHeight: true
						};

						switch( type ) {
							case 1:
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
								break;
							case 2:
								config.pagination = {
									el: ".swiper-pagination",
									clickable: true
								};
								break;
							case 3:
								let edicionContainer = document.querySelector(".share-edicion a");

								config.autoHeight = false;
								config.pagination = {
									el: ".swiper-pagination",
									clickable: true
								};
								config.on = {
									slideChangeTransitionEnd: () => {
										for ( let element of slider.querySelectorAll(".swiper-slide") ) {
											if ( element.classList.contains("swiper-slide-active") ){
												let image = element.querySelector("img");
												let id = image.dataset.id;
												edicionContainer.href = edicionContainer.href.replace(/\d+/g, id);
											}
										}
									}
								};
								break;
						}

						swiperInstances[index] = new Swiper(`#${selector}`, config);

					}
				}
				
				loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js", initSlider);
			</script>';

		$script = '<script type="text/javascript">"use strict";let swiperInstances=[];const initSlider=()=>{sliders("sc-home-top",1,1),sliders("sc-home-enfoque",2,2),sliders("sc-home-desglose",3,1),sliders("sc-impresa",4,3)};var sliders=(e,i,s)=>{let t=document.getElementById(e);if(void 0!==t&&null!=t){let a={slidesPerView:1,spaceBetween:15,autoHeight:!0};switch(s){case 1:let e=t.querySelectorAll(".pagination");a.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},a.on={slideChangeTransitionEnd:()=>{for(let e of t.querySelectorAll(".pagination span"))e.classList.remove("active");for(let s of e)s.querySelector(`span:nth-child(${swiperInstances[i].activeIndex+1})`).classList.add("active")}};for(let s of e)s.addEventListener("click",function(){let e=event.target.dataset.index;swiperInstances[i].slideTo(e,800)});break;case 2:a.pagination={el:".swiper-pagination",clickable:!0};break;case 3:let n=document.querySelector(".share-edicion a");a.autoHeight=!1,a.pagination={el:".swiper-pagination",clickable:!0},a.on={slideChangeTransitionEnd:()=>{for(let e of t.querySelectorAll(".swiper-slide"))if(e.classList.contains("swiper-slide-active")){let i=e.querySelector("img").dataset.id;n.href=n.href.replace(/\d+/g,i)}}}}swiperInstances[i]=new Swiper(`#${e}`,a)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js",initSlider);</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	static function singleContainGallery($echo = TRUE) {
		$all = '<script type="text/javascript">"use strict";
				let swiperInstances = [];
				
				const initSlider = () => {
				   	sliders("deslizador-single", 1, 2);
				   	sliders("sc-impresa", 4, 3);
				}

				var sliders = (selector, index, type) => {
					let slider = document.getElementById(selector);
					if (void 0 !== slider && null != slider) {
						let config = {
							slidesPerView: 1,
				            spaceBetween: 15,
				            autoHeight: true
						};

						switch (type) {
							case 2:
								config.navigation = {
									nextEl: ".sw-arrow.next",
									prevEl: ".sw-arrow.prev"
								}
								break;
							case 3:
								let edicionContainer = document.querySelector(".share-edicion a");

								config.autoHeight = false;
								config.pagination = {
									el: ".swiper-pagination",
									clickable: true
								};
								config.on = {
									slideChangeTransitionEnd: () => {
										for ( let element of slider.querySelectorAll(".swiper-slide") ) {
											if ( element.classList.contains("swiper-slide-active") ){
												let image = element.querySelector("img");
												let id = image.dataset.id;
												edicionContainer.href = edicionContainer.href.replace(/\d+/g, id);
											}
										}
									}
								};
								break;
						}

						swiperInstances[index] = new Swiper(`#${selector}`, config);

					}
				}
				
				loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js", initSlider);
			</script>';

		$script = '<script type="text/javascript">"use strict";let swiperInstances=[];const initSlider=()=>{sliders("deslizador-single",1,2),sliders("sc-impresa",4,3)};var sliders=(e,i,s)=>{let r=document.getElementById(e);if(void 0!==r&&null!=r){let t={slidesPerView:1,spaceBetween:15,autoHeight:!0};switch(s){case 2:t.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"};break;case 3:let e=document.querySelector(".share-edicion a");t.autoHeight=!1,t.pagination={el:".swiper-pagination",clickable:!0},t.on={slideChangeTransitionEnd:()=>{for(let i of r.querySelectorAll(".swiper-slide"))if(i.classList.contains("swiper-slide-active")){let s=i.querySelector("img").dataset.id;e.href=e.href.replace(/\d+/g,s)}}}}swiperInstances[i]=new Swiper(`#${e}`,t)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js",initSlider);</script>';

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
			
			loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js", initSlider);
		
		</script>';

		$script = '<script type="text/javascript">"use strict";let swiperInstances=[];const initSlider=()=>{sliders("sc-home-enfoque",2,2)};var sliders=(e,t,i)=>{let s=document.getElementById(e);if(void 0!==s&&null!=s){let n={slidesPerView:1,spaceBetween:15,autoHeight:!0};if(1==i){let e=s.querySelectorAll(".pagination");n.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},n.on={slideChangeTransitionEnd:()=>{for(let e of s.querySelectorAll(".pagination span"))e.classList.remove("active");for(let i of e)i.querySelector(`span:nth-child(${swiperInstances[t].activeIndex+1})`).classList.add("active")}};for(let i of e)i.addEventListener("click",function(){let e=event.target.dataset.index;swiperInstances[t].slideTo(e,800)})}else n.pagination={el:"#sp-enfoque",clickable:!0};swiperInstances[t]=new Swiper(`#${e}`,n)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js",initSlider);</script>';

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

		$all = '
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
			
			loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js", initSlider);
		
		</script>';

		$script = '<script type="text/javascript">"use strict";let swiperInstances=[];const initSlider=()=>{sliders("slider-fan",1,1)};var sliders=(e,t,i)=>{let s=document.getElementById(e);if(void 0!==s&&null!=s){let n={slidesPerView:1,spaceBetween:15,autoHeight:!0};if(1==i){let e=s.querySelectorAll(".pagination");n.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},n.on={slideChangeTransitionEnd:()=>{for(let e of s.querySelectorAll(".pagination span"))e.classList.remove("active");for(let i of e)i.querySelector(`span:nth-child(${swiperInstances[t].activeIndex+1})`).classList.add("active")}};for(let i of e)i.addEventListener("click",function(){let e=event.target.dataset.index;swiperInstances[t].slideTo(e,800)})}else n.pagination={el:"#sp-enfoque",clickable:!0};swiperInstances[t]=new Swiper(`#${e}`,n)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js",initSlider);</script>';

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
		$script = '<script type="text/javascript">"use strict";let nativeLazyLoad=' . $lazy . ';(async()=>{if(nativeLazyLoad){if("loading"in HTMLImageElement.prototype){document.querySelectorAll("img.lazyload").forEach(e=>{e.dataset.src&&(e.src=e.dataset.src),e.dataset.srcset&&(e.srcset=e.dataset.srcset)})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js",document.body.appendChild(e)}if("loading"in HTMLIFrameElement.prototype){document.querySelectorAll(\'iframe[loading="lazy"]\').forEach(e=>{e.src=e.dataset.src})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js",document.body.appendChild(e)}}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js",document.body.appendChild(e)}})();</script>';

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
					document.querySelector("#indigo-play .reproductor-preview").appendChild(innerPlayer);	
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const removePrevYTPlayer=()=>{for(let e of document.querySelectorAll(".inner-player-yt"))e.remove();for(let e of document.querySelectorAll("ri-youtube"))e.remove()},ytEvent=e=>{let t=e.dataset.id;e.dataset.title;removePrevYTPlayer();let l=e.parentElement,r=document.createElement("DIV");r.classList.add("inner-player-yt"),r.innerHTML=`<iframe type="text/html" style="max-width: 100%; width: 100%;" src="https://www.youtube.com/embed/?listType=playlist&list=${t}&disablekb=1&autoplay=1&playsinline=1&origin=' . get_site_url() . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`,l.classList.contains("interno")?l.appendChild(r):document.querySelector("#indigo-play .reproductor-preview").appendChild(r)};</script>';

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
				elem.src = "' . get_template_directory_uri() . '/assets/js/ri-youtube.js?20210405";
				document.head.append(elem);
			}, 1000);
		</script>';

		$script = '<script type="text/javascript">"use strict";setTimeout(()=>{const e=document.createElement("script");e.src="' . get_template_directory_uri() . '/assets/js/ri-youtube.js?20210405",document.head.append(e)},1e3);</script>';

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

	/**
	 * El script para redireccionar imagenes con error
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function onImgError($echo = TRUE) {
		$replace = get_theme_mod( 'ri_images_replace', FALSE );
		$optional = get_theme_mod( 'ri_images_bucket', FALSE );

		$script = '';

		$all = '
		<script type="text/javascript">
		"use strict";
		document.addEventListener("error", function(e){
		    if( e.target.nodeName == "IMG" && ! e.target.classList.contains("ri-image-updated") ){
		    	e.target.classList.add("ri-image-updated");
		    	e.target.src = e.target.src.replace("' . $replace . '", "' . $optional . '");
		    	e.target.srcset = "";
		    }
		}, true);
		</script>';

		if ( ! empty($replace) && ! empty($optional) ) {
			$script = '<script type="text/javascript">"use strict";document.addEventListener("error",function(t){"IMG"!=t.target.nodeName||t.target.classList.contains("ri-image-updated")||(t.target.classList.add("ri-image-updated"),t.target.src=t.target.src.replace("' . $replace . '","' . $optional . '"),t.target.srcset="")},!0);</script>';
		}

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para redireccionar imagenes con error
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function onhoverEspecial($echo = TRUE) {
		$all = '<script type="text/javascript">
			"use strict";
			const ri_especial_con = document.querySelector(".component-especial figure img");
			const ri_especial_img = ri_especial_con.dataset.src;
			
			const hoverSpecial = (data) => {
				let url = data.dataset.link;
				ri_especial_con.src = url;
				console.warn("hoverSpecial");
				console.warn(ri_especial_con);
				console.warn(url);
			}

			const originalSpecial = () => {
				ri_especial_con.src = ri_especial_img;
				console.warn("originalSpecial");
				console.warn(ri_especial_con);
				console.warn(ri_especial_img);
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const ri_especial_con=document.querySelector(".component-especial figure img"),ri_especial_img=ri_especial_con.dataset.src,hoverSpecial=e=>{let c=e.dataset.link;ri_especial_con.src=c,console.warn("hoverSpecial"),console.warn(ri_especial_con),console.warn(c)},originalSpecial=()=>{ri_especial_con.src=ri_especial_img,console.warn("originalSpecial"),console.warn(ri_especial_con),console.warn(ri_especial_img)};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para redireccionar imagenes con error
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function preferences($echo = TRUE) {
		$all = '<script type="text/javascript">
			"use strict"
			OneSignal.push(["getTags", function(tags) {
		        for (let key in tags){
		        	if(tags[key] == 1)
		        		document.querySelector(`#tag-${key}`).checked = true;
		        }
		        document.querySelector("#panel-notification .onload-accordion").remove();
		    }]);

		    let acc = document.querySelectorAll(".accordion");

			for (let i = 0; i < acc.length; i++) {

				if( acc[i].classList.contains("active") ) {
					let panel = acc[i].nextElementSibling;
						panel.style.maxHeight = (panel.style.maxHeight) ? null : panel.scrollHeight + "px";
				}

				acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					let panel = this.nextElementSibling;
						panel.style.maxHeight = (panel.style.maxHeight) ? null : panel.scrollHeight + "px";
				});

			}

			const sendTags = (form) => {
				let sendButton = form.querySelector("input[type=\'submit\']");
				let defaultValue = form.querySelector("input[type=\'submit\']").value;
				let inputs = form.querySelectorAll("input[type=\'checkbox\']");
				let tags = {};

				form.classList.add("sending");
				sendButton.value = "Enviando";
				sendButton.disabled = true;

				for (let input of inputs){
					tags[input.value] = (input.checked) ? 1 : 0;
				}

				setTimeout(function(){
					OneSignal.push(function() {
						OneSignal.sendTags(tags, function(tagsSent) {
							form.classList.add("done");
							sendButton.value = "Enviado";

							OneSignal.sendSelfNotification(
							    "Reporte Índigo",
							    "Sus preferencias han sido actualizadas",
							    "https://www.reporteindigo.com/page?_osp=do_not_open",
							    "https://www.reporteindigo.com/iconos/icon150x150.png",
							    {
							        notificationType: "configuration-feature"
							    }
							);

							setTimeout(function(){ 
								form.classList.remove("sending", "done"); 
								sendButton.value = defaultValue;
								sendButton.disabled = false;
							}, 3000);

						});
					});
				}, 1000);
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";OneSignal.push(["getTags",function(e){for(let t in e)1==e[t]&&(document.querySelector(`#tag-${t}`).checked=!0);document.querySelector("#panel-notification .onload-accordion").remove()}]);let acc=document.querySelectorAll(".accordion");for(let e=0;e<acc.length;e++){if(acc[e].classList.contains("active")){let t=acc[e].nextElementSibling;t.style.maxHeight=t.style.maxHeight?null:t.scrollHeight+"px"}acc[e].addEventListener("click",function(){this.classList.toggle("active");let e=this.nextElementSibling;e.style.maxHeight=e.style.maxHeight?null:e.scrollHeight+"px"})}const sendTags=e=>{let t=e.querySelector("input[type=\'submit\']"),n=e.querySelector("input[type=\'submit\']").value,i=e.querySelectorAll("input[type=\'checkbox\']"),o={};e.classList.add("sending"),t.value="Enviando",t.disabled=!0;for(let e of i)o[e.value]=e.checked?1:0;setTimeout(function(){OneSignal.push(function(){OneSignal.sendTags(o,function(i){e.classList.add("done"),t.value="Enviado",OneSignal.sendSelfNotification("Reporte Índigo","Sus preferencias han sido actualizadas","https://www.reporteindigo.com/page?_osp=do_not_open","https://www.reporteindigo.com/iconos/icon150x150.png",{notificationType:"configuration-feature"}),setTimeout(function(){e.classList.remove("sending","done"),t.value=n,t.disabled=!1},3e3)})})},1e3)};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para direccionar a la página de términos de la unión europea
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/

	static function clickio_europe($echo = TRUE) {
		$all = '<script type="text/javascript">
			"use strict"
			document.querySelector(".ri-privacy-config a").addEventListener("click", function() {
		    	return void 0 !== window.__lxG__consent__ ? window.__lxG__consent__.showConsent() : alert("This function only for users from European Economic Area (EEA)"), !1;
		    });
		</script>';

		$script = '<script type="text/javascript">"use strict";document.querySelector(".ri-privacy-config a").addEventListener("click",function(){return void 0!==window.__lxG__consent__?window.__lxG__consent__.showConsent():alert("This function only for users from European Economic Area (EEA)"),!1});</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	function on_loaded() {
		self::load_script();
		self::lazyloading(FALSE);
		self::clickio_europe();

		if( get_theme_mod('ri_img_error_delay', false) == 1 )
			self::onImgError();

		if( is_home() ) {
			self::swiper();
			self::playlistShow();
			self::onhoverEspecial();
			self::youtubePlayer();

			if( get_theme_mod('ri_yt_video', false) == 2 )
				self::youtubeFachadePlayer();

		}

		if( is_single() || is_singular() ) {
			self::singleContainGallery();

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

		if( is_page_template('page-templates/preferencias.php') ) {
			self::preferences();
		}

	}

}

$plugin = new Reporte_Indigo_Scripts();
add_action('wp_footer', array($plugin, 'on_loaded'), 99);
?>
