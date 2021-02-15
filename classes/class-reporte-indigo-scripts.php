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
	 * Script para compartir entradas
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

		$script = '<script type="text/javascript">"use strict";const copyTwitt=t=>{let e=!1!==t?t.dataset.title:"";window.open(`http://twitter.com/intent/tweet?text=${encodeURIComponent(e)}&via=Reporte_Indigo&`,"_blank")};</script>';

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

		if( is_home() ) {
			$script = '<script type="text/javascript">const loadScript=(e,t)=>{let s,n,i;(s=document.createElement("script")).type="text/javascript",s.src=e,s.onload=s.onreadystatechange=function(){n||this.readyState&&"complete"!=this.readyState||(n=!0,t())},(i=document.getElementsByTagName("script")[0]).parentNode.insertBefore(s,i)};let swiperInstances=[];const initSlider=()=>{sliders("sc-home-top",1,1),sliders("sc-home-enfoque",2,2),sliders("sc-home-desglose",3,1)},sliders=(e,t,s)=>{let n=document.getElementById(e);if(void 0!==n&&null!=n){let n={slidesPerView:1,spaceBetween:15,autoHeight:!0};1==s&&(n.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},n.on={slideChangeTransitionEnd:()=>{for(let e of document.querySelectorAll(".pagination span"))e.classList.remove("active");let e=document.querySelectorAll(".pagination");for(let s of e)s.querySelector(`span:nth-child(${swiperInstances[t].activeIndex+1})`).classList.add("active")}}),2==s&&(n.pagination={el:"#sp-enfoque",clickable:!0}),swiperInstances[t]=new Swiper(`#${e}`,n)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js",initSlider);</script>';
		}

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
	 * El script para habilitar la carga diferida de imagenes
	 * nativa del navegador o por medio del plugin lazysizes
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
			const jwEvent = ( attr ) => {
				let media = attr.dataset.json;
					media = media.split(",");

				let parent = attr.parentElement;
				let innerPlayer = document.createElement("DIV");
					innerPlayer.classList.add("inner-player");

				for (let id of media) {
					innerPlayer.innerHTML = `<div id="_jwp_${id}"></div>`
					parent.appendChild(innerPlayer);

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
				}
			}
		</script>';

		$script = '<script type="text/javascript">"use strict";const jwEvent=t=>{let e=t.dataset.json;e=e.split(",");let a=t.parentElement,l=document.createElement("DIV");l.classList.add("inner-player");for(let t of e)l.innerHTML=`<div id="_jwp_${t}"></div>`,a.appendChild(l),jwplayer(`_jwp_${t}`).setup({playlist:`https://cdn.jwplayer.com/v2/media/${t}`,ga:{label:"mediaid"},autostart:!0,mute:!1,tracks:[{file:`https://cdn.jwplayer.com/strips/${t}-120.vtt`,kind:"thumbnails"}]})};</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	function on_loaded() {
		self::lazyloading(FALSE);
		self::scroll();
		self::jwplayer();
		self::share();
		self::twitt();

		if( is_home() ) {
			self::swiper();
		}
	}

}

$plugin = new Reporte_Indigo_Scripts();
add_action('wp_footer', array($plugin, 'on_loaded'), 99);
